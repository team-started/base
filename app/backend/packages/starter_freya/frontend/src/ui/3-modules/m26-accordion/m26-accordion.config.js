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
            '@accordion-item--text-image',
        ],
        tx_starter_accordion_toggle: true,
    },
};
