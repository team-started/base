'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        text: _.lorem(50, 'max 50'),
    },
    variants: [
        {
            name: 'v1',
            label: 'variant 1',
            context: {
                text: 'Object mit einem anderen Markup (twig)',
            },
        },
        {
            name: 'v2',
            label: 'variant 2',
            context: {
                text: 'Object mit einem anderen Setup (config.js)',
            },
        },
    ],
};
