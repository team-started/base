'use strict';

const _ = require('../../../../../config/helpers');

module.exports = {
    context: {
        tx_starter_cta_link: {
            config: {
                uri: '#',
                target: '',
                class: '',
                title: '',
            },
        },
        tx_starter_cta_text: _.lorem(20, 'max 20'),
    },
    variants: [
        {
            name: 'cta1',
            label: 'cta 1',
            context: {
                tx_starter_cta_link: {
                    config: {
                        class: 'info1',
                    },
                },
            },
        },
        {
            name: 'cta2',
            label: 'cta 2',
            context: {
                tx_starter_cta_link: {
                    config: {
                        class: 'info2',
                    },
                },
            },
        },
    ],
};
