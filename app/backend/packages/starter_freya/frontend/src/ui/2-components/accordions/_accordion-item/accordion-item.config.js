'use strict';

const _ = require('../../../../../config/helpers');

module.exports = {
    context: {
        title: '',
        text: '',
        image: null,
        imageorient: {
            x: '',
            inside: false,
        },
    },
    variants: [
        {
            name: 'text',
            context: {
                title: _.lorem(100, 'title text:'),
                text: _.lorem(1000, 'text text:'),
            },
        },
        {
            name: 'image',
            context: {
                title: _.lorem(100, 'title image:'),
                image: '@picture',
            },
        },
        {
            name: 'text-image-inside-right',
            context: {
                grid: {
                    imageCols: {
                        small: '12',
                        medium: '6',
                        large: '6',
                    },
                    hideOnSmall: false,
                },
                image: '@picture--metadata',
                imageorient: {
                    x: 'right',
                    inside: true,
                },
                text: _.lorem(1000, 'textmedia:'),
                title: _.lorem(100, 'title text-image-inside-right:'),
            },
        },
        {
            name: 'text-image-beside-left',
            context: {
                grid: {
                    imageCols: {
                        small: '12',
                        medium: '6',
                        large: '6',
                    },
                    hideOnSmall: false,
                },
                image: '@picture--metadata',
                imageorient: {
                    x: 'left',
                    inside: false,
                },
                text: _.lorem(1000, 'textmedia:'),
                title: _.lorem(100, 'title text-image-beside-left:'),
            },
        },
        {
            name: 'text-image-hide-on-small',
            context: {
                grid: {
                    hideOnSmall: true,
                },
                image: '@picture--metadata',
                text: _.lorem(100, 'textmedia:'),
                title: _.lorem(100, 'title text-image-hide-on-small:'),
            },
        },
    ],
};
