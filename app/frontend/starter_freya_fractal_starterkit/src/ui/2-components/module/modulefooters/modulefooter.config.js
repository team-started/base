'use strict';

const _ = require('../../../../../config/helpers');

module.exports = {
    context: {
        tx_starter_cta_link: {
            config: {
                uri: '#',
                target: '',
                class: 'info1',
                title: '',
            },
        },
        tx_starter_cta_text: _.lorem(20, 'max 20'),
    },
};
