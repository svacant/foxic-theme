$(document).ready(function() {
    $('.all-categories-menu-toggle').on('click', function () {
        console.log("intra");
        $(".mobile-menu").toggleClass('active');
        $(".mobilemenu-toggle").toggleClass('active');
        $("body").toggleClass('slidemenu-open');
        // if (isMobile) {
        //     if ($body.hasClass('slidemenu-open')) {
        //         bodyScrollLock.disableBodyScroll($scroll);
        //     } else {
        //         bodyScrollLock.clearAllBodyScrollLocks();
        //     }
        // }
        // return false;
    });
});