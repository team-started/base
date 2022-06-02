'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        uid: '999',
        category: '',
        date: '',
        header: _.lorem(50, 'header:'),
        header_layout: '',
        image: '',
        link: {
            config: {
                uri: '',
                target: '',
                class: '',
                title: '',
            },
        },
        link_text: '',
        subheader: '',
        text: _.lorem(200, 'text: '),
    },
    variants: [
        {
            name: 'image',
            context: {
                image: '@picture--card',
            },
        },
        {
            name: 'full-set',
            context: {
                category: _.lorem(20, 'category:'),
                date: '05.05.2022',
                header_layout: '4',
                image: '@picture--card',
                link: {
                    config: {
                        uri: '#',
                        target: '',
                        class: '',
                        title: '',
                    },
                },
                link_text: _.lorem(20, 'link_text: '),
                subheader: _.lorem(50, 'subheader: '),
            },
        },
    ],
};
