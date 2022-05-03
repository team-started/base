'use strict';

const globalConfig = require('../module-general.config');

module.exports = {
    context: {
        ...globalConfig,
        CType: 'hero',
        image: {
            small: '@picture--small',
            medium: '@picture--medium',
            large: '@picture--large',
        },
    },
};
