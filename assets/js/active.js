
(function($) {
    "use strict";

    $(document).ready( function() {

        new WOW().init();        
        
        if($('.brand-carousel-active').length > 0) {
            $('.brand-carousel-active').slick({
                infinite: false,
                slidesToShow: 2, 
                slidesToScroll: 2, 
                arrows: true,
                speed: 800,
                prevArrow: $('.collection-nav-prev'),
                nextArrow: $('.collection-nav-next'),
                responsive: [
                    {
                      breakpoint: 1600,
                      settings: {
                        slidesToShow: 2
                      }
                    },
                    {
                      breakpoint: 1191,
                      settings: {
                        slidesToShow: 2
                      }
                    },
                    {
                      breakpoint: 768,
                      settings: {
                        slidesToShow: 1,
                        center: true,
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1
                      }
                    }
                ],

            });
        }

        
        if($('.product-img-gallery').length > 0) {
            $('.product-img-gallery').slick({
                slidesToShow: 1, 
                slidesToScroll: 1, 
                arrows: false,
                dots: true,
                speed: 1100,
                autoplay: true,
            });
        }

        /*==========================
           Scroll To Up Init
        ============================*/
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '1110', // Distance from top before showing element (px)
            topSpeed: 2000, // Speed back to top (ms)
            animation: 'slide', // Fade, slide, none
            animationInSpeed: 300, // Animation in speed (ms)
            animationOutSpeed: 300, // Animation out speed (ms)
            scrollText: '<i class="icon-right"></i>', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });

        // Sticky Menu
        $(window).scroll(function() {
            var Width = $(document).width();

            if ($("body").scrollTop() > 100 || $("html").scrollTop() > 100) {
                if (Width > 767) {
                    $(".main-header-wrapper").addClass("sticky");
                }
            } else {
                $(".main-header-wrapper").removeClass("sticky");
            }
        });

        
        $('#hamburger').on('click', function() {            
            $('.mobile-nav').addClass('show');
            $('.overlay').addClass('active');
        });

        $('.close-nav').on('click', function() {            
            $('.mobile-nav').removeClass('show');            
            $('.overlay').removeClass('active');          
        });

        $(".overlay").on("click", function () {
            $(".mobile-nav").removeClass("show");
            $('.overlay').removeClass('active');
        });

        $("#mobile-menu").metisMenu();


    }); // end document ready function

    /** LoadingOverlay - A flexible loading overlay jQuery plugin - Author : Gaspare Sganga - Version : 2.1.7 **/
    !function(e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof module&&module.exports?e(require("jquery")):e(jQuery)}(function(g,a){"use strict";var t={background:"rgba(255, 255, 255, 0.8)",backgroundClass:"",image:"<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1000 1000'><circle r='80' cx='500' cy='90'/><circle r='80' cx='500' cy='910'/><circle r='80' cx='90' cy='500'/><circle r='80' cx='910' cy='500'/><circle r='80' cx='212' cy='212'/><circle r='80' cx='788' cy='212'/><circle r='80' cx='212' cy='788'/><circle r='80' cx='788' cy='788'/></svg>",imageAnimation:"2000ms rotate_right",imageAutoResize:!0,imageResizeFactor:1,imageColor:"#202020",imageClass:"",imageOrder:1,fontawesome:"",fontawesomeAnimation:"",fontawesomeAutoResize:!0,fontawesomeResizeFactor:1,fontawesomeColor:"#202020",fontawesomeOrder:2,custom:"",customAnimation:"",customAutoResize:!0,customResizeFactor:1,customOrder:3,text:"",textAnimation:"",textAutoResize:!0,textResizeFactor:.5,textColor:"#202020",textClass:"",textOrder:4,progress:!1,progressAutoResize:!0,progressResizeFactor:.25,progressColor:"#a0a0a0",progressClass:"",progressOrder:5,progressFixedPosition:"",progressSpeed:200,progressMin:0,progressMax:100,size:50,maxSize:120,minSize:20,direction:"column",fade:!0,resizeInterval:50,zIndex:2147483647},c={overlay:{"box-sizing":"border-box",position:"relative",display:"flex","flex-wrap":"nowrap","align-items":"center","justify-content":"space-around"},element:{"box-sizing":"border-box",overflow:"visible",flex:"0 0 auto",display:"flex","justify-content":"center","align-items":"center"},element_svg:{width:"100%",height:"100%"},progress_fixed:{position:"absolute",left:"0",width:"100%"},progress_wrapper:{position:"absolute",top:"0",left:"0",width:"100%",height:"100%"},progress_bar:{position:"absolute",left:"0"}},n={count:0,container:a,settings:a,wholePage:a,resizeIntervalId:a,text:a,progress:a},s={animations:["rotate_right","rotate_left","fadein","pulse"],progressPosition:["top","bottom"]},d={animations:{name:"rotate_right",time:"2000ms"},fade:[400,200]};function o(e,s){e=g(e),s.size=w(s.size),s.maxSize=parseInt(s.maxSize,10)||0,s.minSize=parseInt(s.minSize,10)||0,s.resizeInterval=parseInt(s.resizeInterval,10)||0;var t=p(e),a=u(e);if(!1===a){if((a=g.extend({},n)).container=e,a.wholePage=e.is("body"),t=g("<div>",{class:"loadingoverlay"}).css(c.overlay).css("flex-direction","row"===s.direction.toLowerCase()?"row":"column"),s.backgroundClass?t.addClass(s.backgroundClass):t.css("background",s.background),a.wholePage&&t.css({position:"fixed",top:0,left:0,width:"100%",height:"100%"}),void 0!==s.zIndex&&t.css("z-index",s.zIndex),s.image){g.isArray(s.imageColor)?0===s.imageColor.length?s.imageColor=!1:1===s.imageColor.length?s.imageColor={fill:s.imageColor[0]}:s.imageColor={fill:s.imageColor[0],stroke:s.imageColor[1]}:s.imageColor&&(s.imageColor={fill:s.imageColor});var o=v(t,s.imageOrder,s.imageAutoResize,s.imageResizeFactor,s.imageAnimation);"<svg"===s.image.slice(0,4).toLowerCase()&&"</svg>"===s.image.slice(-6).toLowerCase()?(o.append(s.image),o.children().css(c.element_svg),!s.imageClass&&s.imageColor&&o.find("*").css(s.imageColor)):".svg"===s.image.slice(-4).toLowerCase()||"data:image/svg"===s.image.slice(0,14).toLowerCase()?g.ajax({url:s.image,type:"GET",dataType:"html",global:!1}).done(function(e){o.html(e),o.children().css(c.element_svg),!s.imageClass&&s.imageColor&&o.find("*").css(s.imageColor)}):o.css({"background-image":"url("+s.image+")","background-position":"center","background-repeat":"no-repeat","background-size":"cover"}),s.imageClass&&o.addClass(s.imageClass)}if(s.fontawesome){o=v(t,s.fontawesomeOrder,s.fontawesomeAutoResize,s.fontawesomeResizeFactor,s.fontawesomeAnimation).addClass("loadingoverlay_fa");g("<div>",{class:s.fontawesome}).appendTo(o),s.fontawesomeColor&&o.css("color",s.fontawesomeColor)}if(s.custom)o=v(t,s.customOrder,s.customAutoResize,s.customResizeFactor,s.customAnimation).append(s.custom);if(s.text&&(a.text=v(t,s.textOrder,s.textAutoResize,s.textResizeFactor,s.textAnimation).addClass("loadingoverlay_text").text(s.text),s.textClass?a.text.addClass(s.textClass):s.textColor&&a.text.css("color",s.textColor)),s.progress){o=v(t,s.progressOrder,s.progressAutoResize,s.progressResizeFactor,!1).addClass("loadingoverlay_progress");var r=g("<div>").css(c.progress_wrapper).appendTo(o);a.progress={bar:g("<div>").css(c.progress_bar).appendTo(r),fixed:!1,margin:0,min:parseFloat(s.progressMin),max:parseFloat(s.progressMax),speed:parseInt(s.progressSpeed,10)};var i=(s.progressFixedPosition+"").replace(/\s\s+/g," ").toLowerCase().split(" ");2===i.length&&y(i[0])?(a.progress.fixed=i[0],a.progress.margin=w(i[1])):2===i.length&&y(i[1])?(a.progress.fixed=i[1],a.progress.margin=w(i[0])):1===i.length&&y(i[0])&&(a.progress.fixed=i[0],a.progress.margin=0),"top"===a.progress.fixed?o.css(c.progress_fixed).css("top",a.progress.margin?a.progress.margin.value+(a.progress.margin.fixed?a.progress.margin.units:"%"):0):"bottom"===a.progress.fixed&&o.css(c.progress_fixed).css("top","auto"),s.progressClass?a.progress.bar.addClass(s.progressClass):s.progressColor&&a.progress.bar.css("background",s.progressColor)}s.fade?!0===s.fade?s.fade=d.fade:"string"==typeof s.fade||"number"==typeof s.fade?s.fade=[s.fade,s.fade]:g.isArray(s.fade)&&s.fade.length<2&&(s.fade=[s.fade[0],s.fade[0]]):s.fade=[0,0],s.fade=[parseInt(s.fade[0],10),parseInt(s.fade[1],10)],a.settings=s,t.data("loadingoverlay_data",a),e.data("loadingoverlay",t),t.fadeTo(0,.01).appendTo("body"),f(e,!0),0<s.resizeInterval&&(a.resizeIntervalId=setInterval(function(){f(e,!1)},s.resizeInterval)),t.fadeTo(s.fade[0],1)}a.count++}function r(e,s){var t=p(e=g(e)),a=u(e);!1!==a&&(a.count--,(s||a.count<=0)&&t.animate({opacity:0},a.settings.fade[1],function(){a.resizeIntervalId&&clearInterval(a.resizeIntervalId),g(this).remove(),e.removeData("loadingoverlay")}))}function i(e){f(g(e),!0)}function l(e,s){var t=u(e=g(e));!1!==t&&t.text&&(!1===s?t.text.hide():t.text.show().text(s))}function m(e,s){var t=u(e=g(e));if(!1!==t&&t.progress)if(!1===s)t.progress.bar.hide();else{var a=100*((parseFloat(s)||0)-t.progress.min)/(t.progress.max-t.progress.min);a<0&&(a=0),100<a&&(a=100),t.progress.bar.show().animate({width:a+"%"},t.progress.speed)}}function f(e,t){var s=p(e),a=u(e);if(!1!==a){if(!a.wholePage){var o="fixed"===e.css("position"),r=o?e[0].getBoundingClientRect():e.offset();s.css({position:o?"fixed":"absolute",top:r.top+parseInt(e.css("border-top-width"),10),left:r.left+parseInt(e.css("border-left-width"),10),width:e.innerWidth(),height:e.innerHeight()})}if(a.settings.size){var i=a.wholePage?g(window):e,n=a.settings.size.value;a.settings.size.fixed||(n=Math.min(i.innerWidth(),i.innerHeight())*n/100,a.settings.maxSize&&n>a.settings.maxSize&&(n=a.settings.maxSize),a.settings.minSize&&n<a.settings.minSize&&(n=a.settings.minSize)),s.children(".loadingoverlay_element").each(function(){var e=g(this);if(t||e.data("loadingoverlay_autoresize")){var s=e.data("loadingoverlay_resizefactor");e.hasClass("loadingoverlay_fa")||e.hasClass("loadingoverlay_text")?e.css("font-size",n*s+a.settings.size.units):e.hasClass("loadingoverlay_progress")?(a.progress.bar.css("height",n*s+a.settings.size.units),a.progress.fixed?"bottom"===a.progress.fixed&&e.css("bottom",a.progress.margin?a.progress.margin.value+(a.progress.margin.fixed?a.progress.margin.units:"%"):0).css("bottom","+="+n*s+a.settings.size.units):a.progress.bar.css("top",e.position().top).css("top","-="+n*s*.5+a.settings.size.units)):e.css({width:n*s+a.settings.size.units,height:n*s+a.settings.size.units})}})}}}function p(e){return e.data("loadingoverlay")}function u(e){var s=p(e),t=void 0===s?a:s.data("loadingoverlay_data");return void 0===t?(g(".loadingoverlay").each(function(){var e=g(this),s=e.data("loadingoverlay_data");document.body.contains(s.container[0])||(s.resizeIntervalId&&clearInterval(s.resizeIntervalId),e.remove())}),!1):(s.toggle(e.is(":visible")),t)}function v(e,s,t,a,o){var r=g("<div>",{class:"loadingoverlay_element",css:{order:s}}).css(c.element).data({loadingoverlay_autoresize:t,loadingoverlay_resizefactor:a}).appendTo(e);if(!0===o&&(o=d.animations.time+" "+d.animations.name),"string"==typeof o){var i,n,l=o.replace(/\s\s+/g," ").toLowerCase().split(" ");2===l.length&&x(l[0])&&h(l[1])?(i=l[1],n=l[0]):2===l.length&&x(l[1])&&h(l[0])?(i=l[0],n=l[1]):1===l.length&&x(l[0])?(i=d.animations.name,n=l[0]):1===l.length&&h(l[0])&&(i=l[0],n=d.animations.time),r.css({"animation-name":"loadingoverlay_animation__"+i,"animation-duration":n,"animation-timing-function":"linear","animation-iteration-count":"infinite"})}return r}function x(e){return!isNaN(parseFloat(e))&&("s"===e.slice(-1)||"ms"===e.slice(-2))}function h(e){return-1<s.animations.indexOf(e)}function y(e){return-1<s.progressPosition.indexOf(e)}function w(e){return!(!e||e<0)&&("string"==typeof e&&-1<["vmin","vmax"].indexOf(e.slice(-4))?{fixed:!0,units:e.slice(-4),value:e.slice(0,-4)}:"string"==typeof e&&-1<["rem"].indexOf(e.slice(-3))?{fixed:!0,units:e.slice(-3),value:e.slice(0,-3)}:"string"==typeof e&&-1<["px","em","cm","mm","in","pt","pc","vh","vw"].indexOf(e.slice(-2))?{fixed:!0,units:e.slice(-2),value:e.slice(0,-2)}:{fixed:!1,units:"px",value:parseFloat(e)})}g.LoadingOverlaySetup=function(e){g.extend(!0,t,e)},g.LoadingOverlay=function(e,s){switch(e.toLowerCase()){case"show":o("body",g.extend(!0,{},t,s));break;case"hide":r("body",s);break;case"resize":i("body");break;case"text":l("body",s);break;case"progress":m("body",s)}},g.fn.LoadingOverlay=function(e,s){switch(e.toLowerCase()){case"show":return this.each(function(){o(this,g.extend(!0,{},t,s))});case"hide":return this.each(function(){r(this,s)});case"resize":return this.each(function(){i(this)});case"text":return this.each(function(){l(this,s)});case"progress":return this.each(function(){m(this,s)})}},g(function(){g("head").append(["<style>","@-webkit-keyframes loadingoverlay_animation__rotate_right {","to {","-webkit-transform : rotate(360deg);","transform : rotate(360deg);","}","}","@keyframes loadingoverlay_animation__rotate_right {","to {","-webkit-transform : rotate(360deg);","transform : rotate(360deg);","}","}","@-webkit-keyframes loadingoverlay_animation__rotate_left {","to {","-webkit-transform : rotate(-360deg);","transform : rotate(-360deg);","}","}","@keyframes loadingoverlay_animation__rotate_left {","to {","-webkit-transform : rotate(-360deg);","transform : rotate(-360deg);","}","}","@-webkit-keyframes loadingoverlay_animation__fadein {","0% {","opacity   : 0;","-webkit-transform : scale(0.1, 0.1);","transform : scale(0.1, 0.1);","}","50% {","opacity   : 1;","}","100% {","opacity   : 0;","-webkit-transform : scale(1, 1);","transform : scale(1, 1);","}","}","@keyframes loadingoverlay_animation__fadein {","0% {","opacity   : 0;","-webkit-transform : scale(0.1, 0.1);","transform : scale(0.1, 0.1);","}","50% {","opacity   : 1;","}","100% {","opacity   : 0;","-webkit-transform : scale(1, 1);","transform : scale(1, 1);","}","}","@-webkit-keyframes loadingoverlay_animation__pulse {","0% {","-webkit-transform : scale(0, 0);","transform : scale(0, 0);","}","50% {","-webkit-transform : scale(1, 1);","transform : scale(1, 1);","}","100% {","-webkit-transform : scale(0, 0);","transform : scale(0, 0);","}","}","@keyframes loadingoverlay_animation__pulse {","0% {","-webkit-transform : scale(0, 0);","transform : scale(0, 0);","}","50% {","-webkit-transform : scale(1, 1);","transform : scale(1, 1);","}","100% {","-webkit-transform : scale(0, 0);","transform : scale(0, 0);","}","}","</style>"].join(" "))})});


})(jQuery); // End jQuery
