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


##
# get image files
##
SET @file_image_1 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/cole-freeman-NHXy97995Sg-unsplash.jpg" LIMIT 1);
SET @file_image_2 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/daniel-santiago-46OsJaeD1F0-unsplash.jpg" LIMIT 1);
SET @file_image_3 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/eugene-chystiakov-TCQmflzrZRQ-unsplash.jpg" LIMIT 1);


###
# Example content 1
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'nessa_partner',
	header = 'Überschrift für das Element Partner',
	subheader = 'Aptent taciti sociosqu',
	bodytext = '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>',
	assets = 3,
  frame_class = 'ctype-nessa_partner__no-bordered'
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_1, @example_ce, 'tt_content', 'assets', ''),
	(@page, @file_image_2, @example_ce, 'tt_content', 'assets', ''),
	(@page, @file_image_3, @example_ce, 'tt_content', 'assets', '')
;

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'nessa_partner',
	header = 'Headline of CE-Partner',
	bodytext = '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum.</p>',
	assets = 3,
	frame_class = 'ctype-nessa_partner__no-bordered'
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_1, @example_ce, 'tt_content', 'assets', ''),
	(@page, @file_image_2, @example_ce, 'tt_content', 'assets', ''),
	(@page, @file_image_3, @example_ce, 'tt_content', 'assets', '')
;

###
# Example content 2
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'nessa_partner',
	header = 'Überschrift für das Element Partner mit Rahmen',
	subheader = 'Aptent taciti sociosqu',
	bodytext = '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>',
	assets = 3,
	frame_class = 'ctype-nessa_partner__bordered'
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_1, @example_ce, 'tt_content', 'assets', ''),
	(@page, @file_image_2, @example_ce, 'tt_content', 'assets', ''),
	(@page, @file_image_3, @example_ce, 'tt_content', 'assets', '')
;

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'nessa_partner',
	header = 'Headline of CE-Partner with bordered logos',
	bodytext = '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum.</p>',
	assets = 3,
	frame_class = 'ctype-nessa_partner__no-bordered'
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_1, @example_ce, 'tt_content', 'assets', ''),
	(@page, @file_image_2, @example_ce, 'tt_content', 'assets', ''),
	(@page, @file_image_3, @example_ce, 'tt_content', 'assets', '')
;
