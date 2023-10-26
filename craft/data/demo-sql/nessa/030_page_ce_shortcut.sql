-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE-Shortcut
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	title = 'CE-Shortcut',
	slug = CONCAT(@slug_example_ce_de, '/ce-shortcut'),
	seo_title = 'Beispielhafter Inhalt mit den Inhaltselement Shortcut'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce-shortcut'),

	title = 'CE-Shortcut',
	seo_title = 'Example of content with element Shortcut'
;


###
# Example content 1
###
SET @ce_record_1 = (SELECT uid FROM tt_content WHERE CType = 'nessa_cta' AND sys_language_uid = 0 LIMIT 1);
SET @ce_record_2 = (SELECT uid FROM tt_content WHERE CType = 'starter_download' AND sys_language_uid = 0 LIMIT 1);

INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'shortcut',
	header = 'Interner Titel',
	records = CONCAT('tt_content_', @ce_record_1, ',tt_content_', @ce_record_2)
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'shortcut',
	header = 'No visible header',
	records = CONCAT('tt_content_', @ce_record_1, ',tt_content_', @ce_record_2)
;
