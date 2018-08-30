create database if not exists basketball2 character set utf8 collate utf8_unicode_ci;
use basketball2;

grant all privileges on basketball2.* to 'basketball2_user'@'localhost' identified by 'secret';