create database Atividade_Avaliativa;

use Atividade_Avaliativa;
-- select database();

create table Fornecedor(
Fcodigo int auto_increment primary key not null,
Fnome varchar(100) not null,
F_status varchar(10) not null default"Ativo ",
cidade varchar(100) not null
);

create table Peca (
Pcodigo int auto_increment primary key not null,
Pnome varchar(100) not null,
peso double not null,
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
foreign key(Pcodigo) references Peca (Pcodigo),
foreign key(Fcodigo) references Fornecedor (Fcodigo)
);

-- INDEXES
create index idx_Icodigo on Projeto(Icodigo);
create index idx_Fcodigo on Fornecimento(Fcodigo);
create index idx_Pcodigo on Fornecimento(Pcodigo);
create index idx_PRcodigo on Fornecimento(PRcodigo);


-- Alteração

drop table Instituição;

create table Cidade(
Ccodigo int auto_increment primary key not null,
Cnome varchar(100) not null,
UF varchar (2) not null
);

alter table Fornecedor
add fone varchar(19) not null;

-- Alterações (parte2)
show tables;
-- Consulta tabelas, * procura tudo EX:
select * from Fornecedor;
-- Procurar mais especifico 
select Fnome from Fornecedor;


alter table Projeto
drop foreign key fornecimento_ibfk_1;

alter table Projeto
drop foreign key projeto_ibfk_1;

alter table Instituição
drop column Icodigo;

use Atividade_Avaliativa;
-- Adiciona o campo primeiro
alter table Fornecedor
add column Ccodigo int not null;

-- Transforma em fk
alter table Fornecedor
add constraint fk_Ccodigo_Fornecedor
foreign key (Ccodigo) references Cidade (Ccodigo);

show create table Fornecedor;

-- tabela cidade
insert into Cidade values (11, 'Limeira', 'SP');
insert into Cidade values (12, 'Campinas', 'SP');
insert into Cidade values (13, 'Piracicaba', 'SP');
insert into Cidade values (14, 'Americana', 'SP');

-- verificar ultimo valor inserido de ID
select last_insert_id();

insert into Fornecedor values(31,"Gabriel","Ativo","Limeira",11);
insert into Fornecedor values(21,"Gabriel","Ativo","Campinas",12);

insert into Peca values(1, "Computador",10,"preto","Limeira");
insert into Peca values(2, "Computador",12,"prata","Americana");

Insert into Projeto values(1,"Projeto-A","Campinas","1");
Insert into Projeto values(2,"Projeto-B","Limeira","1");

insert into Fornecimento values(1,'10',1,1 ,31);
insert into Fornecimento values(2,'13',1,1 ,21);
