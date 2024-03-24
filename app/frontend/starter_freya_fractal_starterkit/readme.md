# Frontend theme StarterFreya

## Setup

Requires a node version `>=16 <17` and npm version `>=8`

## Application architecture

* [Twig](https://twig.symfony.com/)
* [fractal](https://fractal.build/)
* [ITCSS](https://www.xfive.co/blog/itcss-scalable-maintainable-css-architecture/)
* [Sass](https://sass-lang.com/)
* [PostCSS](https://postcss.org/)
* [Babel](https://babeljs.io/)
* [webpack](https://webpack.js.org/)

## Install dependencies with npm

```sh
# switch to node version >=16 <17
$ nvm use

# install dependencies
$ npm i
```

### Development

```sh
# watch in development-mode
$ npm start
```

### Production

```sh
# build assets for production with minifications
$ npm run build


# build icon fonts
$ npm run build:icons


# preview fractal
$ npm run preview:fractal


# analyze bundle - set bundleAnalyzer to tru (see Developer Settings)
$ npm run preview:analyze
```

### Linting
> [eslint](https://eslint.org/)
> [stylelint](https://stylelint.io/)

```sh
# lint js/css
$ npm run lint

# lint js
$ npm run lint:js

# lint css
$ npm run lint:css
```

## Configuration

### Webpack
Webpack settings can be done in `config/settings.webpack.js`

### Fractal
**Many core fuctions of Fractal are not longer working**, because of Namespacing, f.e:
- Includes: ~~`{% include '@object %}`~~ -> `{% include '@object/objects/object.twig' %}`
- Handles: ~~`"handle": "clickme"`~~

see: `fractal.config.js`, `tsconfig.json`, `settings.webpack.js`

#### Folders
A Folder always needs to be written in plural "buttons", because of namespacing issues.

### Developer Settings
Developer settings can be done in `developer.config.js`. First duplicate `developer.config.js.tmpl` and rename it to `developer.config.js`.

| Name           | Type | Default    | Categorie | Info                                                                             |
| -------------- | ---- | ---------- | --------- | -------------------------------------------------------------------------------- |
| notifier       | BOL  | false      | PLUGIN    | [webpack-build-notifier](https://www.npmjs.com/package/webpack-build-notifier)   |
| showStats      | BOL  | false      | DEV       |                                                                                  |
| useSourceMap   | BOL  | true       | DEV       |                                                                                  |
| typeSourceMap  | STR  | source-map | DEV       | [Devtool](https://webpack.js.org/configuration/devtool/)                         |
| bundleAnalyzer | BOL  | false      | BUILD     | [webpack-bundle-analyzer](https://www.npmjs.com/package/webpack-bundle-analyzer) |


### Vscode Settings
Duplicate `.vscode.tmpl` and rename it to `.vscode`.
