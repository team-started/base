'use strict';

const globalConfig = require('../module-general.config');
const mediaConfig = require('../../2-components/medias/media.config');

module.exports = {
    context: {
        ...globalConfig,
        ...mediaConfig.context,
        CType: 'starter-media',
    },
    variants: mediaConfig.variants,
};
