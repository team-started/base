-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE-Hero
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_de, '/ce-hero'),
	backend_layout = 'pagets__HeroLayout',

	title = 'CE-Hero',
	seo_title = 'Beispielhafte Inhalte mit den Inhaltselement Hero'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce-hero'),
	backend_layout = 'pagets__HeroLayout',

	title = 'CE-Hero',
	seo_title = 'Examples of content with element Hero'
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
	colPos = 1,
	CType = 'nessa_hero',
	header = 'Beispiel CE-Hero',
	nessa_hero_element = 2
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tx_starternessa_hero_element` SET
	pid = @page,
	sorting = 1,
	tt_content_record = @example_ce,
	header = 'Suspendisse eu ligula',
	assets = 1,
	bodytext = 'Sed hendrerit. Sed hendrerit. Praesent egestas tristique nibh. Nulla porta dolor. Morbi vestibulum volutpat enim. Nullam dictum felis eu pede mollis pretium. Fusce neque. Nulla porta dolor.',
	ctalink = 't3://page?uid=20',
	ctalink_text = 'Etiam ultricies nisi'
;
SET @example_hero_element_1 = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_1, @example_hero_element_1, 'tx_starternessa_hero_element', 'assets', '')
;

INSERT INTO `tx_starternessa_hero_element` SET
	pid = @page,
	sorting = 1,
	tt_content_record = @example_ce,
	header = 'Maecenas nec odio',
	assets = 1,
	bodytext = 'Donec vitae sapien ut libero venenatis faucibus. In hac habitasse platea dictumst. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.'
;
SET @example_hero_element_2 = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_2, @example_hero_element_2, 'tx_starternessa_hero_element', 'assets', '')
;

INSERT INTO `tx_starternessa_hero_element` SET
	pid = @page,
	sorting = 3,
	tt_content_record = @example_ce,
	header = 'Nullam quis ante',
	assets = 1
;
SET @example_hero_element_3 = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_3, @example_hero_element_3, 'tx_starternessa_hero_element', 'assets', '')
;


INSERT INTO `tt_content` SET
	pid = @page,
	colPos = 1,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'nessa_hero',
	header = 'Example CE-Hero',
	media = 5
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tx_starternessa_hero_element` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @example_hero_element_1,
	sorting = 1,
	tt_content_record = @example_ce,
	header = 'Suspendisse eu ligula',
	assets = 1,
	bodytext = 'Sed hendrerit. Sed hendrerit. Praesent egestas tristique nibh. Nulla porta dolor. Morbi vestibulum volutpat enim. Nullam dictum felis eu pede mollis pretium. Fusce neque. Nulla porta dolor.',
	ctalink = 't3://page?uid=20',
	ctalink_text = 'Etiam ultricies nisi'
;
SET @example_hero_element = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_1, @example_hero_element, 'tx_starternessa_hero_element', 'assets', '')
;

INSERT INTO `tx_starternessa_hero_element` SET
	pid = @page,
	sys_language_uid = @language_en,
  l10n_parent = @example_hero_element_2,
	sorting = 2,
	tt_content_record = @example_ce,
	header = 'Maecenas nec odio',
	assets = 1,
	bodytext = 'Donec vitae sapien ut libero venenatis faucibus. In hac habitasse platea dictumst. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.'
;
SET @example_hero_element = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_2, @example_hero_element, 'tx_starternessa_hero_element', 'assets', '')
;

INSERT INTO `tx_starternessa_hero_element` SET
	pid = @page,
	sys_language_uid = @language_en,
  l10n_parent = @example_hero_element_3,
	sorting = 3,
	tt_content_record = @example_ce,
	header = 'Maecenas nec odio',
	assets = 1
;
SET @example_hero_element = LAST_INSERT_ID();

INSERT INTO `sys_file_reference` (`pid`, `uid_local`, `uid_foreign`, `tablenames`, `fieldname`, `crop`)
VALUES
	(@page, @file_image_3, @example_hero_element, 'tx_starternessa_hero_element', 'assets', '')
;
