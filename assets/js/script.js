(function($){
$(document).ready(function () {
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
    });
    $('.carousel.ports').carousel({
        indicators:true,
    });

    function autoplay(first) {
		if(!first){
        $('.carousel').carousel('next');
		}
        setTimeout(autoplay, 5000);
    }
    autoplay(true);
    try{
        $('#parallax').parallax();
    } catch (e) {

    }
    $(".hList > .menu-item > a").each(function () {
        $(this).addClass("menu");
        
        $(this).html('<p class="menu-title">' + $(this).text() + '</p>' + (($(this).next().length==1)?$(this).next()[0].outerHTML:""));
        if ($(this).next().length == 0) {
          //  $(this).append('<ul class="menu-dropdown"></ul>')
        }
        $(this).find("ul").addClass("menu-dropdown");
        $(this).next().remove();
    })
    AOS.init();
    var adjustmainmenu = function () {
       
        $("#topmenubar .nav-wrapper > .col").hide();
        $("#topmenubar .nav-wrapper .sitenamebox").show();
        $("#headermainmenu").show();
        $("#top-menu .menu-item").show();
        $("#topmenubar .menuicon").remove();
        $("#topmenubar .nav-wrapper .mobilemenuicon").show();
        $("#top-menu .menu .menu-title").show()
        if ($("#headermainmenu").position().top > 0) {
            $("#top-menu [class*=menu-item-203] .menu .menu-title").hide();
            $("#top-menu [class*=menu-item-203] .menu").prepend('<i class="material-icons menu-title menu-title-short menuicon">&#xe8a8;</i>');

            
            if ($("#headermainmenu").position().top > 0) {

                $("#top-menu [class*=menu-item-27] .menu .menu-title").hide();
                $("#top-menu [class*=menu-item-27] .menu").prepend('<i class="material-icons menu-title menu-title-short menuicon">&#xe3c9;</i>');
               
                if ($("#headermainmenu").position().top > 0) {

                    $("#top-menu [class*=menu-item-204] .menu .menu-title").hide();
                    $("#top-menu [class*=menu-item-204] .menu").prepend('<i class="material-icons menu-title menu-title-short menuicon">&#xe003;</i>');
                    if ($("#headermainmenu").position().top > 0) {
                        $("#top-menu [class*=menu-item-179] .menu .menu-title").hide();
                        $("#top-menu [class*=menu-item-179] .menu").prepend('<i class="material-icons menu-title menu-title-short menuicon">&#xe8f9;</i>');

                        if ($("#headermainmenu").position().top > 0) {


                            $("#topmenubar .nav-wrapper .mobilemenuicon").show();
                            $("#headermainmenu").hide();
                        }
                    }
                }
            }
        } else {

        }
    };
    $('.sidenav').sidenav();
    $(window).resize(function () {
        adjustmainmenu();
    });
    
    adjustmainmenu();
    $(document).ready(function () {

        ////$("body").on("click","#top-menu > li > a",
        ////    function (e) {
        ////        if (e.target != e.currentTarget) {
        ////            debugger;
        ////            e.preventDefault();
        ////        }

        ////    });

        adjustmainmenu();
    });
    var adjustsocialicons = function (resize) {
        
        if ($(".social-navigation").hasClass("sideleftsocial")&&($(window).scrollTop() + $(window).height() - 200) > $(".social-navigation").offset().top) {
            $(".social-navigation").hide();
            ////$("#background_css3").show();
        } else if (!$(".social-navigation").hasClass("sideleftsocial")) {
            $(".social-navigation").hide();
            ////$("#background_css3").show();
        }

        if (resize) {
            if ($(window).scrollTop() + $(window).height() > $("#colophon").offset().top) {
                $("#colophon").css("position", "relative");
                $("#background_css3").show();
            } else {
                $("#colophon").css("position", "initial");
                $("#background_css3").hide();
            }
        } else {
            $("#colophon").css("position", "initial");
           //// $("#background_css3").hide();
        }
        setTimeout(function() {
                $(".social-navigation").addClass("sideleftsocial");
                $(".social-navigation").show();
                
                if ($(window).scrollTop() + $(window).height() > $("#colophon").offset().top) {
                    
                    
                    $(".social-navigation").removeClass("sideleftsocial");
                    $(".social-navigation li>a").removeAttr("class");
                } else {
                    
                    
                    $(".social-navigation li>a").addClass("btn-floating waves-effect waves-circle waves-light");
                    $(".social-navigation #menu-item-99>a").addClass("blue darken-4 ");

                    $(".social-navigation #menu-item-100>a").addClass("grey darken-2");
                    $(".social-navigation #menu-item-101>a").addClass("cyan");
                    $(".social-navigation #menu-item-102>a").addClass("materialize-red");
                }
            },
            500);
    };
    $(window).scroll(function() {
        adjustsocialicons(true);

    });
    adjustsocialicons(false);
})
    function scrollFooter(scrollY, heightFooter) {
        console.log(scrollY);
        console.log(heightFooter);

        if (scrollY >= heightFooter) {
            $('footer').css({
                'bottom': '0px'
            });
        }
        else {
            $('footer').css({
                'bottom': '-' + heightFooter + 'px'
            });
        }
    }

    $(window).load(function () {
        var windowHeight = $(window).height(),
            footerHeight = $('footer').height(),
            heightDocument = (windowHeight) + ($('.content').height()) + ($('footer').height()) - 20;

        // Definindo o tamanho do elemento pra animar
        $('#scroll-animate, #scroll-animate-main').css({
            'height': heightDocument + 'px'
        });

        // Definindo o tamanho dos elementos header e conteúdo
        $('header').css({
            'height': windowHeight + 'px',
            'line-height': windowHeight + 'px'
        });

        $('.wrapper-parallax').css({
            'margin-top': windowHeight + 'px'
        });

        scrollFooter(window.scrollY, footerHeight);

        // ao dar rolagem
        window.onscroll = function () {
            var scroll = window.scrollY;

            $('#scroll-animate-main').css({
                'top': '-' + scroll + 'px'
            });

            $('header').css({
                'background-position-y': 50 - (scroll * 100 / heightDocument) + '%'
            });

            scrollFooter(scroll, footerHeight);
        }
    });


