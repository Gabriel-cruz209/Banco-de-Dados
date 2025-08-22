create database Atividade_Avaliativa;

use Atividade_Avaliativa;

create table Fornecedor(
Fcodigo int auto_increment primary key not null,
Fnome varchar(100) not null,
F_status varchar(10) default"Ativo ",
cidade varchar(100) not null
);

create table Peca (
Pcodigo int auto_increment primary key not null,
Pnome varchar(100) not null,
peso int not null,
cor varchar(20) not null,
cidade varchar(100) not null
);

create table Instituição(
Icodigo int auto_increment primary key not null,
Inome varchar(100) not null
);

create table Projeto(
PRcodigo int auto_increment primary key not null,
PRnome varchar(100) not null,
cidade varchar(100) not null,
Icodigo int not null,
foreign key(Icodigo) references Instituição (Icodigo),
index (PRcodigo)
);

create table Fornecimento(
Fornecimento_cod int auto_increment primary key not null,
quantidade int not null,
PRcodigo int not null,
Pcodigo int not null,
Fcodigo int not null,
foreign key(PRcodigo) references Projeto (PRcodigo),
foreign key(Pcodigo) references Projeto (Pcodigo),
foreign key(Fcodigo) references Projeto (Fcodigo)
);

-- Alteração

drop table Instituição;

create table Cidade(
Ccodigo int auto_increment primary key not null,
Cnome varchar(100) not null,
UF varchar (2) not null
);

alter table Fornecedor
add fone varchar(19) not null;


