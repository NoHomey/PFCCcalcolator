CREATE TABLE IF NOT EXISTS `login`.`files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing file_id of each file, unique index',
  `file_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'file''s name, unique',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  PRIMARY KEY (`file_id`),
  UNIQUE KEY `file_name` (`file_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='file data'	
