#
# TABLE STRUCTURE FOR: Category
#

Drop database `gif`;

CREATE Database if not exists `gif`;
use `gif`;

DROP TABLE IF EXISTS `Category`;

CREATE TABLE `Category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `Category` (`category_id`, `category_name`) VALUES (1, 'Liked');
INSERT INTO `Category` (`category_id`, `category_name`) VALUES (2, 'Anime');
INSERT INTO `Category` (`category_id`, `category_name`) VALUES (3, 'Animals');
INSERT INTO `Category` (`category_id`, `category_name`) VALUES (4, 'Dance');
INSERT INTO `Category` (`category_id`, `category_name`) VALUES (5, 'Angry');
INSERT INTO `Category` (`category_id`, `category_name`) VALUES (6, 'Smile');



#
# TABLE STRUCTURE FOR: Tag
#

DROP TABLE IF EXISTS `Tag`;

CREATE TABLE `Tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `Tag` (`tag_id`, `tag_name`) VALUES (1, 'cat');
INSERT INTO `Tag` (`tag_id`, `tag_name`) VALUES (2, 'smile');
INSERT INTO `Tag` (`tag_id`, `tag_name`) VALUES (3, 'panda');
INSERT INTO `Tag` (`tag_id`, `tag_name`) VALUES (4, 'love');
INSERT INTO `Tag` (`tag_id`, `tag_name`) VALUES (5, 'hello');


#
# TABLE STRUCTURE FOR: User  
#

