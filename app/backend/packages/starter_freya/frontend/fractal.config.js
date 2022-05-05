const fractal = require('@frctl/fractal').create();
const theme = require('@frctl/mandelbrot');
// https://www.npmjs.com/package/@frctl/twig
const twigAdapter = require('@frctl/twig');
const helpers = require('./config/helpers');

const { PKG, DIR, BUILD, isProduction } = require('./config/settings');

const customTheme = theme({
    skin: {
        name: 'default',
        accent: '#999999',
    },
    styles: ['default'],
});

/**
 * Setup Project, See https://www.fractal.build for Documentation
 */
fractal.set('project.title', PKG.name);

fractal.docs.set('path', `${DIR.root}/docs`);

fractal.web.set('builder.dest', BUILD.fractal);
fractal.web.set('static.path', BUILD.dist);

/**
 * Exclude folder, See https://fractal.build/guide/components/configuration-reference.html#global-configuration-options for Documentation
 */
const excludes = isProduction ? ['**/0-playground/**', '**/0-draft/**'] : [];
fractal.components.set('exclude', ['**/node_modules/**', ...excludes]);

/**
 * Define Component Statuses and set Prototype to default
 */
fractal.components.set('path', DIR.ui);
fractal.components.set('default.status', 'none');
fractal.components.set('statuses', {
    none: {
        label: '',
        description: '',
        color: 'transparent',
    },
    wip: {
        label: 'In progress',
        description: 'Work in progress. Implement with caution.',
        color: '#FF8800',
    },
    ready: {
        label: 'Ready',
        description: 'Ready to implement in CMS.',
        color: '#e8aa09',
    },
    refactor: {
        label: 'Refactoring',
        description: 'Needs Refactoring / Review.',
        color: '#510',
    },
    deprecated: {
        label: 'deprecated',
        description: 'Implement only under special circumstances, search for updated version',
        color: '#d52424',
    },
    finished: {
        label: 'Finished',
        description: 'Tested and ready to use in CMS',
        color: '#34e769',
    },
});

/**
 * Require the Twig adapter
 */
fractal.components.engine(
    twigAdapter({
        autoescape: false,
        // register custom functions
        // usage: {{ capitalize(value) }}
        functions: helpers,
        namespaces: {
            draft: './0-draft',
            playground: './0-playground',
            object: './1-objects',
            component: './2-components',
            module: './3-modules',
        },
    }),
);
fractal.components.set('ext', '.twig');

/**
 * Set Browsersync Options
 */
fractal.web.set('server.sync', true);
fractal.web.set('server.syncOptions', {
    open: false,
    notify: true,
    watchOptions: {
        ignoreInitial: true,
        ignored: ['**/*.scss'],
    },
});

// TODO: Braucht ihr daas noch?
// customTheme.addLoadPath(`${DIR.root}/theme-overrides`);

fractal.web.theme(customTheme);

module.exports = fractal;
