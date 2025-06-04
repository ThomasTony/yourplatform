jQuery(document).ready(function ($) {

//   <!-- Swiper script -->
//   new Swiper(".hero-swiper", {
//     loop: true,
//     pagination: {
//       el: ".swiper-pagination",
//       clickable: true,
//     },
//   });

    var swiper = new Swiper(".hero-swiper", {
        direction: "vertical",
        loop:true,
        // autoplay: {
        //     delay: 5000,
        //     disableOnInteraction: false,
        // },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

});
