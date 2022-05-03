'use strict';

const hero = require('../../3-modules/m27-hero/m27-hero.config');
const text = require('../../3-modules/m02-text/m02-text.config');

const context = {};
context.hero = hero.context;
context.text = text.context;

module.exports = {
    context: context,
};
