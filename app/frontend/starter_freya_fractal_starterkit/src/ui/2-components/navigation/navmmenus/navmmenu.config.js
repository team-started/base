'use strict';

const navigationConfig = require('../navigation.config');

module.exports = {
    label: 'Megamenu',
    context: {
        ...navigationConfig.context,
    },
};
