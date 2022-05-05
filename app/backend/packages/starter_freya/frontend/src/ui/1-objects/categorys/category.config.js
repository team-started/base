'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        text: _.lorem(50, 'category:'),
    },
};
