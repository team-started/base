// Transpile all code following this line with babel and use 'env' (aka ES6) preset.
// https://timonweb.com/posts/how-to-enable-es6-imports-in-nodejs/
const { RESOLVER } = require('../settings');

require('@babel/register')({
    presets: [
        [
            '@babel/preset-env',
            {
                bugfixes: true,
            },
        ],
    ],
    plugins: [
        [
            'module-resolver',
            {
                alias: {
                    ...RESOLVER,
                },
            },
        ],
    ],
});

// Import ejs templates.
module.exports = require('./helpers');
