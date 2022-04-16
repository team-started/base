'use strict';

const globalConfig = require('../../3-modules/module-general.config');

module.exports = {
    context: {
        ...globalConfig,
        CType: 'example',
    },
};
