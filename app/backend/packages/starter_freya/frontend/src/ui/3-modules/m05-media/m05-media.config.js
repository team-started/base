'use strict';

const globalConfig = require('../module-general.config');

module.exports = {
    context: {
        ...globalConfig,
        CType: 'starter-media',
        date: '',
        imagecols: '1',
        items: ['@picture'],
        tx_starter_imagecols_medium: '1',
        tx_starter_imagecols_large: '1',
    },
    variants: [
        {
            name: 'images3',
            label: '3 images (1-2-3)',
            context: {
                imagecols: '1',
                items: ['@picture--link', '@picture--metadata', '@picture--no-figure'],
                tx_starter_imagecols_medium: '2',
                tx_starter_imagecols_large: '3',
            },
        },
        {
            name: 'images7',
            label: '7 images (2-3-4)',
            context: {
                imagecols: '2',
                items: [
                    '@picture--link',
                    '@picture--metadata',
                    '@picture--no-figure',
                    '@picture',
                    '@picture',
                    '@picture',
                    '@picture--metadata',
                ],
                tx_starter_imagecols_medium: '3',
                tx_starter_imagecols_large: '4',
            },
        },
    ],
};
