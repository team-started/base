-- noinspection SqlNoDataSourceInspectionForFile

INSERT INTO `sys_language` (`uid`, `pid`, `tstamp`, `hidden`, `title`, `flag`, `language_isocode`, `sorting`)
VALUES
	(@language_en, 0, 1518849191, 0, 'English', 'en', 'en', 256)
ON DUPLICATE KEY UPDATE
	uid=VALUES(uid),
  pid=VALUES(pid),
  tstamp=VALUES(tstamp),
  hidden=VALUES(hidden),
  title=VALUES(title),
  flag=VALUES(flag),
  language_isocode=VALUES(language_isocode),
  sorting=VALUES(sorting)
;
