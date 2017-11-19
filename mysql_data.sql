
-- create blog_category tbale
CREATE TABLE `blog_category` (
`category_id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`category_name`  varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL ,
`category_title`  varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL ,
`category_keywords`  varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' ,
`category_description`  varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' ,
`category_order`  varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL ,
`category_views`  varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' ,
`category_pid`  varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL ,
PRIMARY KEY (`category_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci
AUTO_INCREMENT=13
ROW_FORMAT=COMPACT
;



-- create blog_article table
CREATE TABLE `blog_article` (
`art_id`  int(11) NOT NULL AUTO_INCREMENT ,
`art_title`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`art_tag`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`art_description`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`art_thumb`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`art_content`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`art_time`  int(11) NULL DEFAULT 0 ,
`art_editor`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`art_view`  int(11) NULL DEFAULT 0 ,
PRIMARY KEY (`art_id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
CHECKSUM=0
ROW_FORMAT=DYNAMIC
DELAY_KEY_WRITE=0
;
