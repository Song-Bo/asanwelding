/* DataBase 생성 */
create database asan_db;

/* 자유게시판 */
create table free (
	num int not null auto_increment,
	/*id char(15) not null, */
	/*name char(15) not null, */
	nick char(10) not null,
	subject char(100) not null,
	content text not null,
	regist_day char(20),
	hit int,
	/*is_html char(1),*/
	file_name_0 char(40),
	file_name_1 char(40),
	file_name_2 char(40),
	file_name_3 char(40),
	file_name_4 char(40),
	file_copied_0 char(30),
	file_copied_1 char(30),
	file_copied_2 char(30),
	file_copied_3 char(30),
	file_copied_4 char(30),
	primary key(num)
);

/* 자유게시판 댓글 */
create table free_ripple (
	num int not null auto_increment,
	parent int not null,
	/*id char(15) not null, */
	/*name char(15) not null, */
	nick char(10) not null,
	content text not null,
	regist_day char(20),
	primary key(num)
);


/* 취업소식 */
create table job (
	num int not null auto_increment,
	/*id char(15) not null, */
	/*name char(15) not null, */
	nick char(10) not null,
	subject char(100) not null,
	content text not null,
	regist_day char(20),
	hit int,
	/*is_html char(1),*/
	file_name_0 char(40),
	file_name_1 char(40),
	file_name_2 char(40),
	file_name_3 char(40),
	file_name_4 char(40),
	file_copied_0 char(30),
	file_copied_1 char(30),
	file_copied_2 char(30),
	file_copied_3 char(30),
	file_copied_4 char(30),
	primary key(num)
);


/* 취업소식 댓글 */
create table job_ripple (
	num int not null auto_increment,
	parent int not null,
	/*id char(15) not null, */
	/*name char(15) not null, */
	nick char(10) not null,
	content text not null,
	regist_day char(20),
	primary key(num)
);



/* 자료실 */
create table download (
   num int not null auto_increment,
   /*id char(15) not null,
   name  char(10) not null,*/
   nick  char(10) not null,
   subject char(100) not null,
   content text not null,
   regist_day char(20),
   hit int,
   file_name_0 char(40),
   file_name_1 char(40),
   file_name_2 char(40),
   file_name_3 char(40),
   file_name_4 char(40),
   file_copied_0 char(30),
   file_copied_1 char(30),
   file_copied_2 char(30),
   file_copied_3 char(30),
   file_copied_4 char(30), 
   file_type_0 char(30),
   file_type_1 char(30),
   file_type_2 char(30),
   file_type_3 char(30),
   file_type_4 char(30),
   primary key(num)
);


/* Q & A */

create table qna (
   num int not null auto_increment,
   group_num int not null,
   depth int not null,
   ord int not null,
   -- id char(15) not null,
   -- name  char(10) not null,
   nick  char(10) not null,
   subject char(100) not null,
   content text not null,
   regist_day char(20),
   hit int,
   -- is_html char(1),
   primary key(num)
);




/*갤러리*/

CREATE TABLE IF NOT EXISTS `gallery` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `nick` char(16) NOT NULL,
  `subject` char(100) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `file_name_0` char(40) DEFAULT NULL,
  `file_name_1` char(40) DEFAULT NULL,
  `file_name_2` char(40) DEFAULT NULL,
  `file_copied_0` char(30) DEFAULT NULL,
  `file_copied_1` char(30) DEFAULT NULL,
  `file_copied_2` char(30) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* 갤러리 리플 */
CREATE TABLE `gallery_ripple` (
	`num` INT(11) NOT NULL AUTO_INCREMENT,
	`parent` INT(11) NOT NULL,
	`nick` CHAR(10) NOT NULL,
	`content` TEXT NOT NULL,
	`regist_day` CHAR(20) NULL DEFAULT NULL,
	PRIMARY KEY (`num`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

