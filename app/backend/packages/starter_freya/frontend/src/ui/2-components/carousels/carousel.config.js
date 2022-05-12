'use strict';

module.exports = {
    context: {
        autoplay: true,
        delay: 3000,
        items: [],
        navigation: false,
        pagination: false,
        speed: 1500,
        slidesPerView: {
            xs: 1,
            sm: 2,
            md: 3,
            lg: 4,
            xl: 5,
            xxl: 6,
        },
    },
    variants: [
        {
            name: 'no-autoplay',
            context: {
                autoplay: false,
            },
        },
        {
            name: 'navigation',
            context: {
                navigation: true,
            },
        },
        {
            name: 'pagination',
            context: {
                pagination: true,
            },
        },
        {
            name: 'delay',
            context: {
                delay: 1000,
            },
        },
        {
            name: 'speed',
            context: {
                speed: 3000,
            },
        },
        {
            name: 'slidesPerView-all-2',
            label: 'Slides per view all 2',
            context: {
                slidesPerView: {
                    xs: 2,
                    sm: 2,
                    md: 2,
                    lg: 2,
                    xl: 2,
                    xxl: 2,
                },
            },
        },
    ],
};
