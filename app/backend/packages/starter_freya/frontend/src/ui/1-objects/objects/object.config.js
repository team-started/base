'use strict';

const _ = require('./../../../../config/helpers');

module.exports = {
    context: {
        text: _.lorem(50, 'max 50'),
    },
    variants: [
        {
            name: 'v1',
            label: 'variant 1',
            context: {
                text: 'object with a different markup (twig)',
            },
        },
        {
            name: 'v2',
            label: 'variant 2',
            context: {
                text: 'object with a different setup (config.js)',
            },
        },
        {
            name: 'component',
            label: 'component',
            context: {
                text: 'object with configuration for example component',
            },
        },
    ],
};
