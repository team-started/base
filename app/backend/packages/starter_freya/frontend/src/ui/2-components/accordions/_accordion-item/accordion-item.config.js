'use strict';

const _ = require('../../../../../config/helpers');
const mediaConfig = require('../../medias/media.config');
const textmediaConfig = require('../../textmedias/textmedia.config');

module.exports = {
    context: {
        title: '',
        text: _.lorem(1000, 'text:'),
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
            },
        },
        {
            name: 'image',
            context: {
                ...mediaConfig.context /* default mit einem Bild */,
                title: _.lorem(100, 'title image:'),
            },
        },
        {
            name: 'text-image',
            context: {
                ...textmediaConfig.variants[5].context /* Variante mit drei Bildern */,
                imageorient: {
                    x: 'right',
                    inside: true,
                },
                title: _.lorem(100, 'title text and image:'),
            },
        },
    ],
};
