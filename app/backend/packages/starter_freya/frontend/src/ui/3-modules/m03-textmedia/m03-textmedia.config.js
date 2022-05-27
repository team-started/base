'use strict';

const globalConfig = require('../module-general.config');
const textmediaConfig = require('../../2-components/textmedias/textmedia.config');

module.exports = {
    context: {
        ...globalConfig,
        ...textmediaConfig.context,
        CType: 'starter_textmedia',
    },
    variants: [...textmediaConfig.variants],
};
