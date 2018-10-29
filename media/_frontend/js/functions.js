

var techmoon_masonry = {
    _class : function(){
        this.init = function( el, callback ){
            var total = jQuery( el ).find( 'img' ).length;

            jQuery( el ).find( 'img' ).each(function(){
                var image = new Image();

                image.onload = function(){
                    total--;

                    if( total == 0 ){
                        callback();
                    }
                }

                image.src = jQuery( this ).attr( 'src' );
            });
        }
    }
};

var _techmoon_masonry = new techmoon_masonry._class();
(function ($) {
    $(function () {
        $('.button-collapse').sideNav();
        $('.parallax').parallax();
    });

jQuery(document).ready(function(){    

    /* CHANGE BORDER BOTTOM ON WINDOW RESIZE */
    jQuery( window ).resize(function() {
        if( jQuery( '.techmoon-gallery' ).length ){
            jQuery( '.techmoon-gallery' ).masonry();    
        }
        
    });
});

jQuery(document).ready(function(){

    _techmoon_masonry.init( 'div.techmoon-gallery', function(){
        jQuery( 'div.techmoon-gallery' ).masonry();
    });
    
    jQuery( 
        'div.widget div.tagcloud a,' +
        'article div.meta ul.post-categories li a,' +
        'body.single section div.post-meta-tags a,' +
        'div.comment-respond h3.comment-reply-title small a,' +
        'div.pagination a,' +
        'article a.more-link'
    ).addClass( 'waves-effect waves-light' );


    jQuery(
        'div.collapsed-wrapper ul li a'
    ).each(function(){
        jQuery( this ).addClass( 'waves-effect waves-dark' );
    });

    if( jQuery( 'select' ).length ){
        jQuery('select').material_select();
    }

    if( !jQuery( 'textarea' ).hasClass( 'materialize-textarea' ) ){
        jQuery( 'textarea' ).addClass( 'materialize-textarea' );
    }

    jQuery(
        'div.comment-respond h3.comment-reply-title small a'
    ).addClass( 'btn waves-effect waves-light' );


    if( !jQuery( '.btn,[class^="btn"]' ).hasClass( 'waves-effect' ) )
        jQuery( '.btn,[class^="btn"]' ).addClass( 'waves-effect waves-dark' );

    if( !jQuery( '[class*="btn"]' ).hasClass( 'waves-effect' ) )
        jQuery( '[class*="btn"]' ).addClass( 'waves-effect waves-dark' );

    if( !jQuery( '.button' ).hasClass( 'waves-effect' ) )
        jQuery( '.button' ).addClass( 'waves-effect waves-dark' );

    if( !jQuery( '.techmoon-btn' ).hasClass( 'waves-effect' ) )
        jQuery( '.techmoon-btn' ).addClass( 'waves-effect waves-dark' );

    if( !jQuery( '.techmoon-button' ).hasClass( 'waves-effect' ) )
        jQuery( '.techmoon-button' ).addClass( 'waves-effect waves-dark' );

    if( !jQuery( 'button' ).hasClass( 'waves-effect' ) )
        jQuery( 'button' ).addClass( 'waves-effect waves-dark' );

    jQuery('input[type="button"], input[type="submit"], input[type="reset"]').addClass('waves-effect waves-dark');


    $(window).on("scroll",
        function() {

            if ($(window).scrollTop() > $('.siteidentity').height()) {
                $('.sitemenu').addClass("fixedtop");
            } else {
                $('.sitemenu').removeClass("fixedtop");
            }
        });


});
})(jQuery);