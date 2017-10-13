(function( $ ) {
    $(window).on('scroll', function() {
        var scrollTop = $(this).scrollTop(),
            navDistance = $('.main-navigation').offset().top,
            nav = $('.main-navigation');

        if ( navDistance < scrollTop ) {
            nav.addClass('fixed-nav');
        } else if ( $(window).width() > 600  && scrollTop < 56.4 ) {
            nav.removeClass( 'fixed-nav' ); 
        }

        console.log(  'this is window', scrollTop );
        console.log(  'this is nav', navDistance );
    });
})( jQuery );