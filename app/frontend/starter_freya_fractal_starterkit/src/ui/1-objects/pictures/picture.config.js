'use strict';

module.exports = {
    context: {
        figure: true,
        metaData: {
            description: '',
            alternative: '',
            title: '',
            link: {
                config: {
                    uri: '',
                    target: '',
                    class: '',
                    title: '',
                },
            },
        },
        placeholder: {
            uri: {
                default: 'https://via.placeholder.com/60x45/ccc/F00?text=png-60',
            },
        },
        default: {
            uri: {
                default: 'https://via.placeholder.com/512x384/ccc/F00?text=png-512',
            },
            mq: '512w',
            width: 512,
            height: 384,
            webP: {
                default: 'https://via.placeholder.com/512x384.webp/ccc/000?text=WebP-512',
                fileType: 'image/webp',
            },
        },
        variants: [
            {
                mq: '1024w', // volle Breite in diesem Projekt
                uri: {
                    default: 'https://via.placeholder.com/1024x768/ccc/F00?text=png-1024',
                },
                webP: {
                    default: 'https://via.placeholder.com/1024x768.webp/ccc/000?text=WebP-1024',
                    fileType: 'image/webp',
                },
            },
            {
                mq: '512w', // Drittel
                uri: {
                    default: 'https://via.placeholder.com/512x384/ccc/F00?text=png-512',
                },
                webP: {
                    default: 'https://via.placeholder.com/512x384.webp/ccc/000?text=WebP-512',
                    fileType: 'image/webp',
                },
            },
            {
                mq: '340w', // Drittel
                uri: {
                    default: 'https://via.placeholder.com/340x255/ccc/F00?text=png-340',
                },
                webP: {
                    default: 'https://via.placeholder.com/340x255.webp/ccc/000?text=WebP-340',
                    fileType: 'image/webp',
                },
            },
            {
                mq: '256w', // Viertel
                uri: {
                    default: 'https://via.placeholder.com/256x192/ccc/F00?text=png-256',
                },
                webP: {
                    default: 'https://via.placeholder.com/256x192.webp/ccc/000?text=WebP-256',
                    fileType: 'image/webp',
                },
            },
        ],
    },
    variants: [
        {
            name: 'no-figure',
            label: 'No figure',
            context: {
                figure: false,
            },
        },
        {
            name: 'metadata',
            context: {
                metaData: {
                    description: 'image-description',
                    alternative: 'image-alternative',
                    title: 'image-title',
                },
            },
        },
        {
            name: 'link',
            context: {
                metaData: {
                    link: {
                        config: {
                            uri: '#',
                            target: '_blank',
                            class: 'image-link-class',
                            title: 'image-link-title',
                        },
                    },
                },
            },
        },
        {
            name: 'metadata-link',
            label: 'Metadata and link',
            context: {
                metaData: {
                    description: 'image-description',
                    alternative: 'image-alternative',
                    title: 'image-title',
                    link: {
                        config: {
                            uri: '#',
                            target: '_blank',
                            class: 'image-link-class',
                            title: 'image-link-title',
                        },
                    },
                },
            },
        },
        {
            name: 'navigation-image',
            context: {
                figure: false,
                placeholder: {
                    uri: {
                        default: 'https://via.placeholder.com/60x30/ccc/F00?text=png-60',
                    },
                },
                default: {
                    uri: {
                        default: 'https://via.placeholder.com/150x75/ccc/F00?text=png-150',
                    },
                    mq: '80w',
                    width: 80,
                    height: 80,
                    webP: {
                        default: 'https://via.placeholder.com/150x75.webp/ccc/000?text=WebP-150',
                        fileType: 'image/webp',
                    },
                },
                variants: [
                    {
                        mq: '150w',
                        uri: {
                            default: 'https://via.placeholder.com/300x150/ccc/F00?text=png-300',
                        },
                        webP: {
                            default:
                                'https://via.placeholder.com/300x150.webp/ccc/000?text=WebP-300',
                            fileType: 'image/webp',
                        },
                    },
                ],
            },
        },
        {
            name: 'navigation-icon',
            context: {
                figure: false,
                placeholder: {
                    uri: {
                        default: 'https://via.placeholder.com/40x40/ccc/F00?text=png-40',
                    },
                },
                default: {
                    uri: {
                        default: 'https://via.placeholder.com/80x80/ccc/F00?text=png-80',
                    },
                    mq: '80w',
                    width: 80,
                    height: 80,
                    webP: {
                        default: 'https://via.placeholder.com/80x80.webp/ccc/000?text=WebP-80',
                        fileType: 'image/webp',
                    },
                },
                variants: [
                    {
                        mq: '160w',
                        uri: {
                            default: 'https://via.placeholder.com/160x160/ccc/F00?text=png-160',
                        },
                        webP: {
                            default:
                                'https://via.placeholder.com/160x160.webp/ccc/000?text=WebP-160',
                            fileType: 'image/webp',
                        },
                    },
                ],
            },
        },
    ],
};
