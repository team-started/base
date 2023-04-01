'use strict';

module.exports = {
    context: {
        items: [
            {
                data: {
                    uid: 1,
                    doktype: 1,
                },
                title: 'Rootseite',
                link: '#',
                target: '',
                active: 1,
                current: 0,
            },
            {
                data: {
                    uid: 2,
                    doktype: 1,
                },
                title: 'Seite 1',
                link: '#',
                target: '',
                active: 1,
                current: 0,
            },
            {
                data: {
                    uid: 3,
                    doktype: 1,
                },
                title: 'Unterseite 1.1',
                link: '#',
                target: '',
                active: 1,
                current: 0,
            },
            {
                data: {
                    uid: 4,
                    doktype: 1,
                },
                title: 'Unterseite 1.1.1, aktuelle Seite',
                link: '#',
                target: '',
                active: 1,
                current: 1,
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
