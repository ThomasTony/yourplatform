jQuery(document).ready(function ($) {

    var heroSwiper = new Swiper(".hero-swiper", {
        // direction: "vertical",
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


    var popularDestinationSwiper = new Swiper(".popular-destination-swiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop:true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });

});
