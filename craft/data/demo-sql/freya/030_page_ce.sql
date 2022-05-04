-- noinspection SqlNoDataSourceInspectionForFile

###
# add first level content elements
###
INSERT INTO `pages` SET
	pid = @freya_root_de,
	doktype = 1,
	title = 'Inhaltselemente',
	slug = @slug_example_ce_de,
	seo_title = 'Beispielhafte Inhaltselemente'
;
SET @sitemap_level_1 = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	sys_language_uid = @language_en,
	l10n_parent = @sitemap_level_1,
	l10n_source = @sitemap_level_1,
	doktype = 1,
	slug = @slug_example_ce_en,

	title = 'Content elements',
	seo_title = 'Examples of content elements'
;
SET @sitemap_level_1_en = LAST_INSERT_ID();
