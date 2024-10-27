-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE-TextMedia
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	title = 'CE05-Medien',
	slug = CONCAT(@slug_example_ce_de, '/ce05'),
	seo_title = 'Beispielhafte Inhalte mit den Inhaltselement Medien'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce05'),

	title = 'CE05-Media',
	seo_title = 'Examples of content with element media'
;

##
# get image
##
SET @file_image_1 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/cole-freeman-NHXy97995Sg-unsplash.jpg" LIMIT 1);
SET @file_image_2 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/daniel-santiago-46OsJaeD1F0-unsplash.jpg" LIMIT 1);
SET @file_image_3 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/eugene-chystiakov-TCQmflzrZRQ-unsplash.jpg" LIMIT 1);
SET @file_image_4 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/ruta-gudeliene-MkPt_FzqSkI-unsplash.jpg" LIMIT 1);

###
# Example content 1
###
INSERT INTO `tt_content` SET
  pid = @page,
  CType = 'starter_media',
  header = 'Curabitur at lacus ac',
  assets = 1,
  imagecols = 1,
  tx_starter_imagecols_medium = 1,
  tx_starter_imagecols_large = 1
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
  pid = @page,
  t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
  CType = 'starter_media',
  header = 'Curabitur at lacus ac',
  assets = 1,
  imagecols = 1,
  tx_starter_imagecols_medium = 1,
  tx_starter_imagecols_large = 1
;
SET @example_ce_overlay = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` SET
	pid = @page,
	uid_local = @file_image_1,
	uid_foreign = @example_ce,
	tablenames = 'tt_content',
	fieldname = 'assets'
;
SET @file_image_reference = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` SET
	pid = @page,
	sys_language_uid = @language_de,
	l10n_parent = @file_image_reference,
	uid_local = @file_image_1,
	uid_foreign = @example_ce_overlay,
	tablenames = 'tt_content',
	fieldname = 'assets'
;



###
# Example content 2
###
INSERT INTO `tt_content` SET
  pid = @page,
  CType = 'starter_media',
  header = 'Pellentesque habitant morbi',
  assets = 3,
  imagecols = 1,
  tx_starter_imagecols_medium = 2,
  tx_starter_imagecols_large = 3
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
  t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
  CType = 'starter_media',
  header = 'Pellentesque habitant morbi',
  assets = 3,
  imagecols = 1,
  tx_starter_imagecols_medium = 2,
  tx_starter_imagecols_large = 3
;
SET @example_ce_overlay = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` SET
	pid = @page,
	uid_local = @file_image_1,
	uid_foreign = @example_ce,
	tablenames = 'tt_content',
	fieldname = 'assets'
;
SET @file_image_reference = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` SET
	pid = @page,
	sys_language_uid = @language_de,
	l10n_parent = @file_image_reference,
	uid_local = @file_image_1,
	uid_foreign = @example_ce_overlay,
	tablenames = 'tt_content',
	fieldname = 'assets'
;

INSERT INTO `sys_file_reference` SET
	pid = @page,
	uid_local = @file_image_2,
	uid_foreign = @example_ce,
	tablenames = 'tt_content',
	fieldname = 'assets'
;
SET @file_image_reference = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` SET
	pid = @page,
	sys_language_uid = @language_de,
	l10n_parent = @file_image_reference,
	uid_local = @file_image_2,
	uid_foreign = @example_ce_overlay,
	tablenames = 'tt_content',
	fieldname = 'assets'
;

INSERT INTO `sys_file_reference` SET
	pid = @page,
	uid_local = @file_image_3,
	uid_foreign = @example_ce,
	tablenames = 'tt_content',
	fieldname = 'assets'
;
SET @file_image_reference = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` SET
	pid = @page,
	sys_language_uid = @language_de,
	l10n_parent = @file_image_reference,
	uid_local = @file_image_3,
	uid_foreign = @example_ce_overlay,
	tablenames = 'tt_content',
	fieldname = 'assets'
;



###
# Example content 3
###
INSERT INTO `tt_content` SET
  pid = @page,
  CType = 'starter_media',
  header = 'Praesent blandit laoreet nibh',
  assets = 4,
  imagecols = 1,
  tx_starter_imagecols_medium = 2,
  tx_starter_imagecols_large = 3
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
  t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
  CType = 'starter_media',
  header = 'Praesent blandit laoreet nibh',
  assets = 4,
  imagecols = 2,
  tx_starter_imagecols_medium = 3,
  tx_starter_imagecols_large = 4
;
INSERT INTO `sys_file_reference` SET
	pid = @page,
	uid_local = @file_image_1,
	uid_foreign = @example_ce,
	tablenames = 'tt_content',
	fieldname = 'assets'
;
SET @file_image_reference = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` SET
	pid = @page,
	sys_language_uid = @language_de,
	l10n_parent = @file_image_reference,
	uid_local = @file_image_1,
	uid_foreign = @example_ce_overlay,
	tablenames = 'tt_content',
	fieldname = 'assets'
;

INSERT INTO `sys_file_reference` SET
	pid = @page,
	uid_local = @file_image_2,
	uid_foreign = @example_ce,
	tablenames = 'tt_content',
	fieldname = 'assets'
;
SET @file_image_reference = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` SET
	pid = @page,
	sys_language_uid = @language_de,
	l10n_parent = @file_image_reference,
	uid_local = @file_image_2,
	uid_foreign = @example_ce_overlay,
	tablenames = 'tt_content',
	fieldname = 'assets'
;

INSERT INTO `sys_file_reference` SET
	pid = @page,
	uid_local = @file_image_3,
	uid_foreign = @example_ce,
	tablenames = 'tt_content',
	fieldname = 'assets'
;
SET @file_image_reference = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` SET
	pid = @page,
	sys_language_uid = @language_de,
	l10n_parent = @file_image_reference,
	uid_local = @file_image_3,
	uid_foreign = @example_ce_overlay,
	tablenames = 'tt_content',
	fieldname = 'assets'
;

INSERT INTO `sys_file_reference` SET
	pid = @page,
	uid_local = @file_image_4,
	uid_foreign = @example_ce,
	tablenames = 'tt_content',
	fieldname = 'assets'
;
SET @file_image_reference = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` SET
	pid = @page,
	sys_language_uid = @language_de,
	l10n_parent = @file_image_reference,
	uid_local = @file_image_4,
	uid_foreign = @example_ce_overlay,
	tablenames = 'tt_content',
	fieldname = 'assets'
;
