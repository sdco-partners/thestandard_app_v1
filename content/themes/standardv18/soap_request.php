<?php 
  require_once('soap/config.php');
  require_once('soap/query_builder.php');

  $response = array();
  $response['params'] = $_POST;

  

  // Query Construction
  $Query = new QueryBuilder();
  $this_query;

  if(isset($_POST['range'])) {
    $response['range'] = $_POST['range'];
  } else {
    $response['error'] = "Incomplete request parameters: Please specify whether requesting single value, a range of values, or all data. ";
    echo json_encode($response);
    return;
  }

  if($response['range'] == "single" && isset($_POST['name']) && isset($_POST['value'])) {
    $name = $_POST['name'];
    $value = $_POST['value'];
    
    // build single query
    $this_query = $Query->single($name, $value, $sess_auth->PmcID, $sess_auth->SiteID);

  } elseif ($response['range'] == "range" && isset($_POST['name']) && isset($_POST['minValue']) && isset($_POST['maxValue'])) {
    $name = $_POST['name'];
    $min_value = $_POST['minValue'];
    $max_value = $_POST['maxValue'];

    // build range query
    $this_query = $Query->range($name, $min_value, $max_value, $sess_auth->PmcID, $sess_auth->SiteID);

  } elseif ($response['range'] == "fetchAll" && isset($_POST['name']) && isset($_POST['value'])){
    $response['fetchAll']['name'] = $_POST['name'];
    $response['fetchAll']['value'] = $_POST['value'];
      

    // build fetchAll query
    $this_query = $Query->fetchAll();
  } else {

    $response['error'] = "Incomplete range request parameters: See documentation on proper key/value formatting.";
    echo json_encode($response);
    return;
  }

  $response['query'] = $this_query;


  // Client & Header
  $Client = new SoapClient($floor_plan_wsdl, array('trace' =>  $trace, 'exceptions' => $exceptions));
  $Header = new SoapHeader($header_url, 'UserAuthInfo', $sess_auth, false); 

  // SOAP Call
  try {
    $response['soapCall'] = $Client->__soapCall('List', array('List' => $this_query), NULL, $Header);

    // Error Handling
  } catch (Exception $e) {
    $response['error'] = $e -> getMessage();
    $response['lastresponse'] = $Client->__getLastResponse();
    echo json_encode($response);
    return;
  }
  
  // Return response
  echo json_encode($response);
  return;

?>