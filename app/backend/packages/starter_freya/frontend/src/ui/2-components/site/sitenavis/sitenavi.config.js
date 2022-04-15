'use strict';

module.exports = {
    context: {
        items: [
            {
                uid: 1,
                title: 'Seite 1, active',
                link: '#',
                target: '',
                active: 1,
                current: 0,
                spacer: 0,
                children: [
                    {
                        uid: 11,
                        title: 'Ein etwas längerer Titel der Unterseite 1',
                        link: '#',
                        target: '',
                        active: 0,
                        current: 0,
                        spacer: 0,
                    },
                    {
                        uid: 12,
                        title: 'Unterseite 2, active, current',
                        link: '#',
                        target: '',
                        active: 1,
                        current: 1,
                        spacer: 0,
                    },
                    {
                        uid: 13,
                        title: 'Unterseite 3',
                        link: '#',
                        target: '',
                        active: 0,
                        current: 0,
                        spacer: 0,
                    },
                    {
                        uid: 14,
                        title: 'Unterseite 4',
                        link: '#',
                        target: '',
                        active: 0,
                        current: 0,
                        spacer: 0,
                    },
                ],
            },
            {
                uid: 2,
                title: 'Page 2<br>mit Zeilenumbruch',
                link: '#',
                target: '',
                active: 0,
                current: 0,
                spacer: 0,
            },
            {
                uid: 3,
                title: 'Page 3, target: _blank',
                link: '#',
                target: '_blank',
                active: 0,
                current: 0,
                spacer: 0,
            },
        ],
    },
};
