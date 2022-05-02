'use strict';

module.exports = {
    label: 'Breadcrumb',
    context: {
        items: [
            {
                uid: 1,
                title: 'Rootseite',
                link: '#',
                target: '',
                active: 1,
                current: 0,
                spacer: 0,
            },
            {
                uid: 2,
                title: 'Seite 1',
                link: '#',
                target: '',
                active: 1,
                current: 0,
                spacer: 0,
            },
            {
                uid: 3,
                title: 'Unterseite 1.1',
                link: '#',
                target: '',
                active: 1,
                current: 0,
                spacer: 0,
            },
            {
                uid: 4,
                title: 'Unterseite 1.1.1, aktuelle Seite',
                link: '#',
                target: '',
                active: 1,
                current: 1,
                spacer: 0,
            },
        ],
    },
    variants: [
        {
            name: 'contentelement',
            context: {
                uid: 333,
            },
        },
    ],
};
