-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE-Team
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	title = 'CE-Team',
	slug = CONCAT(@slug_example_ce_de, '/ce-team'),
	seo_title = 'Beispielhafte Inhalte mit den Inhaltselement Team'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce-team'),

	title = 'CE-Team',
	seo_title = 'Examples of content with element Team'
;

##
# get image files
##
SET @file_image_1 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/people/diana-villarreal-HidnqIKfw-Q-unsplash.jpg" LIMIT 1);
SET @file_image_2 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/people/karsten-winegeart-GouocbGBe30-unsplash.jpg" LIMIT 1);
SET @file_image_3 = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/people/sasha-matveeva-xnS3upQYaOk-unsplash.jpg" LIMIT 1);


###
# Example content 1
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'nessa_team',
	header = 'Überschrift für das Element Team',
	subheader = 'Ut enim ad minim veniam',
	bodytext = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
	nessa_team_member_element = 3
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'nessa_team',
	header = 'Headline of CE-Team',
	subheader = 'Ut enim ad minim veniam',
	bodytext = '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum.</p>',
	nessa_team_member_element = 3
;
SET @example_ce_translate = LAST_INSERT_ID();

INSERT INTO `tx_starternessa_team_element` SET
	pid = @page,
	sorting = 1,
	tt_content_record = @example_ce,
	realname = 'Diana Villarreal',
	company_position = 'Example CEO',
	email = 'example@mail.com',
	assets = 1
;
SET @example_record = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_1, @example_record, 'tx_starternessa_team_element', 'assets', '{\"default\":{\"cropArea\":{\"height\":1,\"width\":0.667,\"x\":0.243,\"y\":0},\"selectedRatio\":\"1:1\",\"focusArea\":null}}')
;
SET @example_sfr = LAST_INSERT_ID();

INSERT INTO `tx_starternessa_team_element` SET
	pid = @page,
	sorting = 1,
	tt_content_record = @example_ce_translate,
	sys_language_uid = @language_en,
	l10n_parent = @example_record,
	t3_origuid = @example_record,
	realname = 'Diana Villarreal',
	company_position = 'Example CEO',
	email = 'example@mail.com',
	assets = 1
;
SET @example_record_translate = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `sys_language_uid`, `l10n_parent`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @language_en, @example_sfr, @file_image_1, @example_record_translate, 'tx_starternessa_team_element', 'assets', '{\"default\":{\"cropArea\":{\"height\":1,\"width\":0.667,\"x\":0.243,\"y\":0},\"selectedRatio\":\"1:1\",\"focusArea\":null}}')
;


INSERT INTO `tx_starternessa_team_element` SET
	pid = @page,
	sorting = 514,
	tt_content_record = @example_ce,
	realname = 'Karsten Winegeart',
	company_position = 'Example CEO',
	email = 'example@mail.com',
	assets = 1
;
SET @example_record = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_2, @example_record, 'tx_starternessa_team_element', 'assets', '{\"default\":{\"cropArea\":{\"height\":0.667,\"width\":0.9985029940119761,\"x\":0.0014970059880239522,\"y\":0.277},\"selectedRatio\":\"1:1\",\"focusArea\":null}}')
;
SET @example_sfr = LAST_INSERT_ID();

INSERT INTO `tx_starternessa_team_element` SET
	pid = @page,
	sorting = 1,
	tt_content_record = @example_ce_translate,
	sys_language_uid = @language_en,
	l10n_parent = @example_record,
	t3_origuid = @example_record,
	realname = 'Karsten Winegeart',
	company_position = 'Example CEO',
	email = 'example@mail.com',
	assets = 1
;
SET @example_record_translate = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `sys_language_uid`, `l10n_parent`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @language_en, @example_sfr, @file_image_2, @example_record_translate, 'tx_starternessa_team_element', 'assets', '{\"default\":{\"cropArea\":{\"height\":0.537,\"width\":0.8038922155688623,\"x\":0.11976047904191617,\"y\":0.309},\"selectedRatio\":\"1:1\",\"focusArea\":null}}')
;


INSERT INTO `tx_starternessa_team_element` SET
	pid = @page,
	sorting = 515,
	tt_content_record = @example_ce,
	realname = 'Sasha Matveeva',
	company_position = 'Example CEO',
	email = 'example@mail.com',
	assets = 1
;
SET @example_record = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_3, @example_record, 'tx_starternessa_team_element', 'assets', '{\"default\":{\"cropArea\":{\"height\":0.7797619047619048,\"width\":0.524,\"x\":0.256,\"y\":0.12797619047619047},\"selectedRatio\":\"1:1\",\"focusArea\":null}}')
;
SET @example_sfr = LAST_INSERT_ID();

INSERT INTO `tx_starternessa_team_element` SET
	pid = @page,
	sorting = 1,
	tt_content_record = @example_ce_translate,
	sys_language_uid = @language_en,
	l10n_parent = @example_record,
	t3_origuid = @example_record,
	realname = 'Sasha Matveeva',
	company_position = 'Example CEO',
	email = 'example@mail.com',
	assets = 1
;
SET @example_record_translate = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `sys_language_uid`, `l10n_parent`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @language_en, @example_sfr, @file_image_3, @example_record_translate, 'tx_starternessa_team_element', 'assets', '{\"default\":{\"cropArea\":{\"height\":1,\"width\":0.667,\"x\":0.243,\"y\":0},\"selectedRatio\":\"1:1\",\"focusArea\":null}}')
;
