'use strict';

module.exports = {
    context: {
        items: [
            {
                uid: 1,
                title: 'Seite 1',
                link: '#',
                target: '',
                active: 0,
                current: 0,
                spacer: 0,
            },
            {
                uid: 2,
                title: 'Seite 2 (aktuelle Seite)',
                link: '#',
                target: '',
                active: 1,
                current: 1,
                spacer: 0,
            },
            {
                uid: 3,
                title: 'Seite 3',
                link: '#',
                target: '',
                active: 0,
                current: 0,
                spacer: 0,
            },
            {
                uid: 4,
                title: 'Seite 4',
                link: '#',
                target: '',
                active: 0,
                current: 0,
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