$(document).ready(function () {





    M.updateTextFields();
	if(jQuery(".entry-image").next(".carousel").length==1){
		jQuery(".entry-image").remove()
	};
	setTimeout(function(){
		$("input[type=submit]").addClass("btn waves-effect waves-light btn-small dark-green");
		},1000);
	

	var background = {}

	background.initializr = function () {

	    var $this = this;



	    //option
	    $this.id = "background_css3";
	    $this.style = { bubbles_color: "#fff", stroke_width: 0, stroke_color: "black" };
	    $this.bubbles_number = 200;
	    $this.speed = [3000, 16000]; //milliseconds
	    $this.max_bubbles_height = $this.height;
	    $this.shape = false // 1 : circle | 2 : triangle | 3 : rect | false :random

	    if ($("#" + $this.id).lenght > 0) {
	        $("#" + $this.id).remove();
	    }
	  
	    $this.object = $("<div style='display:none;z-index:0;margin:0;padding:0; overflow:hidden;position:absolute;bottom:0' id='" + $this.id + "'> </div>'").appendTo("#colophon");

	    $this.ww = $(window).width();
	    $this.wh = $(window).height();
	    $this.width = $this.object.width($this.ww);
	    $this.height = $this.object.height($this.wh);


	    $("#colophon").prepend("<style>.shape_background {transform-origin:center; width:100px; height:100px; background: " + $this.style.bubbles_color + "; position: absolute}</style>");


	    for (i = 0; i < $this.bubbles_number; i++) {
	        $this.generate_bubbles();
	    }

	}





	background.generate_bubbles = function () {
	    var $this = this;
	    var base = $("<div class='shape_background'></div>");
	    var shape_type = $this.shape ? $this.shape : Math.floor($this.rn(1, 3));
	    if (shape_type == 1) {
	        var bolla = base.css({ borderRadius: "50%" });
	    } else if (shape_type == 2) {
	        var bolla = base.css({ width: 0, height: 0, "border-style": "solid", "border-width": "0 40px 69.3px 40px", "border-color": "transparent transparent " + $this.style.bubbles_color + " transparent", background: "transparent" });
	    } else {
	        var bolla = base;
	    }
	    var rn_size = $this.rn(.8, 1.2);
	    bolla.css({ "transform": "scale(" + rn_size + ") rotate(" + $this.rn(-360, 360) + "deg)", top: $this.wh + 100, left: $this.rn(-60, $this.ww + 60) });
	    bolla.appendTo($this.object);
	    bolla.transit(
	        {
	            top: $this.rn($this.wh / 2, $this.wh / 2 - 60),
	            "transform": "scale(" + rn_size + ") rotate(" + $this.rn(-360, 360) + "deg)",
	            opacity: 0
	        },
	        $this.rn($this.speed[0], $this.speed[1]),
	        function() {
	            ///$(this).remove();
	            $this.generate_bubbles();
	        });

	}


	background.rn = function (from, to, arr) {
	    if (arr) {
	        return Math.random() * (to - from + 1) + from;
	    } else {
	        return Math.floor(Math.random() * (to - from + 1) + from);
	    }
	}
    background.initializr();


});
})(jQuery); // end of jQuery name space