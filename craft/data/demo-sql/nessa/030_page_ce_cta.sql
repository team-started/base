-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE-CTA
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	title = 'CE-CTA',
	slug = CONCAT(@slug_example_ce_de, '/ce-cta'),
	seo_title = 'Beispielhafte Inhalte mit den Inhaltselement Call-to-Action'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce-cta'),

	title = 'CE-CTA',
	seo_title = 'Examples of content with element Call-to-Action'
;


###
# Example content 1
# CTA-Link is set in "030_page_post_update.sql"
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'nessa_cta',
	header = 'Überschrift für das CTA Element',
	bodytext = 'Praesent turpis. Fusce ac felis sit amet ligula pharetra condimentum. Pellentesque dapibus hendrerit tortor. Etiam iaculis nunc ac metus. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Etiam ut purus mattis mauris sodales aliquam. Sed hendrerit. Donec sodales sagittis magna. Praesent ac massa at ligula laoreet iaculis. Etiam ultricies nisi vel augue.',
	tx_starter_ctalink_text = 'Mehr Infos im CE-Download'
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'nessa_cta',
	header = 'Headline of CTA element',
	bodytext = 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum.',
	tx_starter_ctalink_text = 'More infos im CE-Download'
;
