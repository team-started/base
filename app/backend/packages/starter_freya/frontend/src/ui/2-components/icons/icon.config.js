'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        image: '@image--svg',
        layout: '',
        link: {
            config: {
                uri: '#',
                target: '_blank',
                class: '',
                title: '',
            },
        },
        text: '',
    },
    variants: [
        {
            name: 'image-only',
            context: {
                link: '',
            },
        },
        {
            name: 'image-text-no-link',
            context: {
                link: '',
                text: _.lorem(20, 'No link:'),
            },
        },
        {
            name: 'text-right',
            context: {
                layout: 'text-right',
                text: _.lorem(20, 'Text right:'),
            },
        },
        {
            name: 'text-bottom',
            context: {
                layout: 'text-bottom',
                text: _.lorem(20, 'Text bottom:'),
            },
        },
        {
            name: 'text-left',
            context: {
                layout: 'text-left',
                text: _.lorem(20, 'Text left:'),
            },
        },
        {
            name: 'text-top',
            context: {
                layout: 'text-top',
                text: _.lorem(20, 'Text top:'),
            },
        },
    ],
};
