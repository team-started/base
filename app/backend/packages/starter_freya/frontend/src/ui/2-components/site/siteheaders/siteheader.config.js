'use strict';

const navigationConfig = require('../../navigation/navigation.config');

module.exports = {
    context: {
        ...navigationConfig.context,
        contact: {
            map: {
                image: {
                    src: '/assets/images/other/pin.svg',
                    alt: 'Anfahrt',
                    title: '',
                },
                link: {
                    config: {
                        uri: '#',
                        target: '',
                        class: '',
                        title: '',
                    },
                },
            },
            mail: {
                image: {
                    src: '/assets/images/bootstrap/envelope.svg',
                    alt: 'E-mail',
                    title: '',
                },
                link: {
                    config: {
                        uri: 'mailto:fritz.eierschale@example.org',
                        target: '',
                        class: '',
                        title: '',
                    },
                },
                text: 'fritz.eierschale@example.org',
            },
            phone: {
                image: {
                    src: '/assets/images/bootstrap/telephone.svg',
                    alt: 'Telefon',
                    title: '',
                },
                link: {
                    config: {
                        uri: 'tel:+499123456789',
                        target: '',
                        class: '',
                        title: '',
                    },
                },
                text: '09123 456789',
            },
        },
        sm: {
            facebook: {
                image: {
                    src: '/assets/images/sm/facebook.svg',
                    alt: 'facebook',
                    title: '',
                },
                link: {
                    config: {
                        uri: 'https://facebook.com',
                        target: '_blank',
                        class: '',
                        title: '',
                    },
                },
            },
            instagram: {
                image: {
                    src: '/assets/images/sm/instagram.svg',
                    alt: 'instagram',
                    title: '',
                },
                link: {
                    config: {
                        uri: 'https://instagram.com',
                        target: '_blank',
                        class: '',
                        title: '',
                    },
                },
            },
            jitsi: {
                image: {
                    src: '/assets/images/sm/jitsi.svg',
                    alt: 'xing',
                    title: '',
                },
                link: {
                    config: {
                        uri: 'https://meet.jit.si/',
                        target: '_blank',
                        class: '',
                        title: '',
                    },
                },
            },
        },
    },
};
