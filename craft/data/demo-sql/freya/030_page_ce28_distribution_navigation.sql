-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE28-Distribution navigation
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	title = 'CE28-Unterseitennavigation',
	slug = CONCAT(@slug_example_ce_de, '/ce28'),
	seo_title = 'Beispielhafte Inhalte mit den Inhaltselement Unterseitennavigation'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce28'),

	title = 'CE28-Distribution navigation',
	seo_title = 'Examples of content with element distribution navigation'
;

###
# Example content
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'starter_distribution_navigation',
	header = 'Sieh dir auch unsere anderen Themen an'
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'starter_distribution_navigation',
	header = 'Check out our other topics too'
;


###
# Example subpage 1
###
INSERT INTO `pages` SET
	pid = @page,
	doktype = 1,
	title = 'Beispielseite 1',
	slug = CONCAT(@slug_example_ce_de, '/ce28/example-page-1'),
	seo_title = '',
	sorting = 512
;
SET @example_page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_page,
	l10n_source = @example_page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce28/example-page-1'),

	title = 'Example subpage 1',
	seo_title = '',
	sorting = 512
;

###
# Example subpage 2
###
INSERT INTO `pages` SET
	pid = @page,
	doktype = 1,
	title = 'Beispielseite 2',
	slug = CONCAT(@slug_example_ce_de, '/ce28/example-page-2'),
	seo_title = '',
	sorting = 768
;
SET @example_page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_page,
	l10n_source = @example_page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce28/example-page-2'),

	title = 'Example subpage 2',
	seo_title = '',
	sorting = 768
;

###
# Example subpage 3
###
INSERT INTO `pages` SET
	pid = @page,
	doktype = 1,
	title = 'Beispielseite 3',
	slug = CONCAT(@slug_example_ce_de, '/ce28/example-page-3'),
	seo_title = '',
	sorting = 1024
;
SET @example_page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_page,
	l10n_source = @example_page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce28/example-page-3'),

	title = 'Example subpage 3',
	seo_title = '',
	sorting = 1024
;

###
# Example subpage 4
###
INSERT INTO `pages` SET
	pid = @page,
	doktype = 1,
	title = 'Beispielseite 4',
	slug = CONCAT(@slug_example_ce_de, '/ce28/example-page-4'),
	seo_title = '',
	sorting = 1280
;
SET @example_page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_page,
	l10n_source = @example_page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce28/example-page-4'),

	title = 'Example subpage 4',
	seo_title = '',
	sorting = 1280
;

###
# Example subpage 5
###
INSERT INTO `pages` SET
	pid = @page,
	doktype = 1,
	title = 'Beispielseite 5',
	slug = CONCAT(@slug_example_ce_de, '/ce28/example-page-5'),
	seo_title = '',
	sorting = 1536
;
SET @example_page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_page,
	l10n_source = @example_page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce28/example-page-5'),

	title = 'Example subpage 5',
	seo_title = '',
	sorting = 1536
;

###
# Example subpage 6
###
INSERT INTO `pages` SET
	pid = @page,
	doktype = 1,
	title = 'Beispielseite 6',
	slug = CONCAT(@slug_example_ce_de, '/ce28/example-page-6'),
	seo_title = '',
	sorting = 1792
;
SET @example_page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_page,
	l10n_source = @example_page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce28/example-page-6'),

	title = 'Example subpage 6',
	seo_title = '',
	sorting = 1792
;

###
# Example subpage 7
###
INSERT INTO `pages` SET
	pid = @page,
	doktype = 1,
	title = 'Beispielseite 7',
	slug = CONCAT(@slug_example_ce_de, '/ce28/example-page-7'),
	seo_title = '',
	sorting = 2048
;
SET @example_page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_page,
	l10n_source = @example_page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce28/example-page-7'),

	title = 'Example subpage 7',
	seo_title = '',
	sorting = 2048
;

###
# Example subpage 8
###
INSERT INTO `pages` SET
	pid = @page,
	doktype = 1,
	title = 'Beispielseite 8',
	slug = CONCAT(@slug_example_ce_de, '/ce28/example-page-8'),
	seo_title = '',
	sorting = 2304
;
SET @example_page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_page,
	l10n_source = @example_page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce28/example-page-8'),

	title = 'Example subpage 8',
	seo_title = '',
	sorting = 2304
;
