'use strict';

const navigationConfig = require('../navigation.config');

module.exports = {
    label: 'Accordion Menu',
    context: {
        ...navigationConfig.context,
        CType: 'navaccmenu',
    },
};
