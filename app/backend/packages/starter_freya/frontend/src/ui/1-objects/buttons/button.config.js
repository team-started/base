'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        text: _.lorem(20, 'max 20'),
    },
};
