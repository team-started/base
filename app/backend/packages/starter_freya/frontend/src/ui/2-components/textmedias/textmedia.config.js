'use strict';

const _ = require('../../../../config/helpers');
const mediaConfig = require('../medias/media.config');

module.exports = {
    context: {
        ...mediaConfig.context,
        grid: {
            showOnSmall: true,
            showOnMedium: true,
            showOnLarge: true,
        },
        imageorient: {
            x: '',
            inside: '',
        },
        bodytext: _.lorem(1000, 'textmedia:'),
        media_size_small: 6,
        media_size_medium: 4,
        media_size_large: 3,
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
                imageorient: {
                    x: 'left',
                    inside: false,
                },
                media_size_small: 12,
                media_size_medium: 6,
                media_size_large: 6,
            },
        },
        {
            label: 'image beside left hide-on-small 12-6-6',
            name: 'image-beside-left-hide',
            context: {
                grid: {
                    showOnSmall: false,
                },
                imageorient: {
                    x: 'left',
                    inside: false,
                },
                media_size_small: 12,
                media_size_medium: 6,
                media_size_large: 6,
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
        {
            label: 'multiple images inside left 12-6-6',
            name: 'multiple-images',
            context: {
                ...mediaConfig.variants[0].context,
                imageorient: {
                    x: 'left',
                    inside: true,
                },
                media_size_small: 12,
                media_size_medium: 6,
                media_size_large: 6,
            },
        },
    ],
};
