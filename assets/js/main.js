jQuery(document).ready(function ($) {

    /** -------------------------------
     *  Swiper: Hero Slider
     * -------------------------------- */
    new Swiper(".hero-swiper", {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    /** -------------------------------
     *  Swiper: Popular Destinations
     * -------------------------------- */
    new Swiper(".popular-destination-swiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: { slidesPerView: 1, spaceBetween: 20 },
            768: { slidesPerView: 2, spaceBetween: 25 },
            1024: { slidesPerView: 3, spaceBetween: 30 },
        },
    });

    /** -------------------------------
     *  Sticky Sidebar on Scroll
     * -------------------------------- */
    const section = document.querySelector('.latest_art_sidebar_sec');
    const sidebar = section?.querySelector('.side_bar_content');

    const handleStickySidebar = () => {
        if (!section || !sidebar) return;

        const sectionRect = section.getBoundingClientRect();
        const sidebarRect = sidebar.getBoundingClientRect();
        const sidebarHeight = sidebar.offsetHeight;

        const sectionTop = sectionRect.top + window.scrollY;
        const sectionBottom = sectionTop + section.offsetHeight;
        const scrollY = window.scrollY;
        const viewportHeight = window.innerHeight;

        const sidebarFullyVisible = scrollY + viewportHeight >= scrollY + sidebarRect.bottom;

        if (scrollY > sectionTop && scrollY < sectionBottom - sidebarHeight && sidebarFullyVisible) {
            Object.assign(sidebar.style, {
                position: 'fixed',
                top: '30px',
                bottom: 'auto',
                width: '28%',
                transform: 'translateY(0)',
                opacity: '1',
                zIndex: '99'
            });
        } else if (scrollY >= sectionBottom - sidebarHeight) {
            Object.assign(sidebar.style, {
                position: 'absolute',
                top: 'auto',
                bottom: '0',
                width: '100%',
                transform: 'translateY(0)',
                opacity: '1'
            });
        } else {
            Object.assign(sidebar.style, {
                position: 'static',
                width: '100%',
                transform: 'translateY(-10px)',
                opacity: '0.5'
            });
        }
    };

    /** -------------------------------
     *  Sticky Header on Scroll
     * -------------------------------- */
    const header = document.querySelector('.site-header');

    const handleStickyHeader = () => {
        if (!header) return;
        header.classList.toggle('scrolled', window.scrollY > 150);
    };

    /** -------------------------------
     *  Scroll Event Listener (Debounced)
     * -------------------------------- */
    window.addEventListener('scroll', () => {
        handleStickySidebar();
        handleStickyHeader();
    });


    
});
