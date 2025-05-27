-- noinspection SqlNoDataSourceInspectionForFile

###
# Example page of CE-Portfolio
###
INSERT INTO `pages` SET
	pid = @sitemap_level_1,
	doktype = 1,
	title = 'CE-Portfolio',
	slug = CONCAT(@slug_example_ce_de, '/ce-portfolio'),
	seo_title = 'Beispielhafte Inhalte mit den Inhaltselement Portfolio'
;
SET @page = LAST_INSERT_ID();

INSERT INTO `pages` SET
	pid = @page,
	sys_language_uid = @language_en,
	l10n_parent = @page,
	l10n_source = @page,
	doktype = 1,
	slug = CONCAT(@slug_example_ce_en, '/ce-portfolio'),

	title = 'CE-Portfolio',
	seo_title = 'Examples of content with element Portfolio'
;

##
# get sample categories
##
SET @category_1 = (SELECT uid FROM sys_category WHERE title = "Beispiel A" LIMIT 1);
SET @category_2 = (SELECT uid FROM sys_category WHERE title = "Beispiel B" LIMIT 1);

##
# Add categories on example assets
##
SET @file_image = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/cole-freeman-NHXy97995Sg-unsplash.jpg" LIMIT 1);

INSERT INTO sys_category_record_mm SET
	uid_local = @category_1,
	uid_foreign = @file_image,
	sorting = 0,
	sorting_foreign = 1,
	tablenames = 'sys_file_metadata',
	fieldname = 'categories'
;

SET @file_image = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/daniel-santiago-46OsJaeD1F0-unsplash.jpg" LIMIT 1);

INSERT INTO sys_category_record_mm SET
	uid_local = @category_1,
	uid_foreign = @file_image,
	sorting = 0,
	sorting_foreign = 1,
	tablenames = 'sys_file_metadata',
	fieldname = 'categories'
;

SET @file_image = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/eugene-chystiakov-TCQmflzrZRQ-unsplash.jpg" LIMIT 1);

INSERT INTO sys_category_record_mm SET
	uid_local = @category_1,
	uid_foreign = @file_image,
	sorting = 0,
	sorting_foreign = 1,
	tablenames = 'sys_file_metadata',
	fieldname = 'categories'
;

SET @file_image = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/coffee/nathan-dumlao-l59fmhtprIE-unsplash.jpg" LIMIT 1);

INSERT INTO sys_category_record_mm SET
	uid_local = @category_2,
	uid_foreign = @file_image,
	sorting = 0,
	sorting_foreign = 1,
	tablenames = 'sys_file_metadata',
	fieldname = 'categories'
;

SET @file_image = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/coffee/pariwat-pannium-WLk7wdUpKXc-unsplash.jpg" LIMIT 1);

INSERT INTO sys_category_record_mm SET
	uid_local = @category_2,
	uid_foreign = @file_image,
	sorting = 0,
	sorting_foreign = 1,
	tablenames = 'sys_file_metadata',
	fieldname = 'categories'
;

SET @file_image = (SELECT uid FROM sys_file WHERE identifier LIKE "/user_upload/_default/images/coffee/tabitha-turner-3n3mPoGko8g-unsplash.jpg" LIMIT 1);

INSERT INTO sys_category_record_mm SET
	uid_local = @category_2,
	uid_foreign = @file_image,
	sorting = 0,
	sorting_foreign = 1,
	tablenames = 'sys_file_metadata',
	fieldname = 'categories'
;


###
# Example content 1
###
INSERT INTO `tt_content` SET
	pid = @page,
	CType = 'nessa_portfolio',
	header = 'Überschrift für das Element Portfolio',
	subheader = 'Aptent taciti sociosqu',
	bodytext = '<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>',
	selected_categories = CONCAT(@category_1, ',', @category_2)
;
SET @example_ce = LAST_INSERT_ID();

INSERT INTO `tt_content` SET
	pid = @page,
	t3_origuid = @example_ce,
	l18n_parent = @example_ce,
	l10n_source = @example_ce,
	sys_language_uid = @language_en,
	CType = 'nessa_portfolio',
	header = 'Headline of CE-Portfolio',
	bodytext = '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec venenatis vulputate lorem. Sed fringilla mauris sit amet nibh. Pellentesque dapibus hendrerit tortor.</p>',
	selected_categories = CONCAT(@category_1, ',', @category_2)
;
