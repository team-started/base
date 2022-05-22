'use strict';

module.exports = {
    context: {
        assets: [
            {
                image: '@picture--link',
            },
        ],
        grid: {
            imageCols: {
                small: '',
                medium: '',
                large: '',
            },
        },
    },
    variants: [
        {
            name: 'images3',
            label: '3 images (1-2-3)',
            context: {
                assets: [
                    {
                        image: '@picture--link',
                    },
                    {
                        image: '@picture--metadata',
                    },
                    {
                        image: '@picture--no-figure',
                    },
                ],
                grid: {
                    imageCols: {
                        small: '1',
                        medium: '2',
                        large: '3',
                    },
                },
            },
        },
        {
            name: 'images7',
            label: '7 images (2-3-4)',
            context: {
                assets: [
                    {
                        image: '@picture--link',
                    },
                    {
                        image: '@picture--metadata',
                    },
                    {
                        image: '@picture--no-figure',
                    },
                    {
                        image: '@picture',
                    },
                    {
                        image: '@picture',
                    },
                    {
                        image: '@picture',
                    },
                    {
                        image: '@picture--metadata',
                    },
                ],
                grid: {
                    imageCols: {
                        small: '2',
                        medium: '3',
                        large: '4',
                    },
                },
            },
        },
    ],
};
