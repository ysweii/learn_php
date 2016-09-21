create database shop34 charset=utf8;
grant all privileges on shop34.* to 'shop34'@'%' identified by '1234abcd';

use shop34;

-- 管理员表
-- 表名 前缀+逻辑表名
create table p34_admin (
	admin_id int unsigned not null auto_increment,
	-- 认证相关
	admin_name varchar(32) not null default '' comment '管理员姓名',
	admin_pass char(32) not null default '' comment '密码,md5加密后的密码',
	-- 权限
	role_id int unsigned not null default 0 comment '所属的角色ID，RBAC',
	-- 登录相关信息
	last_ip int unsigned not null default 0 comment '上次登录IP',
	last_time int comment '上次登录时间',
	-- 管理员属性信息
	primary key (admin_id)
) charset=utf8 engine=myisam;

insert into p34_admin values 
	(23, 'admin', md5('1234abcd'), 0, 0, 0),
	(42, 'kang', md5('1234abcd'), 0, 0, 0),
	(45, 'php34', md5('1234abcd'), 0, 0, 0);