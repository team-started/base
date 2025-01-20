-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE-DownloadList
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	title = 'CE-Download',
	slug = CONCAT(@slug_example_ce_de, '/m27'),
	seo_title = 'Beispielhafte Inhalte mit den Inhaltselement Downloadliste'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/m27'),

	title = 'CE-Download',
	seo_title = 'Examples of content with element download list'
;

##
# get download files
##
SET @file_download_1 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/files/LoremIpsum.docx" LIMIT 1);
SET @file_download_2 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/files/LoremIpsum.dotx" LIMIT 1);
SET @file_download_3 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/files/LoremIpsum.pdf" LIMIT 1);
SET @file_download_4 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/files/LoremIpsum.pptx" LIMIT 1);
SET @file_download_5 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/files/LoremIpsum.xlsx" LIMIT 1);
SET @file_download_6 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/files/LoremIpsum.zip" LIMIT 1);


###
# Example content 1
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'starter_m27_download',
	header = 'Download',
	subheader = 'Dokumente zum Download',
	header_layout = 2,
	media = 5
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_download_1, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_2, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_3, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_4, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_5, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_6, @example_ce, 'tt_content', 'media', '')
;

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'starter_m27_download',
	header = 'Download',
	subheader = 'Documents for download',
	header_layout = 2,
	media = 5
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_download_1, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_2, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_3, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_4, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_5, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_6, @example_ce, 'tt_content', 'media', '')
;



###
# Example content 2
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'starter_m27_download',
	header = 'Download',
	subheader = 'Dokumente zum Download',
	header_layout = 2,
	bodytext = '<p>Morbi vestibulum volutpat enim. Etiam rhoncus. Nam commodo suscipit quam. Donec venenatis vulputate lorem.</p>\r\n<p>Suspendisse feugiat. Cras risus ipsum, faucibus ut, ullamcorper id, varius ac, leo. Morbi mattis ullamcorper velit. Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor.</p>',
	media = 5
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_download_1, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_2, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_3, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_4, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_5, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_6, @example_ce, 'tt_content', 'media', '')
;

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'starter_m27_download',
	header = 'Download',
	subheader = 'Documents for download',
	header_layout = 2,
	bodytext = '<p>Morbi vestibulum volutpat enim. Etiam rhoncus. Nam commodo suscipit quam. Donec venenatis vulputate lorem.</p>\r\n<p>Suspendisse feugiat. Cras risus ipsum, faucibus ut, ullamcorper id, varius ac, leo. Morbi mattis ullamcorper velit. Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor.</p>',
	media = 5
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_download_1, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_2, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_3, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_4, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_5, @example_ce, 'tt_content', 'media', ''),
	(@page, @file_download_6, @example_ce, 'tt_content', 'media', '')
;



###
# Example content 3
###
INSERT INTO `sys_file_collection` SET
  pid = @page,
  title = 'Dateisammlung Download - Auswahl aus Ordner "files"',
  type = 'folder',
  folder_identifier = '1:/user_upload/_default/files/'
;
SET @example_m27_file_collection = LAST_INSERT_ID();

INSERT INTO `sys_file_collection` SET
  pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_m27_file_collection,
  title = 'File collection Download - all files from folder "files"',
  type = 'folder',
  folder_identifier = '1:/user_upload/_default/files/'
;
SET @example_m27_file_collection_overlay = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'starter_m27_download',
	header = 'Download',
	subheader = 'Dokumente zum Download von einer Dateisammmlung',
	header_layout = 2,
	bodytext = '',
	uploads_description = 1,
	file_collections = @example_m27_file_collection,
	filelink_size = 1
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'starter_m27_download',
	header = 'Download',
	subheader = 'Documents for download',
	header_layout = 2,
	bodytext = '',
	uploads_description = 1,
	file_collections = @example_m27_file_collection_overlay,
	filelink_size = 1
;
