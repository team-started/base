'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        header_position: '',
        subheader: _.lorem(50, 'max 50'),
    },
    variants: [
        {
            name: 'start',
            label: 'Left',
            context: {
                header_position: 'text-start',
            },
        },
        {
            name: 'center',
            label: 'Centered',
            context: {
                header_position: 'text-center',
            },
        },
        {
            name: 'end',
            label: 'Right',
            context: {
                header_position: 'text-end',
            },
        },
    ],
};
