'use strict';

const _ = require('../../../../../config/helpers');
const mediaConfig = require('../../medias/media.config');
const textmediaConfig = require('../../textmedias/textmedia.config');

module.exports = {
    context: {
        title: '',
        text: '',
        imageorient: {
            x: '',
            inside: false,
        },
    },
    variants: [
        {
            name: 'text',
            context: {
                text: _.lorem(1000, 'text text:'),
                title: _.lorem(100, 'title text:'),
            },
        },
        {
            name: 'image',
            context: {
                ...mediaConfig.context,
                title: _.lorem(100, 'title image:'),
            },
        },
        {
            name: 'text-image',
            context: {
                ...textmediaConfig.variants[5].context,
                imageorient: {
                    x: 'right',
                    inside: true,
                },
                text: _.lorem(1000, 'textmedia:'),
                title: _.lorem(100, 'title text and image:'),
            },
        },
    ],
};
