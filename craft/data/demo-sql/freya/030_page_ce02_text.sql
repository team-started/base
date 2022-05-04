-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE-Text
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	title = 'CE02-Text',
	slug = CONCAT(@slug_example_ce_de, '/ce02'),
	seo_title = 'Beispielhafte Inhalte mit den Inhaltselement Text'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce02'),

	title = 'CE02-Text',
	seo_title = 'Examples of content element Text'
;



###
# Example content 1
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'text',
	header = 'Überschrift für den nachfolgenden Textabschnitt',
	subheader = '',
	header_layout = 2,
	bodytext = '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum. Curabitur vestibulum aliquam leo.</p>\r\n<p>Praesent nec nisl a purus blandit viverra. Etiam feugiat lorem non metus. In turpis. Curabitur suscipit suscipit tellus. Phasellus dolor.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. In hac habitasse platea dictumst. Ut tincidunt tincidunt erat. Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum.</p>',
	tx_starter_ctalink = '',
	tx_starter_ctalink_text = ''
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'text',
	header = 'Headline for the following text section',
	subheader = '',
	header_layout = 2,
	bodytext = '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum. Curabitur vestibulum aliquam leo.</p>\r\n<p>Praesent nec nisl a purus blandit viverra. Etiam feugiat lorem non metus. In turpis. Curabitur suscipit suscipit tellus. Phasellus dolor.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. In hac habitasse platea dictumst. Ut tincidunt tincidunt erat. Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum.</p>',
	tx_starter_ctalink = '',
	tx_starter_ctalink_text = ''
;



###
# Example content 2
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'text',
	header = 'Überschrift in Level 3',
	subheader = 'Untergeordnete Überschrift',
	header_layout = 3,
	bodytext = '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum. Curabitur vestibulum aliquam leo.</p>\r\n<p>Praesent nec nisl a purus blandit viverra. Etiam feugiat lorem non metus. In turpis. Curabitur suscipit suscipit tellus. Phasellus dolor.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. In hac habitasse platea dictumst. Ut tincidunt tincidunt erat. Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum.</p>',
  space_before_class = 'mt-3',
  space_after_class = 'mb-3',
	tx_starter_ctalink = '',
	tx_starter_ctalink_text = ''
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'text',
	header = 'Main heading in level 3',
	subheader = 'Subheading',
	header_layout = 3,
	bodytext = '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum. Curabitur vestibulum aliquam leo.</p>\r\n<p>Praesent nec nisl a purus blandit viverra. Etiam feugiat lorem non metus. In turpis. Curabitur suscipit suscipit tellus. Phasellus dolor.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. In hac habitasse platea dictumst. Ut tincidunt tincidunt erat. Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum.</p>',
	space_before_class = 'mt-3',
  space_after_class = 'mb-3',
	tx_starter_ctalink = '',
	tx_starter_ctalink_text = ''
;



###
# Example content 3
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'text',
	header = 'Hauptüberschrift in Level 2',
	subheader = 'Untergeordnete Überschrift ohne Levelauszeichnung',
	header_layout = 2,
	bodytext = '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum. Curabitur vestibulum aliquam leo.</p>\r\n<p>Praesent nec nisl a purus blandit viverra. Etiam feugiat lorem non metus. In turpis. Curabitur suscipit suscipit tellus. Phasellus dolor.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. In hac habitasse platea dictumst. Ut tincidunt tincidunt erat. Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum.</p>',
	tx_starter_ctalink = '',
	tx_starter_ctalink_text = ''
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'text',
	header = 'Main heading in level 2',
	subheader = 'Subheading without level markup',
	header_layout = 2,
	bodytext = '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum. Curabitur vestibulum aliquam leo.</p>\r\n<p>Praesent nec nisl a purus blandit viverra. Etiam feugiat lorem non metus. In turpis. Curabitur suscipit suscipit tellus. Phasellus dolor.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. In hac habitasse platea dictumst. Ut tincidunt tincidunt erat. Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum.</p>',
	tx_starter_ctalink = '',
	tx_starter_ctalink_text = ''
