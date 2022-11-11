-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE-Partner
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	title = 'CE-Partner',
	slug = CONCAT(@slug_example_ce_de, '/ce-partner'),
	seo_title = 'Beispielhafte Inhalte mit den Inhaltselement Partner'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce-partner'),

	title = 'CE-Partner',
	seo_title = 'Examples of content with element Partner'
;
