-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.
create database Empresa_Solar;
use Empresa_Solar;
select database();


CREATE TABLE Clientes (
ID_Cliente int not null auto_increment PRIMARY KEY,
Nome_Cliente varchar(100) not null
);

CREATE TABLE Produto (
ID_Produto int not null auto_increment  PRIMARY KEY,
Nome_Produto varchar(100) not null
);

CREATE TABLE Compra (
ID_Compra int auto_increment primary key not null,
ID_Produto int,
ID_Cliente int,
FOREIGN KEY(ID_Produto) REFERENCES Produto (ID_Produto),
FOREIGN KEY(ID_Cliente) REFERENCES Clientes (ID_Cliente)
);

create table Vendedores(
ID_Vendedor int auto_increment not null primary key,
Nome_Vendedor varchar(100) not null,
Salario_Vendedor decimal(10, 2),
Fsalarial char(1)
);

insert into Vendedores(Nome_vendedor, Salario_Vendedor, Fsalarial) values ("Roberto", 5.000, 1);
insert into Vendedores(Nome_vendedor, Salario_Vendedor, Fsalarial) values ("Willian", 9.000, 2);
insert into Vendedores(Nome_vendedor, Salario_Vendedor, Fsalarial) values ("Pedro", 7.000, 3);
insert into Vendedores(Nome_vendedor, Salario_Vendedor, Fsalarial) values ("Gabriel", 9.000, 2);
insert into Vendedores(Nome_vendedor, Salario_Vendedor, Fsalarial) values ("Lula", 900.00, 2);

select * from Vendedores;

insert into Clientes (Nome_Cliente) values ('Otavio');
insert into Produtos values (2, 'Teclado');

update Produto set Nome_Produto = "Mouse"
where ID_Produto = 2;

select * from Produto;

update Vendedores set Salario_Vendedor = 3150 where Fsalarial = 1;
update Vendedores set Salario_Vendedor = Salario_Vendedor + (Salario_Vendedor * 0.10) where Fsalarial = 2;
update Vendores set Salario_Vendedor = 3500.00 where Fsalarial = 3;

-- Delete
delete from Vendedores where Salario_Vendedor = 2500;
delete from Clientes;
delete from Produtos where ID_Produto = 1;
delete from Clientes where Nome_Cliente = 'Bruno';
delete from Vendedores where ID_Vendedor >= 1 and
ID_Vendedor<=10;
delete from Vendedores where ID_Vendedor<=10 or ID_Vendedor>=20;
truncate table Clientes;

-- Altorizar update em formas de comando
set sql_safe_updates = 0;
