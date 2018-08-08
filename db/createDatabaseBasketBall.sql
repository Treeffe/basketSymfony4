create database if not exists db_name character set utf8 collate utf8_unicode_ci;
use db_name;

grant all privileges on db_name.* to '_user'@'localhost' identified by 'xxxx';