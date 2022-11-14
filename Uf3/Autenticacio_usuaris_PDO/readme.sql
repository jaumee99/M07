

mysql -u root
create database dwes_jaumecasamitjana_autpdo;
create user dwes_jaume@localhost identified by "dwes_jaume";
grant all privileges on dwes_jaumecasamitjana_autpdo.* to dwes_jaume@localhost;
exit;
mysql -u dwes_jaume -p
use dwes_jaumecasamitjana_autpdo;
CREATE TABLE `connections` ( `ip` varchar(15) NOT NULL, `email` varchar(100) NOT NULL, `time` varchar(10) NOT NULL, `status` varchar(45) NOT NULL);
CREATE TABLE `users` ( `name` varchar(45) NOT NULL, `password` varchar(256) NOT NULL, `email` varchar(100) NOT NULL, PRIMARY KEY (`email`));

