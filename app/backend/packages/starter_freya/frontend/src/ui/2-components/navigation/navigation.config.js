'use strict';

module.exports = {
    label: 'Navigation',
    context: {
        uid: 777,
        items: [
            {
                uid: 1,
                active: 1,
                current: 0,
                title: 'Seite 1, active',
                link: {
                    config: {
                        uri: '#',
                        target: 'link-target',
                        class: 'link-class',
                        title: 'link-title',
                    },
                },
                image: '@picture--navigation-image',
                spacer: 0,
                children: [
                    {
                        uid: 11,
                        active: 0,
                        current: 0,
                        title: 'Ein etwas längerer Titel der Unterseite 1 1',
                        link: {
                            config: {
                                uri: '#',
                                target: '',
                                class: '',
                                title: '',
                            },
                        },
                        image: '@picture--navigation-image',
                        spacer: 0,
                    },
                    {
                        uid: 12,
                        active: 1,
                        current: 1,
                        title: 'Unterseite 1 2, active, current',
                        link: {
                            config: {
                                uri: '#',
                                target: '',
                                class: '',
                                title: '',
                            },
                        },
                        image: '',
                        spacer: 0,
                    },
                    {
                        uid: 13,
                        active: 0,
                        current: 0,
                        title: 'Unterseite 1 3, class, title',
                        link: {
                            config: {
                                uri: '#',
                                target: '',
                                class: 'link-class',
                                title: 'Unterseite 3',
                            },
                        },
                        image: '@picture--navigation-image',
                        spacer: 0,
                        children: [
                            {
                                uid: 131,
                                active: 0,
                                current: 0,
                                title: 'Unterunterseite 1 3 1',
                                link: {
                                    config: {
                                        uri: '#',
                                        target: '',
                                        class: '',
                                        title: '',
                                    },
                                },
                                image: '@picture--navigation-image',
                                spacer: 0,
                                children: [
                                    {
                                        uid: 1311,
                                        active: 0,
                                        current: 0,
                                        title: 'Das ist die 4. Ebene, die wird nicht mehr angezeigt.',
                                        link: {
                                            config: {
                                                uri: '#',
                                                target: '',
                                                class: '',
                                                title: '',
                                            },
                                        },
                                        image: '',
                                        spacer: 0,
                                    },
                                ],
                            },
                            {
                                uid: 132,
                                active: 1,
                                current: 1,
                                title: 'Unterunterseite 1 3 2',
                                link: {
                                    config: {
                                        uri: '#',
                                        target: '',
                                        class: '',
                                        title: '',
                                    },
                                },
                                image: '',
                                spacer: 0,
                            },
                        ],
                    },
                    {
                        uid: 14,
                        active: 0,
                        current: 0,
                        title: 'Unterseite 1 4',
                        link: {
                            config: {
                                uri: '#',
                                target: '',
                                class: '',
                                title: '',
                            },
                        },
                        image: '',
                        spacer: 0,
                    },
                    {
                        uid: 15,
                        active: 0,
                        current: 0,
                        title: 'Unterseite 1 5',
                        link: {
                            config: {
                                uri: '#',
                                target: '',
                                class: '',
                                title: '',
                            },
                        },
                        image: '',
                        spacer: 0,
                    },
                    {
                        uid: 16,
                        active: 0,
                        current: 0,
                        title: 'Unterseite 1 6',
                        link: {
                            config: {
                                uri: '#',
                                target: '',
                                class: '',
                                title: '',
                            },
                        },
                        image: '',
                        spacer: 0,
                    },
                ],
            },
            {
                uid: 2,
                active: 0,
                current: 0,
                title: 'Seite 2<br>mit Zeilenumbruch',
                link: {
                    config: {
                        uri: '#',
                        target: '',
                        class: '',
                        title: '',
                    },
                },
                image: '',
                spacer: 0,
            },
            {
                uid: 3,
                active: 0,
                current: 0,
                title: 'Seite 3, im neuen Tab',
                link: {
                    config: {
                        uri: '#',
                        target: '_blank',
                        class: '',
                        title: '',
                    },
                },
                image: '',
                spacer: 0,
                children: [
                    {
                        uid: 31,
                        active: 0,
                        current: 0,
                        title: 'Ein etwas längerer Titel der Unterseite 3 1',
                        link: {
                            config: {
                                uri: '#',
                                target: '',
                                class: '',
                                title: '',
                            },
                        },
                        image: '@picture--navigation-image',
                        spacer: 0,
                    },
                ],
            },
        ],
    },
};
