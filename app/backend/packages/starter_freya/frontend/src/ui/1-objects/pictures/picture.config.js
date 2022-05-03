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
        {
            name: 'small',
            context: {
                figure: false,
                placeholder: {
                    uri: {
                        default: 'https://via.placeholder.com/60x40/ccc/F00?text=png-60',
                    },
                },
                default: {
                    uri: {
                        default: 'https://via.placeholder.com/400x267/ccc/F00?text=png-400',
                    },
                    mq: '400w',
                    width: 400,
                    height: 267,
                    webP: {
                        default: 'https://via.placeholder.com/400x267.webp/ccc/000?text=WebP-400',
                        fileType: 'image/webp',
                    },
                },
                variants: [
                    {
                        mq: '800w',
                        uri: {
                            default: 'https://via.placeholder.com/800x534/ccc/F00?text=png-800',
                        },
                        webP: {
                            default:
                                'https://via.placeholder.com/800x534.webp/ccc/000?text=WebP-800',
                            fileType: 'image/webp',
                        },
                    },
                ],
            },
        },
        {
            name: 'medium',
            context: {
                figure: false,
                placeholder: {
                    uri: {
                        default: 'https://via.placeholder.com/71x40/ccc/F00?text=png-71',
                    },
                },
                default: {
                    uri: {
                        default: 'https://via.placeholder.com/600x256/ccc/F00?text=png-600',
                    },
                    mq: '600w',
                    width: 600,
                    height: 338,
                    webP: {
                        default: 'https://via.placeholder.com/600x338.webp/ccc/000?text=WebP-600',
                        fileType: 'image/webp',
                    },
                },
                variants: [
                    {
                        mq: '1000w',
                        uri: {
                            default: 'https://via.placeholder.com/1000x563/ccc/F00?text=png-1000',
                        },
                        webP: {
                            default:
                                'https://via.placeholder.com/1000x563.webp/ccc/000?text=WebP-1000',
                            fileType: 'image/webp',
                        },
                    },
                ],
            },
        },
        {
            name: 'large',
            context: {
                figure: false,
                placeholder: {
                    uri: {
                        default: 'https://via.placeholder.com/93x40/ccc/F00?text=png-93',
                    },
                },
                default: {
                    uri: {
                        default: 'https://via.placeholder.com/600x257/ccc/F00?text=png-600',
                    },
                    mq: '600w',
                    width: 600,
                    height: 257,
                    webP: {
                        default: 'https://via.placeholder.com/600x257.webp/ccc/000?text=WebP-600',
                        fileType: 'image/webp',
                    },
                },
                variants: [
                    {
                        mq: '1200w',
                        uri: {
                            default: 'https://via.placeholder.com/1200x514/ccc/F00?text=png-1200',
                        },
                        webP: {
                            default:
                                'https://via.placeholder.com/1200x514.webp/ccc/000?text=WebP-1200',
                            fileType: 'image/webp',
                        },
                    },
                    {
                        mq: '2400w',
                        uri: {
                            default: 'https://via.placeholder.com/2400x1029/ccc/F00?text=png-2400',
                        },
                        webP: {
                            default:
                                'https://via.placeholder.com/2400x1029.webp/ccc/000?text=WebP-2400',
                            fileType: 'image/webp',
                        },
                    },
                ],
            },
        },
    ],
};
