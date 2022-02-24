'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        link: {
            config: {
                uri: '#uri-from-link.html',
                target: '_blank',
                class: 'class from link',
                title: 'title from link',
            },
        },
    },
};
