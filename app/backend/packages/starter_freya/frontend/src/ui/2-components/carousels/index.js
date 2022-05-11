import Swiper, { Autoplay, Navigation, Pagination } from 'swiper';
Swiper.use([Autoplay, Navigation, Pagination]);

function Component() {
    function init() {
        console.log('swipoer');

        const swiper = new Swiper('.swiper', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 16,
            speed: 1400,

            autoplay: {
                delay: 6000,
            },

            breakpoints: {
                720: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }

    init();
}

export const className = '.c-swiper';

export default Component;
