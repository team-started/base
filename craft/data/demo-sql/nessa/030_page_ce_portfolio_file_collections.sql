-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE-Portfolio
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	title = 'CE-Portfolio mit Dateisammlung',
	slug = CONCAT(@slug_example_ce_de, '/ce-portfolio-file-collections'),
	seo_title = 'Beispielhafte Inhalte mit den Inhaltselement Portfolio mit Dateisammlung(en)'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce-portfolio-file-collections'),

	title = 'CE-Portfolio with file collection(s)',
	seo_title = 'Examples of content with element Portfolio with file collection(s)'
;


##
# get image
##
SET @file_image_1 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/coffee/ante-samarzija-lsmu0rUhUOk-unsplash.jpg" LIMIT 1);
SET @file_image_2 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/coffee/jeanie-de-klerk-hmLY7GiNFyE-unsplash.jpg" LIMIT 1);
SET @file_image_3 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/coffee/jeremy-yap-jn-HaGWe4yw-unsplash.jpg" LIMIT 1);
SET @file_image_4 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/coffee/nathan-dumlao-l59fmhtprIE-unsplash.jpg" LIMIT 1);
SET @file_image_5 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/coffee/nathan-dumlao-mgxgvwam_-c-unsplash.jpg" LIMIT 1);
SET @file_image_6 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/coffee/nathan-dumlao-nBJHO6wmRWw-unsplash.jpg" LIMIT 1);


###
# Example content 1
###
INSERT INTO `sys_file_collection` SET
  pid = @page,
  title = 'Dateisammlung 1 - mit manuell ausgewählten Dateien',
  type = 'static',
  files = 6
;
SET @example_file_collection = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_1, @example_file_collection, 'sys_file_collection', 'files', ''),
	(@page, @file_image_2, @example_file_collection, 'sys_file_collection', 'files', ''),
	(@page, @file_image_3, @example_file_collection, 'sys_file_collection', 'files', ''),
	(@page, @file_image_4, @example_file_collection, 'sys_file_collection', 'files', ''),
	(@page, @file_image_5, @example_file_collection, 'sys_file_collection', 'files', ''),
	(@page, @file_image_6, @example_file_collection, 'sys_file_collection', 'files', '')
;

INSERT INTO `sys_file_collection` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_file_collection,
  title = 'File collection 1 - with manuell selected files',
  type = 'static',
  files = 6
;
SET @example_file_collection_overlay = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_1, @example_file_collection_overlay, 'sys_file_collection', 'files', ''),
	(@page, @file_image_2, @example_file_collection_overlay, 'sys_file_collection', 'files', ''),
	(@page, @file_image_3, @example_file_collection_overlay, 'sys_file_collection', 'files', ''),
	(@page, @file_image_4, @example_file_collection_overlay, 'sys_file_collection', 'files', ''),
	(@page, @file_image_5, @example_file_collection_overlay, 'sys_file_collection', 'files', ''),
	(@page, @file_image_6, @example_file_collection_overlay, 'sys_file_collection', 'files', '')
;

INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'nessa_portfolio_file_collections',
	header = 'Referenzen',
	subheader = 'Ein Auszug aus unseren Referenzen',
	header_layout = 2,
	bodytext = '<p>Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Nunc nonummy metus. Praesent blandit laoreet nibh. Morbi mollis tellus ac sapien.&nbsp;Pellentesque auctor neque nec urna. Fusce fermentum odio nec arcu. In ac felis quis tortor malesuada pretium. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum. Cras ultricies mi eu turpis hendrerit fringilla.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum. Phasellus dolor. Praesent adipiscing. Nulla sit amet est.</p>',
	file_collections = @example_file_collection,
  filelink_sorting = '',
  filelink_sorting_direction = ''
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'nessa_portfolio_file_collections',
	header = 'References',
	subheader = 'An excerpt from our references',
	header_layout = 2,
	bodytext = '<p>Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Nunc nonummy metus. Praesent blandit laoreet nibh. Morbi mollis tellus ac sapien.&nbsp;Pellentesque auctor neque nec urna. Fusce fermentum odio nec arcu. In ac felis quis tortor malesuada pretium. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum. Cras ultricies mi eu turpis hendrerit fringilla.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum. Phasellus dolor. Praesent adipiscing. Nulla sit amet est.</p>',
	file_collections = @example_file_collection_overlay,
  filelink_sorting = '',
  filelink_sorting_direction = ''
;


###
# Example content 2
###
INSERT INTO `sys_file_collection` SET
  pid = @page,
  title = 'Dateisammlung 2 - Auswahl aus Ordner "coffee"',
  type = 'folder',
  files = 0,
  folder_identifier = '1:/user_upload/_default/images/coffee/'
;
SET @example_file_collection = LAST_INSERT_ID();

INSERT INTO `sys_file_collection` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_file_collection,
  title = 'File collection 2 - Selection of folder "coffee"',
  type = 'folder',
  files = 0,
  folder_identifier = '1:/user_upload/_default/images/coffee/'
;
SET @example_file_collection_overlay = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'nessa_portfolio_file_collections',
	header = 'Referenzen',
	subheader = 'Ein Auszug aus unseren Referenzen',
	header_layout = 2,
	bodytext = '<p>Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Nunc nonummy metus. Praesent blandit laoreet nibh. Morbi mollis tellus ac sapien.&nbsp;Pellentesque auctor neque nec urna. Fusce fermentum odio nec arcu. In ac felis quis tortor malesuada pretium. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum. Cras ultricies mi eu turpis hendrerit fringilla.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum. Phasellus dolor. Praesent adipiscing. Nulla sit amet est.</p>',
	file_collections = @example_file_collection,
  filelink_sorting = '',
  filelink_sorting_direction = ''
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'nessa_portfolio_file_collections',
	header = 'References',
	subheader = 'An excerpt from our references',
	header_layout = 2,
	bodytext = '<p>Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Nunc nonummy metus. Praesent blandit laoreet nibh. Morbi mollis tellus ac sapien.&nbsp;Pellentesque auctor neque nec urna. Fusce fermentum odio nec arcu. In ac felis quis tortor malesuada pretium. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum. Cras ultricies mi eu turpis hendrerit fringilla.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum. Phasellus dolor. Praesent adipiscing. Nulla sit amet est.</p>',
	file_collections = @example_file_collection_overlay,
  filelink_sorting = '',
  filelink_sorting_direction = ''
;
