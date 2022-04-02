'use strict';

const _ = require('../../../../config/helpers');
const globalConfig = require('../module-general.config');
const textmediaConfig = require('../../2-components/textmedias/textmedia.config');

module.exports = {
    context: {
        ...globalConfig,
        ...textmediaConfig.context,
        CType: 'textmedia',
    },
    variants: [...textmediaConfig.variants],
};
