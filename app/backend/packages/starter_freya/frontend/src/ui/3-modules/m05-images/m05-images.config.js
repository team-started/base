'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        CType: 'images',
        date: '',
        header: {
            header: '',
            header_layout: '',
            header_link: '',
            header_position: '',
            tx_starter_headercolor: '',
            tx_starter_headerfontsize: '',
        },
        imagecols: '1',
        items: ['@picture'],
        layout: '',
        overline: {
            header_position: '',
            tx_starter_overline: '',
        },
        space_after_class: '',
        space_before_class: '',
        subheader: {
            header_position: '',
            subheader: '',
        },
        uid: 999,
        tx_starter_background: '',
        tx_starter_background_fluid: '',
        tx_starter_bordercolor: '',
        tx_starter_container: '',
        tx_starter_cta_link: {
            config: {
                uri: '',
                target: '',
                class: '',
                title: '',
            },
        },
        tx_starter_cta_text: '',
        tx_starter_imagecols_medium: '1',
        tx_starter_imagecols_large: '1',
        tx_starter_showbyscreensize: '',
        tx_starter_textclass: '',
        tx_starter_textcolor: '',
        tx_starter_width: '',
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
