-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE-Teaser
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	title = 'CE-Teaser',
	slug = CONCAT(@slug_example_ce_de, '/ce-teaser'),
	seo_title = 'Beispielhafte Inhalte mit den Inhaltselement Teaser'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce-teaser'),

	title = 'CE-Teaser',
	seo_title = 'Examples of content with element Teaser'
;
