create database shop charset = utf8;
grant all privileges on shop.* to 'shop'@'%' identified by '123';

use shop;

create table p_admin(
	admin_id int unsigned not null auto_increment,
	admin_name varchar(32) not null default '' comment '管理员的姓名',
	admin_pass char(32) not null default '' comment '密码，md5加密后的密码',
	role_id int unsigned not null  default 0 comment '所属的角色ID,RBAC',
	last_ip int unsigned not null default 0 comment '上次登录ip',
	last_time int comment '上次登录时间',
	primary key (admin_id) 
) charset=utf8 engine=myisam;

insert into p_admin values 
	(23,'admin', md5('123'),0,0,0),
	(42,'wei',md5('123'),0,0,0),
	(45,'php',md5('123'),0,0,0);