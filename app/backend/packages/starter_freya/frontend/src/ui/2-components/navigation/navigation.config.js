'use strict';

module.exports = {
    label: 'Navigation',
    context: {
        items: [
            {
                uid: 1,
                active: 1,
                current: 0,
                text: 'Seite 1, active',
                link: {
                    config: {
                        uri: '#',
                        target: 'target',
                        class: 'class',
                        title: 'title',
                    },
                },
                spacer: 0,
                children: [
                    {
                        uid: 11,
                        active: 0,
                        current: 0,
                        text: 'Ein etwas längerer Titel der Unterseite 1',
                        link: {
                            config: {
                                uri: '#',
                                target: '',
                                class: '',
                                title: '',
                            },
                        },
                        spacer: 0,
                    },
                    {
                        uid: 12,
                        active: 1,
                        current: 1,
                        text: 'Unterseite 2, active, current',
                        link: {
                            config: {
                                uri: '#',
                                target: '',
                                class: '',
                                title: '',
                            },
                        },
                        spacer: 0,
                    },
                    {
                        uid: 13,
                        active: 0,
                        current: 0,
                        text: 'Unterseite 3, class, title',
                        link: {
                            config: {
                                uri: '#',
                                target: '',
                                class: 'link-class',
                                title: 'Unterseite 3',
                            },
                        },
                        spacer: 0,
                        children: [
                            {
                                uid: 131,
                                active: 0,
                                current: 0,
                                text: 'Unterunterseite 3 1',
                                link: {
                                    config: {
                                        uri: '#',
                                        target: '',
                                        class: '',
                                        title: '',
                                    },
                                },
                                spacer: 0,
                            },
                            {
                                uid: 132,
                                active: 1,
                                current: 1,
                                text: 'Unterunterseite 3 2',
                                link: {
                                    config: {
                                        uri: '#',
                                        target: '',
                                        class: '',
                                        title: '',
                                    },
                                },
                                spacer: 0,
                            },
                        ],
                    },
                    {
                        uid: 14,
                        active: 0,
                        current: 0,
                        text: 'Unterseite 4',
                        link: {
                            config: {
                                uri: '#',
                                target: '',
                                class: '',
                                title: '',
                            },
                        },
                        spacer: 0,
                    },
                ],
            },
            {
                uid: 2,
                active: 0,
                current: 0,
                text: 'Page 2<br>mit Zeilenumbruch',
                link: {
                    config: {
                        uri: '#',
                        target: '',
                        class: '',
                        title: '',
                    },
                },
                spacer: 0,
            },
            {
                uid: 3,
                active: 0,
                current: 0,
                text: 'Page 3, target: _blank',
                link: {
                    config: {
                        uri: '#',
                        target: '_blank',
                        class: '',
                        title: '',
                    },
                },
                spacer: 0,
            },
        ],
    },
};
