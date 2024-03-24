'use strict';

const globalConfig = require('../module-general.config');

module.exports = {
    context: {
        ...globalConfig,
        CType: 'text',
    },
    variants: [
        {
            name: 'background',
            label: 'background',
            context: {
                tx_starter_background: 'bg-primary',
            },
        },
        {
            name: 'background-fluid',
            label: 'background fluid',
            context: {
                tx_starter_background: 'bg-primary',
                tx_starter_background_fluid: true,
            },
        },
        {
            name: 'show-by-mediaquery',
            label: 'show for medium only',
            context: {
                tx_starter_visibility: 'd-md-only',
            },
        },
    ],
};
