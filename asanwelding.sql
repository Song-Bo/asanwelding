/* TABLE = 11 개 */

/* DataBase 생성 */
create database asan_db;

/* 회원가입 */
CREATE TABLE IF NOT EXISTS `member` (
  `id` varchar(15) NOT NULL,
  `pass` char(15) NOT NULL,
  `name` varchar(10) NOT NULL,
  `birth` char(15) NOT NULL,
  `phone` char(20) NOT NULL,
  `email` char(80) DEFAULT NULL,
  `regist_day` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into member values ('admin', '1234', '관리자', '861021-1', '010-9048-9903', 'maxonizuka@naver.com', now());

/* 자유게시판 */
create table free (
	num int not null auto_increment,
	id char(15), 
  pass char(15),
	name char(15) not null, 
	/*nick char(10) not null,*/
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

insert into free (id, name, subject, content, regist_day, hit) values ('admin', '관리자', '테스트', '테스트입니다.', now(), 0);

/* 자유게시판 댓글 */
create table free_ripple (
	num int not null auto_increment,
	parent int not null,
	id char(15) not null, 
	name char(15) not null, 
	/*nick char(10) not null,*/
	content text not null,
	regist_day char(20),
	primary key(num)
);


/* 취업소식 */
create table job (
	num int not null auto_increment,
	id char(15) not null, 
	name char(15) not null, 
	/*nick char(10) not null,*/
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
	id char(15) not null, 
	name char(15) not null, 
	/*nick char(10) not null,*/
	content text not null,
	regist_day char(20),
	primary key(num)
);



/* 자료실 */
create table download (
   num int not null auto_increment,
   id char(15) not null,
   name  char(10) not null,
   /*nick  char(10) not null,*/
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

/* 다운로드 댓글 */
create table download_ripple (
	num int not null auto_increment,
	parent int not null,
	id char(15) not null, 
	name char(15) not null, 
	/*nick char(10) not null,*/
	content text not null,
	regist_day char(20),
	primary key(num)
);

/* Q & A - group_num not null 이었고 id 와 pass notnull 아닌거 주의 */ 
create table qna (
   num int not null auto_increment,
   group_num int,
   depth int not null,
   ord int not null,
   id char(15),
   name  char(15) not null,
   pass char(15),   
   /*nick  char(10) not null,*/
   subject char(100) not null,
   content text not null,
   regist_day char(20),
   hit int,
   /*is_html char(1),*/
   primary key(num)
);

/* qna_ripple */
create table qna_ripple (
	num int not null auto_increment,
	parent int not null,
	id char(15) not null, 
	name char(15) not null, 
	/*nick char(10) not null,*/
	content text not null,
	regist_day char(20),
	primary key(num)
);




/*갤러리*/

CREATE TABLE IF NOT EXISTS `gallery` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(16) NOT NULL,*/
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
	/*`nick` CHAR(10) NOT NULL,*/
	`content` TEXT NOT NULL,
	`regist_day` CHAR(20) NULL DEFAULT NULL,
	PRIMARY KEY (`num`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;




/* 공지 사항 */
CREATE TABLE IF NOT EXISTS `notice` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  /*`nick` char(10) NOT NULL, */
  `subject` char(100) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `file_name_0` char(40) DEFAULT NULL,
  `file_name_1` char(40) DEFAULT NULL,
  `file_name_2` char(40) DEFAULT NULL,
  `file_name_3` char(40) DEFAULT NULL,
  `file_name_4` char(40) DEFAULT NULL,
  `file_copied_0` char(30) DEFAULT NULL,
  `file_copied_1` char(30) DEFAULT NULL,
  `file_copied_2` char(30) DEFAULT NULL,
  `file_copied_3` char(30) DEFAULT NULL,
  `file_copied_4` char(30) DEFAULT NULL,
  `file_type_0` char(30) DEFAULT NULL,
  `file_type_1` char(30) DEFAULT NULL,
  `file_type_2` char(30) DEFAULT NULL,
  `file_type_3` char(30) DEFAULT NULL,
  `file_type_4` char(30) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;




/* 공지 사항 리플 */
CREATE TABLE IF NOT EXISTS `notice_ripple` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  /*`nick` char(10) NOT NULL,*/
  `content` text NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;