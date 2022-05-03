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
            name: 'images-only',
            context: {
                bodytext: '',
                date: '',
                header: '',
                overline: '',
                subheader: '',
                tx_starter_cta_link: '',
            },
        },
        {
            name: 'small-image-only',
            context: {
                bodytext: '',
                date: '',
                overline: '',
                subheader: '',
                tx_starter_cta_link: '',
                image: {
                    medium: '',
                    large: '',
                },
            },
        },
    ],
};
