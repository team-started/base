'use strict';

module.exports = {
    context: {
        text: 'button default',
    },
    variants: [
        {
            name: 'icon',
            label: 'icon',
            context: {
                text: 'button variant icon',
            },
        },
        {
            name: 'outline',
            label: 'outline',
            context: {
                text: 'button variant outline',
            },
        },
    ],
};
