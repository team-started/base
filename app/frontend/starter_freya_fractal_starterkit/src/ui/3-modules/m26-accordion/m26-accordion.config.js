'use strict';

const globalConfig = require('../module-general.config');

module.exports = {
    context: {
        ...globalConfig,
        CType: 'accordion',
        items: [
            '@accordion-item',
            '@accordion-item--text',
            '@accordion-item--image',
            '@accordion-item--text-image-inside-right',
            '@accordion-item--text-image-beside-left',
            '@accordion-item--text-image-hide-on-small',
        ],
        tx_starter_accordion_toggle: true,
    },
};
