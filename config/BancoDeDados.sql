create database tlm;
use tlm;
create table usuario (
    id int primary key auto_increment,
    foto varchar (250),
    nome varchar(250),
    dt_nasc tinyint(1),
    email varchar(250),
   senha varchar(20));
create table filme (
id int,
nome varchar(250),
protagonista varchar(250),
resumo varchar(250)
);
