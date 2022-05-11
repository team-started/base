'use strict';

module.exports = {
    context: {
        autoplay: 0,
        items: [],
        navigation: false,
        pagination: false,
    },
    variants: [
        {
            name: 'autoplay',
            context: {
                autoplay: 5000,
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
            name: 'all-options',
            context: {
                autoplay: true,
                navigation: true,
                pagination: true,
            },
        },
    ],
};
