-- noinspection SqlNoDataSourceInspectionForFile


##
# The CE-Download is created after the CE-CTA, so is it necessary to set the CTA-Link
# at Post-Update.
##
SET @download_page = (SELECT uid FROM pages WHERE title = 'CE-Download' AND sys_language_uid = 0);

UPDATE tt_content
	SET tx_starter_ctalink = CONCAT('t3://page?uid=', @download_page)
WHERE
	CType = 'nessa_cta'
;