DROP TABLE IF EXISTS `User`;

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_createdate` date DEFAULT NULL,
  `user_editdate` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `User` (`user_id`, `user_name`, `user_email`, `user_password`, `user_createdate`, `user_editdate`) VALUES (1, 'Eduardo', 'keanu51@hotmail.com', 'Cum quo sit.', '1972-03-20', '1993-04-09');
INSERT INTO `User` (`user_id`, `user_name`, `user_email`, `user_password`, `user_createdate`, `user_editdate`) VALUES (2, 'Katelin', 'marion.bosco@yahoo.com', 'Architecto nam.', '2005-04-29', '1970-01-13');
INSERT INTO `User` (`user_id`, `user_name`, `user_email`, `user_password`, `user_createdate`, `user_editdate`) VALUES (3, 'Ezequiel', 'kwiegand@yahoo.com', 'Eligendi nisi.', '2007-11-05', '2020-07-10');
INSERT INTO `User` (`user_id`, `user_name`, `user_email`, `user_password`, `user_createdate`, `user_editdate`) VALUES (4, 'Jaylan', 'audie67@yahoo.com', 'Est similique.', '1981-01-17', '1983-12-09');
INSERT INTO `User` (`user_id`, `user_name`, `user_email`, `user_password`, `user_createdate`, `user_editdate`) VALUES (5, 'Lisandro', 'dschroeder@hotmail.com', 'Enim et est ut.', '2021-10-24', '1996-01-16');





#
# TABLE STRUCTURE FOR: Gif
#

DROP TABLE IF EXISTS `Gif`;

CREATE TABLE `Gif` (
  `gif_id` int(11) NOT NULL AUTO_INCREMENT,
  `gif_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gif_date` date DEFAULT NULL,
  `gif_size` int(11) DEFAULT NULL,
  `gif_like` int(11) DEFAULT NULL,
  `gif_view` int(11) DEFAULT NULL,
  `gif_download` int(11) DEFAULT NULL,
  `gif_dateDelete` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`gif_id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `Gif_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Category` (`category_id`),
  CONSTRAINT `Gif_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `Gif` (`gif_id`, `gif_name`, `gif_date`, `gif_size`, `gif_like`, `gif_view`, `gif_download`, `gif_dateDelete`, `category_id`, `user_id`) VALUES (1, 'Gage', '2013-10-11', 8361, 4, 39, 57, '2014-09-19', 1, 1);
INSERT INTO `Gif` (`gif_id`, `gif_name`, `gif_date`, `gif_size`, `gif_like`, `gif_view`, `gif_download`, `gif_dateDelete`, `category_id`, `user_id`) VALUES (2, 'Garry', '1974-05-30', 3862, 93, 19, 81, '2009-08-17', 2, 2);
INSERT INTO `Gif` (`gif_id`, `gif_name`, `gif_date`, `gif_size`, `gif_like`, `gif_view`, `gif_download`, `gif_dateDelete`, `category_id`, `user_id`) VALUES (3, 'Ulises', '2011-06-04', 3156, 50, 0, 75, '1991-02-09', 3, 3);
INSERT INTO `Gif` (`gif_id`, `gif_name`, `gif_date`, `gif_size`, `gif_like`, `gif_view`, `gif_download`, `gif_dateDelete`, `category_id`, `user_id`) VALUES (4, 'Sigrid', '1985-11-04', 3126, 26, 88, 9, '2008-01-31', 4, 4);
INSERT INTO `Gif` (`gif_id`, `gif_name`, `gif_date`, `gif_size`, `gif_like`, `gif_view`, `gif_download`, `gif_dateDelete`, `category_id`, `user_id`) VALUES (5, 'Josue', '1991-02-13', 700, 39, 56, 77, '1973-12-20', 5, 5);
INSERT INTO `Gif` (`gif_id`, `gif_name`, `gif_date`, `gif_size`, `gif_like`, `gif_view`, `gif_download`, `gif_dateDelete`, `category_id`, `user_id`) VALUES (6, 'Alex', '1992-04-11', 5800, 68, 86, 61, '2006-01-01', 6, 1);
INSERT INTO `Gif` (`gif_id`, `gif_name`, `gif_date`, `gif_size`, `gif_like`, `gif_view`, `gif_download`, `gif_dateDelete`, `category_id`, `user_id`) VALUES (7, 'Tyshawn', '2012-12-25', 5259, 37, 71, 46, '1988-06-13', 1, 2);
INSERT INTO `Gif` (`gif_id`, `gif_name`, `gif_date`, `gif_size`, `gif_like`, `gif_view`, `gif_download`, `gif_dateDelete`, `category_id`, `user_id`) VALUES (8, 'Camryn', '1979-04-09', 4534, 61, 1, 69, '1999-10-21', 2, 3);
INSERT INTO `Gif` (`gif_id`, `gif_name`, `gif_date`, `gif_size`, `gif_like`, `gif_view`, `gif_download`, `gif_dateDelete`, `category_id`, `user_id`) VALUES (9, 'Reinhold', '1991-12-06', 6983, 94, 22, 31, '2001-11-09', 3, 4);
INSERT INTO `Gif` (`gif_id`, `gif_name`, `gif_date`, `gif_size`, `gif_like`, `gif_view`, `gif_download`, `gif_dateDelete`, `category_id`, `user_id`) VALUES (10, 'Burley', '2000-06-13', 9383, 56, 79, 71, '1984-06-20', 4, 5);

#
# TABLE STRUCTURE FOR: Get_tag_for_gif
#

DROP TABLE IF EXISTS `Get_tag_for_gif`;

CREATE TABLE `Get_tag_for_gif` (
  `gif_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`gif_id`,`tag_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `Get_tag_for_gif_ibfk_1` FOREIGN KEY (`gif_id`) REFERENCES `Gif` (`gif_id`),
  CONSTRAINT `Get_tag_for_gif_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `Tag` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `Get_tag_for_gif` (`gif_id`, `tag_id`) VALUES (1, 5);
INSERT INTO `Get_tag_for_gif` (`gif_id`, `tag_id`) VALUES (2, 1);
INSERT INTO `Get_tag_for_gif` (`gif_id`, `tag_id`) VALUES (3, 3);
INSERT INTO `Get_tag_for_gif` (`gif_id`, `tag_id`) VALUES (4, 4);
INSERT INTO `Get_tag_for_gif` (`gif_id`, `tag_id`) VALUES (5, 2);
INSERT INTO `Get_tag_for_gif` (`gif_id`, `tag_id`) VALUES (6, 2);
INSERT INTO `Get_tag_for_gif` (`gif_id`, `tag_id`) VALUES (7, 2);
INSERT INTO `Get_tag_for_gif` (`gif_id`, `tag_id`) VALUES (8, 5);
INSERT INTO `Get_tag_for_gif` (`gif_id`, `tag_id`) VALUES (9, 4);
INSERT INTO `Get_tag_for_gif` (`gif_id`, `tag_id`) VALUES (10, 5);