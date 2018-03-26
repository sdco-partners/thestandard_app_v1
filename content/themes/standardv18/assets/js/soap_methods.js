var $j = jQuery.noConflict();

/* VARIABLES */ 

// Main DOM selectors
var hasSOAPel = "div#layouts.layouts";           //  <---  specify DOM element specific to soap page
var soapWrapperEl = "div#floor-plan";            //  <---  specify DOM element wrapping floor plan info
var floorPlanTitle = "span#floorplan-name";      //  <---  specify element ID of floor plan title
var dataWrapperEl = "div.layout-box div.col-2";  //  <---  specify DOM element wrapping SOAP data
var toggleData = "toggle-data";                  //  <---  specify animation class that gets injected after SOAP returns with data 

// Environment 
var isDevEnv = false;                             //  <---  specify if dev environment
var devRoot = "/thestandardjamesisland"          //  <---  URL root for dev
var themeName = "standard";                      //  <---  specify Wordpress Theme name

// Data seletors
var sizeDataEl = "#floorplan-size";              //  <---  specify element ID containing size data
var bedDataEl = "#floorplan-bed";                //  <---  specify element ID containing bed data
var bathDataEl = "#floorplan-bath";              //  <---  specify element ID containing bath data
var maxPriceDataEl = "#floorplan-price-max";     //  <---  specify element ID containing price min data
var minPriceDataEl = "#floorplan-price-min";     //  <---  specify element ID containing price max data
var emDash = "emdash";                           //  <---  specify element ID containing emdash between price max and min
/* ------- */


if ($j(hasSOAPel).length) {

  $j(document).ready(function(){
    var params = paramBuilder(soapWrapperEl, floorPlanTitle); 
 
    ajaxRequester(params, function(data){
      var parsedData = soapResponseParser(data);

      if(parsedData.raw.range === "single"){
        singleDataPopulator(parsedData);
      } else if (parsedData.raw.range === "range" || parsedData.raw.range === "fetchAll"){
        rangeDataPopulator(parsedData);
      }
    });
  });

}


/*
*
* paramBuilder 
*
* Build parameters for POST request
*
* @params:    params {string} targetEl - id of wrapper DOM element
* @params:    params {string} titleEl - id of DOM element containing floor plan name
*
*/

function paramBuilder(targetEl, titleEl){
  // default parameters
  targetEl = targetEl ? targetEl : "article.floorplan";
  titleEl =  titleEl ? titleEl : "#FloorPlanName";

  var params = {};

  // parse DOM for data
  var floorPlanName = $j(targetEl).find(titleEl).text();
  if (floorPlanName.indexOf("(") > -1 ) {
    var floorPlanCode = floorPlanName.slice(floorPlanName.indexOf("(") + 1, floorPlanName.indexOf(")"));
    floorPlanName = floorPlanName.slice(0, floorPlanName.indexOf("("));
  }

  // if last character has a space
  if (floorPlanName[floorPlanName.length - 1] === " ") {
    floorPlanName = floorPlanName.slice(0, floorPlanName.length - 1);
  }

  // floorPlanCode = 0; // <-- for testing only

  // If no code, fetchAll
  if(!floorPlanCode){
    params.range = "fetchAll";
    params.name = "FloorPlanName";
    params.value = floorPlanName;
  // If code, single query
  }else if(floorPlanCode) {
    params.range = "single";
    params.name = "FloorPlanCode";
    params.value = floorPlanCode;
  }

  return params;
}

/*
*
* ajaxRequester
*
* Makes a POST request to soap_request.php.
*
* @params:    params {object} params - object with request parameters
* @params:    params {function} callback - function to execute on POST repsonse
*
*/

function ajaxRequester(params, callback) {
  var pathToSoapRequest = "https://" + window.location.host;
  if (isDevEnv) {
    pathToSoapRequest += devRoot; 
  }
  pathToSoapRequest += "/content/themes/" + themeName + "/soap_request.php";  

  $j.post(pathToSoapRequest, params)
    .fail(function(err){
      console.log("request failed", pathToSoapRequest, err);
    })
    .done(function(data){
      console.log("success!");
      callback(data);
    });
}

/*
*
* soapResponseParser
*
* Breakup response into usable object array
*
* @params:    params {object} data - SOAP Response
*
*/

function soapResponseParser(data) {
  var store = [];
  store.raw = JSON.parse(data);

  // if response from a single query
  if(store.raw.params.range === "single") {
    store = singleParser(store);

  // if response from a range query **INCOMPLETE
  } else if (store.raw.params.range === "range") {
    store = rangeParser(store);

  // if response from a fetchAll query
  } else if (store.raw.params.range === "fetchAll") {
    store = fetchAllParser(store);
  }
  

  return store;

}

/*
*
* singleParser
*
* Parsess single query
*
* @params:    params {object} store - store object
*
*/

function singleParser(store){
  if(store.raw.soapCall) {
    var results = store.raw.soapCall.ListResult.FloorPlanObject;
  } else {
    console.log("error: soapCall object not found: ", store);
    return
  }
  store.processed = [];
  store.processed.sqfoot = results.RentableSquareFootage;
  store.processed.bed = results.Bedrooms === "0" ? 'Studio' : results.Bedrooms;
  store.processed.bath = results.Bathrooms;
  store.processed.rentmin = '$' + results.RentMin.substring(0, results.RentMin.indexOf('.'));
  store.processed.rentmax = '$' + results.RentMax.substring(0, results.RentMax.indexOf('.'));
  return store;
}

/*
*
* rangeParser ** DO NOT USE
*
* Parses range query
*
* @params:    params {object} store - store object
*
*/

