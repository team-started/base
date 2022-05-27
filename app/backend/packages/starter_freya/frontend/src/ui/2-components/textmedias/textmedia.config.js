'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        grid: {
            imageCols: {
                small: '6',
                medium: '4',
                large: '3',
            },
            showOnSmall: true,
            showOnMedium: true,
            showOnLarge: true,
        },
        image: '@picture--metadata',
        imageorient: {
            x: '',
            inside: '',
        },
        bodytext: _.lorem(1000, 'textmedia:'),
    },
    variants: [
        {
            label: 'image beside right 6-4-3',
            name: 'image-beside-right',
            context: {
                imageorient: {
                    x: 'right',
                    inside: false,
                },
            },
        },
        {
            label: 'image beside left 12-6-6',
            name: 'image-beside-left-show',
            context: {
                grid: {
                    imageCols: {
                        small: '12',
                        medium: '6',
                        large: '6',
                    },
                },
                imageorient: {
                    x: 'left',
                    inside: false,
                },
            },
        },
        {
            label: 'image beside left hide-on-small 12-6-6',
            name: 'image-beside-left-hide',
            context: {
                grid: {
                    imageCols: {
                        small: '12',
                        medium: '6',
                        large: '6',
                    },
                    showOnSmall: false,
                },
                imageorient: {
                    x: 'left',
                    inside: false,
                },
            },
        },
        {
            label: 'image inside right 6-4-3',
            name: 'image-inside-right',
            context: {
                imageorient: {
                    x: 'right',
                    inside: true,
                },
            },
        },
        {
            label: 'image inside left hide-on-medium 6-4-3',
            name: 'image-inside-left',
            context: {
                grid: {
                    showOnSmall: true,
                    showOnMedium: false,
                    showOnLarge: true,
                },
                imageorient: {
                    x: 'left',
                    inside: true,
                },
            },
        },
    ],
};
