'use strict';

const globalConfig = require('../module-general.config');

module.exports = {
    context: {
        ...globalConfig,
        CType: 'hero',
        image: {
            small: '@picture--small',
            medium: '@picture--medium',
            large: '@picture--large',
        },
    },
    variants: [
        {
            name: 'image-only',
            context: {
                bodytext: '',
                date: '',
                header: '',
                overline: '',
                subheader: '',
                tx_starter_cta_link: '',
            },
        },
    ],
};
