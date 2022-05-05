const { resolve } = require('path');
const pkg = require('../package.json');

const root = resolve(__dirname, '../');
const config = resolve(root, 'config');
const src = resolve(root, 'src');
const ui = resolve(src, 'ui');
const assets = resolve(src, 'assets');
const build = resolve(root, 'build');
const dist = resolve(build, 'static');
const fractal = resolve(build, 'prototype');

const year = new Date().getFullYear();

const settings = {
    PKG: pkg,
    DIR: {
        root,
        config,
        src,
        ui,
        assets,
        public: resolve(root, 'public'),
        npmPackages: resolve(root, 'node_modules'),
        icons: resolve(assets, 'icons'),
        fonts: resolve(assets, 'fonts'),
        images: resolve(assets, 'images'),
    },
    DEV: {
        showStats: false,
        host: 'localhost',
        port: 8080,
        // https://webpack.js.org/configuration/devtool/
        useSourceMap: true,
        typeSourceMap: 'source-map',
        barOption: { name: 'Development' },
    },
    BUILD: {
        dist,
        fractal,
        assets: resolve(dist, 'assets'),
        folders: ['js', 'content'],
        jsFolder: 'js',
        cssFolder: 'css',
        fontFolder: 'fonts',
        imageFolder: 'images',
        assetsFolder: 'assets',
        publicFolder: 'public',
        showStats: true,
        hashJs: false,
        hashCss: false,
        hashAssets: false,
        buildManifest: false,
        bundleAnalyzer: false,
        useSourceMap: false,
        // https://webpack.js.org/configuration/devtool/
        typeSourceMap: 'source-map',
        barOption: { name: 'Production', color: '#293ACB' },
        // Adds a banner to the top of each generated chunk.
        banner: `
/*!
 *
 *  ${pkg.name} ${pkg.version}
 *  ${pkg.description}
 *  ============================================================================
 *  author: ${pkg.author}
 *  https://starter.team
 *  ============================================================================
 *  Copyright (c) ${year}, ${pkg.author}
 *  ============================================================================
 *
 */`,
    },
    RESOLVER: {
        '@': src,
        '@draft': resolve(ui, '0-draft'),
        '@playground': resolve(ui, '0-playground'),
        '@object': resolve(ui, '1-objects'),
        '@component': resolve(ui, '2-components'),
        '@module': resolve(ui, '3-modules'),
    },
    PLUGINS: {
        notifier: false,
    },
    STATS: {
        all: false,
        assets: true,
        excludeAssets: (assetName) => !/\.js$/i.test(assetName),
        assetsSort: 'name',
        chunks: false,
        entrypoints: true,
        assetsSpace: Number.MAX_SAFE_INTEGER,
        moduleAssets: false,
        groupAssetsByChunk: false,
        groupAssetsByEmitStatus: false,
        groupAssetsByInfo: false,
        groupModulesByAttributes: false,
        warnings: true,
        errors: true,
        errorDetails: true,
    },
    ICONS: {
        spriteName: 'sprite.svg',
    },
    OPTIONS: {
        // https://github.com/mikaelbr/node-notifier
        notifier: (type, logo, successSound) => ({
            title: `${pkg.name} ${pkg.version} - ${type}`,
            successSound,
            failureSound: 'Funk',
            suppressSuccess: false,
            activateTerminalOnError: false,
            logo: resolve(config, 'icons', logo),
            failureIcon: resolve(config, 'icons', 'error.png'),
            warningIcon: resolve(config, 'icons', 'warning.png'),
            successIcon: resolve(config, 'icons', 'success.png'),
        }),
    },
};

module.exports = {
    settings,
};
