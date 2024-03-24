'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        header: _.lorem(50, 'max 50'),
        header_layout: '',
        header_position: '',
        header_link: {
            config: {
                uri: '',
                target: '',
                class: '',
                title: '',
            },
        },
        tx_starter_headerclass: '',
        tx_starter_headercolor: '',
        tx_starter_headerfontsize: '',
    },
    variants: [
        {
            name: 'h1',
            label: 'h1',
            context: {
                header_layout: 1,
            },
        },
        {
            name: 'h2',
            label: 'h2',
            context: {
                header_layout: 2,
            },
        },
        {
            name: 'h3',
            label: 'h3',
            context: {
                header_layout: 3,
            },
        },
        {
            name: 'h4',
            label: 'h4',
            context: {
                header_layout: 4,
            },
        },
        {
            name: 'h5',
            label: 'h5',
            context: {
                header_layout: 5,
            },
        },
        {
            name: 'h6',
            label: 'h6',
            context: {
                header_layout: 6,
            },
        },
        {
            name: 'h99',
            label: 'No headline behaviour',
            context: {
                header_layout: 99,
            },
        },
        {
            name: 'h100',
            label: 'Hidden in Frontend',
            context: {
                header_layout: 100,
            },
        },
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
        {
            name: 'primary',
            label: 'Color primary',
            context: {
                tx_starter_headercolor: 'text-primary',
            },
        },
        {
            name: 'h3-like-h1',
            label: 'h3 like h1',
            context: {
                header_layout: '3',
                tx_starter_headerfontsize: '1',
            },
        },
        {
            name: 'link',
            label: 'link',
            context: {
                header_link: {
                    config: {
                        uri: '#',
                        target: '_blank',
                        class: 'class from heading',
                        title: 'title from heading',
                    },
                },
                header_position: 'center',
            },
        },
    ],
};
