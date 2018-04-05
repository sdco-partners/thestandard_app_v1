// /* global jQuery Mustache:true */

/*
* AddEvents Constructor
*/
const addEvents = {
    toClass( {
        trigger,
        target = null,
        type = "click",
        callback,
    } = {} ) {
        const $trigger = document.getElementsByClassName( trigger );
        if ( $trigger && $trigger.length > 0 ) {
            Array.prototype.forEach.call( $trigger, ( $el ) => {
                $el.addEventListener( type, ( e ) => {
                    e.preventDefault();
                    const $target = document.getElementById( target );
                    callback( $trigger, $target );
                } );
            } );
        }
    },
    toID( {
        trigger,
        target = null,
        type = "click",
        callback,
    } = {} ) {
        const $trigger = document.getElementById( trigger );
        if ( $trigger ) {
            $trigger.addEventListener( type, ( e ) => {
                e.preventDefault();
                const $target = document.getElementById( target );
                callback( $trigger, $target );
            } );
        }
    },
};

/*
* Toggle Mobile Menu
*/
const toggleMobileMenu = () => {
    addEvents.toClass( {
        trigger: "js-menu-toggle",
        target: "mobile-menu",
        callback: ( $trigger, $target ) => {
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
        callback: ( $trigger, $target ) => {
            $trigger.classList.toggle( "has-arrow-down" );
            $trigger.classList.toggle( "has-arrow-up" );
            $target.classList.toggle( "hidden" );
        },
    } );
};

/*
* Scroll Trigger
*/
const scroll = {
    curr: 0,
    end: 0,
    trigger( trigger, target ) {
        addEvents.toClass( {
            trigger,
            target,
            callback: ( $trigger, $target ) => {
                this.to( $target );
            },
        } );
    },
    to( $target ) {
        this.end = $target.getBoundingClientRect().top;
        setTimeout( this.moveScroll.bind( this ), 20 );
    },
    moveScroll() {
        this.curr += 50;
        document.body.scrollTop = this.curr;
        document.documentElement.scrollTop = this.curr;
        if ( this.curr < this.end ) {
            setTimeout( this.moveScroll.bind( this ), 20 );
        }
    },
};

/*
* scrollOnNavigate
*/
const scrollNavigate = () => {
    const $navigate = document.getElementsByClassName( "navigate" );
    if ( $navigate && $navigate.length > 0 ) {
        const { href } = $navigate[ 0 ];
        const target = href.split( "#" )[ 1 ];
        scroll.trigger( "navigate", target );
    }
};

/*
* Prevent Drag
*/
const draggable = () => {
    const $dragmap = document.getElementById( "dragmap" );
    if ( $dragmap && $dragmap.draggable ) {
        $dragmap.draggable( {
            containment: ".map-contanier",
            scroll: false,
        } );
    }
};

/*
* Popdown Logic
*/
const popDownLogic = () => {
    const $popDown = document.getElementById( "popdown" );
    if ( $popDown ) {
        setTimeout( () => {
            $popDown.classList.add( "active" );
        }, 1200 );
    }
    addEvents.toClass( {
        trigger: "popdown-close",
        target: "popdown",
        callback: ( $trigger, $target ) => {
            $target.classList.remove( "active" );
        },
    } );
};

/*
* slideShow
*/
class SlideShow {
    constructor( {
        target,
        timer = 6000,
        indx = 0,
        pause = false,
        bttnNext = `${ target }-right`,
        bttnPrev = `${ target }-right`,
    } ) {
        Object.assign( this, {
            timer,
            indx,
            pause,
        } );
        this.$gallery = document.getElementById( target );
        this.slides = this.$gallery.children;
        this.timer = timer;
        this.$bttnPrev = document.getElementById( bttnPrev );
        this.$bttnPrev.addEventListener( "click", ( e ) => {
            e.preventDefault();
            this.onClick( "left" );
        } );
        this.$bttnNext = document.getElementById( bttnNext );
        this.$bttnNext.addEventListener( "click", ( e ) => {
            e.preventDefault();
            this.onClick( "right" );
        } );
    }

    start() {
        this.changeSlide();
        this.countDown();
    }

    changeSlide() {
        Array.prototype.forEach.call( this.slides, ( slide, indx ) => {
            if ( indx > this.indx ) this.addFade( slide );
            else this.removeFade( slide );
        } );
    }

    resetSlides() {
        Array.prototype.forEach.call( this.slides, ( slide ) => {
            slide.classList.remove( "fade" );
        } );
    }

    static removeFade( slide ) {
        slide.classList.remove( "fade" );
    }

    static addFade( slide ) {
        slide.classList.add( "fade" );
    }

    onClick( direction ) {
        switch ( direction ) {
        case "left":
            this.setPause();
            this.prev();
            this.changeSlide();
            break;
        case "right":
            this.setPause();
            this.next();
            this.changeSlide();
            break;
        default:
            this.changeSlide();
        }
    }

    next() {
        this.indx += 1;
        this.checkIndx();
    }

    prev() {
        this.indx -= 1;
        this.checkIndx();
    }

    checkIndx() {
        if ( this.indx < 0 ) {
            this.indx = this.slides.length - 1;
        } else if ( this.indx > this.slides.length - 1 ) {
            this.indx = 0;
        }
    }

    setPause( pauseTime = 6000 ) {
        if ( !this.pause ) {
            this.pause = true;
            setTimeout( () => {
                this.pause = false;
            }, pauseTime );
        }
    }

    resetTime( time = 6000 ) {
        this.timer = time;
    }

    spendTime() {
        this.timer -= 1000;
    }

    countDown() {
        if ( this.timer === 0 ) {
            this.next();
            this.changeSlide();
            this.resetTime();
        } else if ( !this.pause ) {
            this.spendTime();
        }
        setTimeout( this.countDown.bind( this ), 1000 );
    }
}
/*
* Initiate Slider
*/
const initSlider = () => {
    const $galleryImages = document.getElementById( "gallery-images" );
    if ( $galleryImages ) {
        const gallery = new SlideShow( "gallery-sliders" );
        gallery.start();
    }
    const $headerSlides = document.getElementById( "header-slides" );
    if ( $headerSlides ) {
        const headerGallery = new SlideShow( "header-slides" );
        headerGallery.start();
    }
};
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
        // menu
        toggleMobileMenu();

        // navigation
        scrollNavigate();

        // map
        toggleMap();
        draggable();

        // Popdown
        popDownLogic();

        // Slick
        initSlider();
    }
};
