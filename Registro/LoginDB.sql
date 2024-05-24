create database if not exists login;

use login;

create table usuarios (
	idusuario int primary key not null auto_increment,
    usuario varchar(50) not null,
    password varchar(50) not null
);

insert into usuarios (usuario, password) values ("admin", "admin");
