// /* global jQuery Mustache:true */

/*
* AddEvents Constructor
*/
const addEvents = {
    toClass( {
        trigger,
        target,
        type = "click",
        callback,
    } = {} ) {
        const $trigger = document.getElementsByClassName( trigger );
        Array.prototype.forEach.call( $trigger, ( $el ) => {
            $el.addEventListener( type, ( e ) => {
                e.preventDefault();
                callback( $trigger, target );
            } );
        } );
    },
    toID( {
        trigger,
        target,
        type = "click",
        callback,
    } = {} ) {
        const $trigger = document.getElementById( trigger );
        $trigger.addEventListener( type, ( e ) => {
            e.preventDefault();
            callback( $trigger, target );
        } );
    },
};

/*
* Toggle Mobile Menu
*/
const toggleMobileMenu = () => {
    addEvents.toClass( {
        trigger: "js-menu-toggle",
        target: "mobile-menu",
        callback: ( $trigger, target ) => {
            const $target = document.getElementById( target );
            $target.classList.toggle( "open" );
        },
    } );
};

/*
* Toggle Map in '/life-style'
*/
const toggleMap = () => {
    addEvents.toID( {
        trigger: "toggle-map",
        target: "maps",
        callback: ( $trigger, target ) => {
            const $target = document.getElementById( target );
            $trigger.classList.toggle( "has-arrow-down" );
            $trigger.classList.toggle( "has-arrow-up" );
            $target.classList.toggle( "hidden" );
        },
    } );
};

/*
* Scroll Down
*/
const scrollDown = () => {

};

// $( ".navigate" ).on( "click", ( event ) => {
//     event.preventDefault();
//     const $target = $( $( this ).attr( "href" ) );
//     console.log( "this href", $( this ).attr( "class" ) );
//     scrollTo( $target );
// } );

// jQuery( document ).ready( ( $ ) => {
//     /*
//     * Mobile Menu
//     */
//     $( ".js-menu-toggle" ).on( "click", ( event ) => {
//         event.preventDefault();
//         const $target = $( "#mobile-menu" );
//         $target.toggleClass( "open" );
//     } );

//     /*
//     * Toggle Map in /life-style
//     */
//     $( "#toggle-map" ).on( "click", ( event ) => {
//         event.preventDefault();
//         $( this ).toggleClass( "has-arrow-down has-arrow-up" );
//         const $target = $( "#maps" );
//         $target.toggleClass( "hidden" );
//     } );

//     /*
//     * Scroll down to navigation
//     */
//     $( ".navigate" ).on( "click", ( event ) => {
//         event.preventDefault();
//         const $target = $( $( this ).attr( "href" ) );
//         console.log( "this href", $( this ).attr( "class" ) );
//         scrollTo( $target );
//     } );

//     /*
//     * Unsure?
//     */
//     $( "#hnypt" ).remove();

//     /*
//     * Unsure?
//     */
//     $( "#dragmap" ).draggable( {
//         containment: ".map-contanier",
//         scroll: false,
//     } );

