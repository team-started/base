'use strict';

// muss eingebunden werden, falls helper benötigt werden, wie z.B. "_lorem" für Dummytexte
// const _ = require('../../../../config/helpers');
const globalConfig = require('../module-general.config');

module.exports = {
    context: {
        ...globalConfig,
        CType: 'module',
    },
};
