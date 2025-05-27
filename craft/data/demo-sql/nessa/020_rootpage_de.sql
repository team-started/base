-- noinspection SqlNoDataSourceInspectionForFile

INSERT INTO `pages` SET
	uid = @nessa_root_de,
	slug = '/',
	title = 'Theme Nessa',
	doktype = 1,
	sorting = 1,
	is_siteroot = 1,
	backend_layout = 'pagets__HeroLayout',
	backend_layout_next_level = 'pagets__DefaultLayout',
	tsconfig_includes = 'EXT:sitepackage_nessa/Configuration/TSConfig/PageTs.typoscript',
	description = 'Theme-Nessa DE - Nunc egestas, augue at pellentesque laoreet, felis eros vehicula leo, at malesuada velit leo quis pede. Sed a libero. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Aenean imperdiet. Nullam vel sem.',
	keywords = 'TYPO3, Theme Erweiterung, Sitepackage'
;

INSERT INTO `pages` SET
	uid = @nessa_root_en,
	sys_language_uid = @language_en,
	l10n_parent = @nessa_root_de,
	l10n_source = @nessa_root_de,
	doktype = 1,
	slug = '/',
	is_siteroot = 1,
	backend_layout = 'pagets__HeroLayout',
	backend_layout_next_level = 'pagets__DefaultLayout',
	tsconfig_includes = 'EXT:sitepackage_nessa/Configuration/TSConfig/PageTs.typoscript',

	title = 'Theme Nessa',
	description = 'Theme-Nessa EN - Nunc egestas, augue at pellentesque laoreet, felis eros vehicula leo, at malesuada velit leo quis pede. Sed a libero. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Aenean imperdiet. Nullam vel sem.',
	keywords = 'TYPO3, Theme extension, Sitepackage'
;

INSERT INTO `sys_template` SET
	pid = @nessa_root_de,
	root = 1,
	clear = 3,
	title = 'Theme-Nessa',
	include_static_file = 'EXT:sitepackage_nessa/Configuration/TypoScript/'
;

INSERT INTO `sys_category` SET
	pid = @nessa_root_de,
	sorting = 64,
	parent = 0,
	title = 'Portfolio',
	slug = 'portfolio'
;
SET @category_parent = LAST_INSERT_ID();

INSERT INTO `sys_category` SET
	pid = @nessa_root_de,
	sys_language_uid = @language_en,
	l10n_parent = @category_parent,
	sorting = 64,
	parent = 0,
	title = 'Portfolio',
	slug = 'portfolio'
;

INSERT INTO `sys_category` SET
	pid = @nessa_root_de,
	parent = @category_parent,
	sorting = 640,
	title = 'Beispiel A',
	slug = 'beispiel-a'
;
SET @category = LAST_INSERT_ID();

INSERT INTO `sys_category` SET
	pid = @nessa_root_de,
	parent = @category_parent,
	sys_language_uid = @language_en,
	l10n_parent = @category,
	sorting = 640,
	title = 'Example A',
	slug = 'example-a'
;

INSERT INTO `sys_category` SET
	pid = @nessa_root_de,
	parent = @category_parent,
	sorting = 768,
	title = 'Beispiel B',
	slug = 'beispiel-a'
;
SET @category = LAST_INSERT_ID();

INSERT INTO `sys_category` SET
	pid = @nessa_root_de,
	parent = @category_parent,
	sys_language_uid = @language_en,
	l10n_parent = @category,
	sorting = 768,
	title = 'Example B',
	slug = 'example-b'
;