;



###
# Example content 4
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'text',
	header = 'Ut tincidunt tincidunt erat',
	subheader = '',
	header_layout = 2,
	bodytext = '<p>Pellentesque habitant <strong>morbi tristique senectus</strong> et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque <em>dapibus hendrerit tortor</em>.</p>\r\n<ul> 	<li>Aenean vulputate eleifend tellus</li> 	<li>Nam commodo suscipit quam</li> 	<li>Nulla facilisi</li> 	<li>Fusce ac felis sit amet ligula pharetra condimentum</li> </ul>\r\n<p>Praesent nec nisl a purus blandit viverra. Etiam feugiat lorem non metus. In turpis. Curabitur suscipit suscipit tellus. Phasellus dolor.</p>\r\n<ol> 	<li>Donec vitae orci sed dolor rutrum auctor</li> 	<li>In hac habitasse platea dictumst</li> 	<li>Ut tincidunt tincidunt erat</li> 	<li>Donec vitae orci sed dolor rutrum auctor.</li> </ol>\r\n<p class=\"text-center\">Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum.</p>',
	tx_starter_ctalink = 'https://google.com/?q=typo3 - - \"Mit Google nach TYPO3 suchen\"',
	tx_starter_ctalink_text = 'Suchergebnisse auf Google nach TYPO3'
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'text',
	header = 'Ut tincidunt tincidunt erat',
	subheader = '',
	header_layout = 2,
	bodytext = '<p>Pellentesque habitant <strong>morbi tristique senectus</strong> et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque <em>dapibus hendrerit tortor</em>.</p>\r\n<ul> 	<li>Aenean vulputate eleifend tellus</li> 	<li>Nam commodo suscipit quam</li> 	<li>Nulla facilisi</li> 	<li>Fusce ac felis sit amet ligula pharetra condimentum</li> </ul>\r\n<p>Praesent nec nisl a purus blandit viverra. Etiam feugiat lorem non metus. In turpis. Curabitur suscipit suscipit tellus. Phasellus dolor.</p>\r\n<ol> 	<li>Donec vitae orci sed dolor rutrum auctor</li> 	<li>In hac habitasse platea dictumst</li> 	<li>Ut tincidunt tincidunt erat</li> 	<li>Donec vitae orci sed dolor rutrum auctor.</li> </ol>\r\n<p class=\"text-center\">Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum.</p>',
	tx_starter_ctalink = 'https://google.com/?q=typo3 - - \"Search with Google for TYPO3\"',
	tx_starter_ctalink_text = 'Search results on Google for TYPO3'
;



###
# Example content 5
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'text',
	header = '',
	subheader = '',
	header_layout = 2,
	bodytext = '<p><strong>Dieser Textabschnitt hat keine Überschrift im Modul!</strong></p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum. Curabitur vestibulum aliquam leo.</p>\r\n<p>Praesent nec nisl a purus blandit viverra. Etiam feugiat lorem non metus. In turpis. Curabitur suscipit suscipit tellus. Phasellus dolor.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. In hac habitasse platea dictumst. Ut tincidunt tincidunt erat. Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum.</p>',
	tx_starter_ctalink = '',
	tx_starter_ctalink_text = ''
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'text',
	header = '',
	subheader = '',
	header_layout = 2,
	bodytext = '<p><strong>This text section has no module headline!</strong></p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>\r\n<p>Aenean vulputate eleifend tellus. Nam commodo suscipit quam. Nulla facilisi. Fusce ac felis sit amet ligula pharetra condimentum. Curabitur vestibulum aliquam leo.</p>\r\n<p>Praesent nec nisl a purus blandit viverra. Etiam feugiat lorem non metus. In turpis. Curabitur suscipit suscipit tellus. Phasellus dolor.</p>\r\n<p>Donec vitae orci sed dolor rutrum auctor. In hac habitasse platea dictumst. Ut tincidunt tincidunt erat. Donec vitae orci sed dolor rutrum auctor. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum.</p>',
	tx_starter_ctalink = '',
	tx_starter_ctalink_text = ''
;
