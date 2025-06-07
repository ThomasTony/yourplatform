jQuery(document).ready(function ($) {

    var swiper = new Swiper(".hero-swiper", {
        direction: "vertical",
        loop:true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

});
