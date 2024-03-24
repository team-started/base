'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        link: {
            config: {
                uri: '#',
                target: '',
                class: '',
                title: '',
            },
        },
        text: _.lorem(20, 'Button Text'),
    },
};
