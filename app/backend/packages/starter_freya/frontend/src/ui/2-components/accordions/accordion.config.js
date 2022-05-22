'use strict';

module.exports = {
    context: {
        items: [
            '@accordion-item',
            '@accordion-item--text',
            '@accordion-item--image',
            '@accordion-item--text-image',
        ],
        toggle: null,
    },
    variants: [
        {
            name: 'stay-open',
            context: {
                toggle: false,
            },
        },
    ],
};
