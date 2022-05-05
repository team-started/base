'use strict';

module.exports = {
    context: {
        items: [
            '@accordion-item',
            '@accordion-item--text',
            '@accordion-item--image',
            '@accordion-item--text-image-inside-right',
            '@accordion-item--text-image-beside-left',
            '@accordion-item--text-image-hide-on-small',
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
