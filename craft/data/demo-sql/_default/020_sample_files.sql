-- noinspection SqlNoDataSourceInspectionForFile

INSERT INTO `sys_file` (`uid`, `tstamp`, `storage`, `type`, `identifier`, `identifier_hash`, `folder_hash`, `extension`, `mime_type`, `name`, `sha1`, `size`, `creation_date`, `modification_date`)
VALUES
	(1, 1645446125, 1, '2', '/user_upload/_default/images/cole-freeman-NHXy97995Sg-unsplash.jpg', '6b8a271071921ec7011482273cdca251aaab8d1f', '480f9128d514071ced0c62bf01be7e789c618893', 'jpg', 'image/jpeg', 'cole-freeman-NHXy97995Sg-unsplash.jpg', 'dca3e252e0a763ad2490fb2df0e596580b179e31', 2832700, 1645446125, 1645436845),
	(2, 1645446125, 1, '2', '/user_upload/_default/images/daniel-santiago-46OsJaeD1F0-unsplash.jpg', '99d54d57239eb835ee2c01cd876cc153ae48fe0b', '480f9128d514071ced0c62bf01be7e789c618893', 'jpg', 'image/jpeg', 'daniel-santiago-46OsJaeD1F0-unsplash.jpg', '94b605ded2b8ac60e06035501741433179ad0ebf', 745428, 1645446125, 1645436845),
	(3, 1645446125, 1, '2', '/user_upload/_default/images/eugene-chystiakov-TCQmflzrZRQ-unsplash.jpg', 'b8ea223ceb80ea7a7e14e2e6444a1f745bc173ab', '480f9128d514071ced0c62bf01be7e789c618893', 'jpg', 'image/jpeg', 'eugene-chystiakov-TCQmflzrZRQ-unsplash.jpg', 'd51c577ade7f78ecef0c18dc0655f6fc5ca4e146', 1171362, 1645446125, 1645436845),
	(4, 1645446125, 1, '2', '/user_upload/_default/images/ruta-gudeliene-MkPt_FzqSkI-unsplash.jpg', 'b447331f905140b34613b82e48cb7fbae82f1e8e', '480f9128d514071ced0c62bf01be7e789c618893', 'jpg', 'image/jpeg', 'ruta-gudeliene-MkPt_FzqSkI-unsplash.jpg', '377cf7548339553e4101eb9461c92ddc7017b116', 5467496, 1645446125, 1645436846);

INSERT INTO `sys_file_metadata` (`uid`, `pid`, `file`, `sys_language_uid`, `l10n_parent`, `title`, `description`, `alternative`, `tstamp`, `crdate`, `width`, `height`)
VALUES
	(1, 0, 1, 0, 0, NULL, 'Ein gesunder Nadelwald in dichtem Nebel.', 'Nadelwald im Nebel', 1645446736, 1645436840, 6000, 4000),
	(2, 0, 2, 0, 0, NULL, 'Ein entlaubter Baum beim Winter-Sonnenuntergang', 'Entlaubter Baum im Winter', 1645446856, 1645436840, 4128, 2752),
	(3, 0, 3, 0, 0, NULL, 'Eine Aufnahme der Meeresoberfläche mit den Umrissen eines Tieres unter Wasser', 'Meerwasser mit Tierumgrisse', 1645446971, 1645436840, 2624, 3936),
	(4, 0, 4, 0, 0, NULL, 'Ein Spaziergänger macht einen ausführlichen Spaziergang im verschneiten Wald', 'Spaziergang im Winterwald', 1645447062, 1645436840, 6000, 4000);
