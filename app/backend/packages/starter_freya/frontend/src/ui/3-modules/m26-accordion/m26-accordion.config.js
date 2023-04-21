'use strict';

const globalConfig = require('../module-general.config');
const accordionConfig = require('../../2-components/accordions/accordion.config');

module.exports = {
    context: {
        ...globalConfig,
        ...accordionConfig.context,
        CType: 'accordion',
    },
    variants: accordionConfig.variants,
};
