'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        image: '@image--svg',
        link: {
            config: {
                uri: '#',
                target: '',
                class: '',
                title: '',
            },
        },
        text: _.lorem(20, 'Icon Text: '),
    },
};
