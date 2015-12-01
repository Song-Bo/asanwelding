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
