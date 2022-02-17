module.exports = {
  extends: [
    'stylelint-config-standard',
    'stylelint-config-standard-scss',
    'stylelint-config-idiomatic-css',
    'stylelint-config-prettier',
  ],
  plugins: ['stylelint-order'],
  ignoreFiles: ['node_modules/**', 'src/assets/fonts/**', 'src/assets/style/reset.css'],
  overrides: [
    {
      files: ['*.vue', '**/*.vue', "*.scss", "**/*.scss"],
      customSyntax: 'postcss-scss'
    },
  ],
  rules: {
    'at-rule-no-unknown': [
      true,
      { ignoreAtRules: ['use', 'extend', 'extends', 'ignores', 'include', 'mixin', 'if', 'else', 'media', 'for', 'each'] },
    ],
    // 'order/order': ['custom-properties', 'declarations'],
    // 'order/properties-order': ['width', 'height'],
    'scss/at-import-no-partial-leading-underscore': null,
    'scss/at-import-partial-extension': null,
    'scss/no-global-function-names': null, // Bootstrap hat Functions, die dem Standart nichtn entsprechen! https://sass-lang.com/documentation/cli/migrator
    'scss/at-extend-no-missing-placeholder': null
  },
}
