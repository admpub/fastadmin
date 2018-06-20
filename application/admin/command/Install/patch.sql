ALTER TABLE `fa_auth_rule`
ADD `py` varchar(100) COLLATE 'utf8_general_ci' NOT NULL DEFAULT '' COMMENT '拼音首字母',
ADD `pinyin` varchar(255) COLLATE 'utf8_general_ci' NOT NULL DEFAULT '' COMMENT '完整的拼音' AFTER `py`;