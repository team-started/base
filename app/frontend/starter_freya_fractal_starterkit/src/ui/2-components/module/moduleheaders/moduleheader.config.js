'use strict';

const _ = require('../../../../../config/helpers');

module.exports = {
    context: {
        date: '',
        header: {
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
            tx_starter_headercolor: '',
            tx_starter_headerfontsize: '',
        },
        overline: {
            header_position: '',
            tx_starter_overline: '',
        },
        subheader: {
            header_position: '',
            subheader: '',
        },
    },
    variants: [
        {
            name: 'mixed',
            label: 'Mixed',
            context: {
                date: '21.02.2022',
                header: {
                    header: _.lorem(50, 'max 50'),
                    header_layout: '3',
                    header_position: '',
                    header_link: {
                        config: {
                            uri: '',
                            target: '',
                            class: '',
                            title: '',
                        },
                    },
                    tx_starter_headercolor: 'text-primary',
                    tx_starter_headerfontsize: '1',
                },
                overline: {
                    header_position: '',
                    tx_starter_overline: _.lorem(50, 'max 50'),
                },
                subheader: {
                    header_position: '',
                    subheader: _.lorem(50, 'max 50'),
                },
            },
        },
    ],
};
