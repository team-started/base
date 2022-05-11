// see: https://swiperjs.com/swiper-api
//
// import Swiper: lädt nur die benötigten Module
//
// Hier werden die Data-Atributes der Swipers ausgewertet.

import Swiper, { Autoplay, Navigation, Pagination } from 'swiper';
Swiper.use([Autoplay, Navigation, Pagination]);

function Component() {
    function init() {
        let sliderSelector = '.swiper-container',
            defaultOptions = {
                autoHeight: true,
                loop: true,
                spaceBetween: 16,
            };

        var nSlider = document.querySelectorAll(sliderSelector);

        [].forEach.call(nSlider, function (slider, index, arr) {
            let data = slider.getAttribute('data-swiper') || {};

            let dataOptions = null;
            if (data) {
                dataOptions = JSON.parse(data);
            }

            slider.options = Object.assign({}, defaultOptions, dataOptions);

            let swiper = new Swiper(slider, slider.options);

            /* stop on hover */
            if (
                typeof slider.options.autoplay !== 'undefined' &&
                slider.options.autoplay !== false
            ) {
                slider.addEventListener('mouseenter', function (e) {
                    swiper.autoplay.stop();
                });

                slider.addEventListener('mouseleave', function (e) {
                    swiper.autoplay.start();
                });
            }
        });
    }

    init();
}

export const className = '.c-swiper';

export default Component;
