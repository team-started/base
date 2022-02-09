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
      { ignoreAtRules: ['use', 'extends', 'ignores', 'include', 'mixin', 'if', 'else', 'media', 'for'] },
    ],
    // 'order/order': ['custom-properties', 'declarations'],
    // 'order/properties-order': ['width', 'height'],
    'scss/at-import-no-partial-leading-underscore': null,
    'scss/at-import-partial-extension': null,
  },
}
