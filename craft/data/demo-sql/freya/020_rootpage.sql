-- noinspection SqlNoDataSourceInspectionForFile

INSERT INTO `pages` SET
	uid = @freya_root_de,
	slug = '/',
	title = 'Theme Freya',
	doktype = 1,
	sorting = 1,
	is_siteroot = 1,
	backend_layout = '',
	backend_layout_next_level = '',
	tsconfig_includes = 'EXT:sitepackage_freya/Configuration/TSConfig/PageTs.typoscript',
	description = 'Theme-Freya DE - Nunc egestas, augue at pellentesque laoreet, felis eros vehicula leo, at malesuada velit leo quis pede. Sed a libero. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Aenean imperdiet. Nullam vel sem.',
	keywords = 'TYPO3, Theme Erweiterung, Sitepackage'
;

INSERT INTO `pages` SET
	uid = @freya_root_en,
	sys_language_uid = @language_en,
	l10n_parent = @freya_root_de,
	l10n_source = @freya_root_de,
	doktype = 1,
	slug = '/',
	is_siteroot = 1,
	backend_layout = '',
	backend_layout_next_level = '',
	tsconfig_includes = 'EXT:sitepackage_freya/Configuration/TSConfig/PageTs.typoscript',

	title = 'Theme Freya',
	description = 'Theme-Freya EN - Nunc egestas, augue at pellentesque laoreet, felis eros vehicula leo, at malesuada velit leo quis pede. Sed a libero. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Aenean imperdiet. Nullam vel sem.',
	keywords = 'TYPO3, Theme extension, Sitepackage'
;

INSERT INTO `sys_template` SET
	pid = @freya_root_de,
	root = 1,
	clear = 3,
	title = 'Theme-Freya',
	include_static_file = 'EXT:sitepackage_freya/Configuration/TypoScript/'
;