function rangeParser(store) {
  // pulling ranges for FloorPlan API does not work
  // because FloorPlan API doesn't really allow 
  // queries by min and max values
  return store;
}

/*
*
* fetchAllParser
*
* Gets all data and searches for name/value match based on initial parameters
*
* @params:    params {object} store - store object
*
*/

function fetchAllParser(store) {
  if (store.raw.soapCall && store.raw.soapCall.ListResult && store.raw.soapCall.ListResult.FloorPlanObject) {
    var results = store.raw.soapCall.ListResult.FloorPlanObject;
    var searchName = store.raw.fetchAll.name;
    var searchValue = store.raw.fetchAll.value;
  } else {
    console.log("error: soapCall object not found: ", store);
    return;
  }
  // declase default values
  store.processed = [];
  store.results = [];

  for (var i = 0; i < results.length; i++ ) {
    store.results.push(results[i]);
    // console.log(results[i]);

    // Loop through all results and match name/value pair by DOM title
    if (results[i][searchName].indexOf(searchValue) > 0 ) {
      // Get SqFoot Min & Max
      if (!store.processed["sqfoot-min"] || results[i].RentableSquareFootage < store.processed["sqfoot-min"]) {
        store.processed["sqfoot-min"] = results[i].RentableSquareFootage;
      }
      if (!store.processed["sqfoot-max"] || results[i].RentableSquareFootage > store.processed["sqfoot-max"]) {
        store.processed["sqfoot-max"] = results[i].RentableSquareFootage;
      }
      // Get Bed Min & Max
      if (!store.processed["bed-min"] 
        || results[i]["Bedrooms"] < store.processed["bed-min"]) {
        store.processed["bed-min"] = results[i].Bedrooms;
      }
      if (!store.processed["bed-max"] || results[i].Bedrooms < store.processed["bed-max"]) {
        store.processed["bed-max"] = results[i].Bedrooms;
      }
      // Get Bath Min & Max
      if (!store.processed["bath-min"] || results[i].Bathrooms < store.processed["bath-min"]) {
        store.processed["bath-min"] = results[i].Bathrooms;
      }
      if (!store.processed["bath-max"] || results[i].Bathrooms < store.processed["bath-max"]) {
        store.processed["bath-max"] = results[i].Bathrooms;
      }
      // Get Rent Min & Max
      if (!store.processed.rentmin || results[i].RentMin < store.processed.renmin) {
        if (results[i].RentMin.indexOf('.') > 0) {
          store.processed.rentmin = results[i].RentMin.substring(0, results[i].RentMin.indexOf('.'));
        } else {
          store.processed.rentmin = results[i].RentMin;
        }
      }
      if (!store.processed.rentmax || results[i].RentMax > store.processed.rentmax) {
        if (results[i].RentMax.indexOf('.') > 0){
          store.processed.rentmax = results[i].RentMax.substring(0, results[i].RentMax.indexOf('.'));
        } else {
          store.processed.rentmax = results[i].RentMax;
        }
      }
    }
  }
  store.processed.rentmin = "$" + store.processed.rentmin;
  store.processed.rentmax = "$" + store.processed.rentmax;
  
  // console.log('store', store);
  return store;
}


/*
*
* singeDataPopulator
*
* Injects data into views
*
* @params:    params {object} data - store object
*
*/

function singleDataPopulator(data) {
  if(data.processed.rentmin === data.processed.rentmax){
    data.processed.rentmax = "";
    $j(emdash).empty();
  }

  $j(sizeDataEl).empty().html(data.processed.sqfoot);
  $j(bedDataEl).empty().html(data.processed.bed);
  $j(bathDataEl).empty().html(data.processed.bath);
  $j(minPriceDataEl).empty().html(data.processed.rentmin);
  $j(maxPriceDataEl).empty().html(data.processed.rentmax);
  $j(dataWrapperEl).addClass(toggleData);
}


/*
*
* rangeDataPopulator
*
* Injects data into views
*
* @params:    params {object} data - data object
*
*/

function rangeDataPopulator(data) {
  var sqfootRange;
  var bedRange;
  var bathRange;

  if(data.processed["sqfoot-min"] === data.processed["sqfoot-max"]) {
    sqfootRange = data.processed["sqfoot-min"];
  } else {
    sqfootRange = data.processed["sqfoot-min"].toString();
    sqfootRange += " — " 
    sqfootRange += data.processed["sqfoot-max"].toString();
  }
  if(data.processed["bed-min"] === data.processed["bed-max"]) {
    bedRange = data.processed["bed-min"] === "0" ? 'Studio' : data.processed["bed-min"];
  } else {
    bedRange = data.processed["bed-min"];
    bedRange += " — ";
    bedRange +=  data.processed["bed-max"];
  }
  if(data.processed["bath-min"] === data.processed["bath-max"]) {
    bathRange = data.processed["bath-min"];
  } else {
    bathRange = data.processed["bath-min"];
    bathRange += " — ";
    bathRange += data.processed["bath-max"];
  }
  if(data.processed.rentmin === data.processed.rentmax){
    data.processed.rentmax = "";
    $j(emdash).empty();
  }

  $j(sizeDataEl).empty().html(sqfootRange);  
  $j(bedDataEl).empty().html(bedRange);
  $j(bathDataEl).empty().html(bathRange);
  $j(minPriceDataEl).empty().html(data.processed.rentmin);
  $j(maxPriceDataEl).empty().html(data.processed.rentmax);
  $j(dataWrapperEl).addClass(toggleData);
}
  // <--end-->