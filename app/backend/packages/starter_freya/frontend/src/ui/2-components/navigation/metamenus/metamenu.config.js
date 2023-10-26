'use strict';

module.exports = {
    context: {
        uid: 333,
        items: [
            {
                data: {
                    uid: 1,
                    doktype: 3,
                },
                title: 'Seite 1',
                link: '#',
                target: '',
                active: 0,
                current: 0,
            },
            {
                data: {
                    uid: 2,
                    doktype: 1,
                },
                title: 'Seite 2 (aktuelle Seite)',
                link: '#',
                target: '',
                active: 1,
                current: 1,
            },
            {
                data: {
                    uid: 3,
                    doktype: 1,
                },
                title: 'Seite 3',
                link: '#',
                target: '',
                active: 0,
                current: 0,
            },
            {
                data: {
                    uid: 4,
                    doktype: 1,
                },
                title: 'Seite 4',
                link: '#',
                target: '',
                active: 0,
                current: 0,
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