//     // const $floorplanssubnav = $( "#floor-plans-subnavigation" );
//     const $floorplan = $( "#floor-plan" );
//     const templates = {
//         navigation: $( "#template-subnavigation" ).html(),
//         floorplan: $( "#template-floorplan" ).html(),
//         sitemap: $( "#template-sitemap" ).html(),
//     };
//     Mustache.parse( templates.navigation );
//     Mustache.parse( templates.floorplan );
//     $( "body" ).on( "click", ".js-load-floorplans a.planns", ( event ) => {
//         event.preventDefault();
//         // console.log( "on click" );
//         $( this ).siblings( "a" ).removeClass( "active" );
//         $( this ).addClass( "active" );
//         // const data = {
//         //     action: "floor-plans",
//         //     term_id: $( this ).data( "termid" ),
//         // };
//         // // grab the floor plans!
//         // $.get( STANDARD.ajaxurl, data, ( data ) => { // SOAP SOAP SOAP
//         // replace the plan links
//         // $floorplanssubnav.empty().html( floorPlanLinks( data ) );
//         // replace the default plan
//         // $floorplan.empty().html( floor_plan( data.plans[0] ) );
//         // soap_call
//         // const params = paramBuilder("div#floor-plan", "span#floorplan-name");
//         // <--- Specify wrapper element and title of floorplan
//         // ajaxRequester(params, function(data){
//         // const parsedData = soapResponseParser(data);
//         // if(parsedData.raw.range === "single"){
//         //   singleDataPopulator(parsedData);
//         // } else if (parsedData.raw.range === "range" || parsedData.raw.range === "fetchAll"){
//         //   rangeDataPopulator(parsedData);
//         // }
//         // } );
//         // },"json" );
//     } );
//     $( "body" ).on( "click", ".js-load-floorplan a", ( event ) => {
//         event.preventDefault();
//         $( this ).siblings( "a" ).removeClass( "active" );
//         $( this ).addClass( "active" );
//         // const data = {
//         //     "action" : "floor-plan",
//         //     "post_id" : $( this ).data( "postid" )
//         // }
//     // $.get( STANDARD.ajaxurl, data, ( data ) => {
//         // replace the default plan
//         // $floorplan.empty().html( floor_plan( data ) );
//         // soap_call
//         // const params = paramBuilder("div#floor-plan", "span#floorplan-name");
//         // <--- Specify wrapper element and title of floorplan
//         // ajaxRequester(params, function(data){
//         //   const parsedData = soapResponseParser(data);
//         //   if(parsedData.raw.range === "single"){
//         //     singleDataPopulator(parsedData);
//         //   } else if (parsedData.raw.range === "range" || parsedData.raw.range === "fetchAll"){
//         //     rangeDataPopulator(parsedData);
//         //   }
//         // } );
//         // }, "json" );
//     } );
//     $( "body" ).on( "click", ".js-load-sitemap", ( event ) => {
//         event.preventDefault();
//         $( this ).siblings( "a" ).removeClass( "active" );
//         $( this ).addClass( "active" );
//         $( "#floor-plans-subnavigation" ).empty();
//         const data = {
//             img: $( this ).data( "img" ),
//             pdf: $( this ).data( "pdf" ),
//         };
//         // console.log(data);
//         $floorplan.empty().html( siteMap( data ) );
//     } );
//     // function floorPlanLinks( data ){
//     //     return Mustache.render( templates.navigation, data );
//     // }
//     // function floor_plan( data ){
//     //     return Mustache.render( templates.floorplan, data );
//     // }
//     function siteMap( data ) {
//         return Mustache.render( templates.sitemap, data );
//     }
//     // neighborhood
//     const $window = $( window );
//     let windowwidth = $window.width();
//     const MAPWIDTH = 2284;
//     const $map = $( "#neighborhood-map .map" );
//     if ( windowwidth > 1300 ) {
//         setMapMarginLeft( windowwidth, 200 );
//     } else {
//         setMapMarginLeft( windowwidth, 700 );
//     }
//     $( window ).on( "resize", ( event ) => {
//         event.preventDefault();
//         windowwidth = $window.width();
//         if ( windowwidth > 1300 ) {
//             setMapMarginLeft( windowwidth, 200 );
//         } else {
//             setMapMarginLeft( windowwidth, 700 );
//         }
//     } );
//     function setMapMarginLeft( offset ) {
//         const width = MAPWIDTH - windowwidth - offset;
//         $map.css( { marginLeft: `"-"${ width }px` } );
//     }
//     $( "#floor-plans-navigation a" ).on( "click", ( event ) => {
//         event.preventDefault();
//     } );
//     // alt hovers
//     $( "#alt-hovers a" ).on( "mouseover", ( event ) => {
//         event.preventDefault();
//         const $target = $( $( this ).attr( "href" ) ).find( ".point-hover" );
//         $target.show();
//     } );
//     $( "#alt-hovers a" ).on( "mouseleave", ( event ) => {
//         event.preventDefault();
//         const $target = $( $( this ).attr( "href" ) ).find( ".point-hover" );
//         $target.hide();
//     } );
//     $( "#spot-navigation a" ).on( "click", ( event ) => {
//         event.preventDefault();
//         const $target = $( $( this ).attr( "href" ) );
//         const src = $( this ).data( "map" );
//         $( "#spot-navigation a" ).removeClass( "active" );
//         $( this ).addClass( "active" );
//         $( ".the-spot" ).addClass( "hide" );
//         $target.removeClass( "hide" );
//         $( "#i-am-the-map" ).attr( "src", src );
//     } );
//     $( "#gallery-images" ).slick( {
//         slides: ".slide",
//         arrows: false,
//     } );
//     $( "#gallery-left" ).on( "click", ( event ) => {
//         event.preventDefault();
//         $( "#gallery-images" ).slickPrev();
//     } );
//     $( "#gallery-right" ).on( "click", ( event ) => {
//         event.preventDefault();
//         $( "#gallery-images" ).slickNext();
//     } );
//     $( "#header-slides" ).slick( {
//         slides: ".slide",
//         arrows: false,
//         autoplay: true,
//         autoplaySpeed: 5000,
//     } );
//     $( "#opening-left" ).on( "click", ( event ) => {
//         event.preventDefault();
//         $( "#header-slides" ).slickPrev();
//     } );
//     $( "#opening-right" ).on( "click", ( event ) => {
//         event.preventDefault();
//         $( "#header-slides" ).slickNext();
//     } );
//     function scrollTo( $element ) {
//         $( "html, body" ).animate( { scrollTop: $element.offset().top }, 500 );
//     }
//     /* ############### NEW CODE HERE ASIF ############### */
//     // popdown stuff
//     setTimeout( () => {
//         jQuery( "#popdown" ).addClass( "active" );
//     }, 1200 );
//     jQuery( document.body ).on( "click", ".popdown-close", () => {
//         jQuery( "#popdown" ).removeClass( "active" );
//     } );

//     /*
//     * Unsure?
//     */
//     const fetchData = ( {
//         request,
//         type,
//         filter,
//     } = {} ) => {
//         const host = window.location.hostname;
//         const isDevEnv = ( host.indexOf( "localhost" ) > 0 );
//         const basePath = ( isDevEnv ) ? `${ host }/thestandard_app_v18/` : host;
//         const middleWare = "/rest/?apiKey=SMASH&user=HULK&token=true";
//         const params = `&request=${ request }&type=${ type }&filter=${ filter }`;
//         console.log( "assemble request: ", `${ basePath }${ middleWare }${ params }` );
//     };
//     fetchData( {
//         request: "units",
//         type: "name",
//         filter: "lighthouse",
//     } );
// } );

document.onreadystatechange = () => {
    if ( document.readyState === "complete" ) {
        // toggle classes
        toggleMobileMenu();
        toggleMap();

        // scroll
        scrollDown();
    }
};
