-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.

create database Livraria;
use Livraria;



CREATE TABLE Livros (
Quantidade int not null,
Titulo varchar(100) not null,
Preco decimal (5, 2) not null,
Autor varchar(50) not null,
Genero varchar(100) not null,
Editora varchar(100) not null,
Cod_livro int not null auto_increment primary key
);

CREATE TABLE Autores (
Data_nascimento datetime not null,
Nome_autor varchar(100) not null,
Nacionalidade varchar(50) not null,
Cod_autor int auto_increment not null primary key 
);

CREATE TABLE Editores (
Cidade varchar(100) not null,
Nome_editora varchar(100) not null,
Telefone varchar(14) not null,
Endereco varchar(100) not null,
Contato varchar(100) not null,
Cod_editora int auto_increment not null primary key,
cnpj varchar(100) not null
);

CREATE TABLE Clientes (
Telefone varchar(14) not null,
Nome_cliente varchar(100) not null,
Email varchar(100) not null,
CPF varchar(14),
Cod_cliente int auto_increment not null primary key ,
Data_nascimento datetime not null
);

CREATE TABLE Vendas (
Cod_venda int auto_increment not  null primary key,
valor_total decimal(7,2) not null,
quantidade int not null,
Data_venda datetime not null,
Cod_livro int,
Cod_cliente int,
FOREIGN KEY(Cod_livro) REFERENCES Livros (Cod_livro),
FOREIGN KEY(Cod_cliente) REFERENCES Clientes (Cod_cliente)
);

