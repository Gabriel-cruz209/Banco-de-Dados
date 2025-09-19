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

INSERT INTO Livros (Quantidade, Titulo, Preco, Autor, Genero, Editora)
VALUES
(10, 'Dom Casmurro', 39.90, 'Machado de Assis', 'Romance', 'Editora Globo'),
(5, 'O Alquimista', 29.50, 'Paulo Coelho', 'Ficção', 'Rocco'),
(20, 'Capitães da Areia', 42.00, 'Jorge Amado', 'Romance', 'Companhia das Letras'),
(15, '1984', 35.00, 'George Orwell', 'Distopia', 'Companhia Editora Nacional'),
(8, 'O Pequeno Príncipe', 25.00, 'Antoine de Saint-Exupéry', 'Infantil', 'Agir');

INSERT INTO Autores (Data_nascimento, Nome_autor, Nacionalidade)
VALUES
('1839-06-21', 'Machado de Assis', 'Brasileiro'),
('1947-08-24', 'Paulo Coelho', 'Brasileiro'),
('1912-08-10', 'Jorge Amado', 'Brasileiro'),
('1903-06-25', 'George Orwell', 'Britânico'),
('1900-06-29', 'Antoine de Saint-Exupéry', 'Francês');

INSERT INTO Editores (Cidade, Nome_editora, Telefone, Endereco, Contato, cnpj)
VALUES
('São Paulo', 'Companhia das Letras', '1133224455', 'Rua A, 123', 'João Silva', '12.345.678/0001-90'),
('Rio de Janeiro', 'Rocco', '2133112233', 'Av. Brasil, 456', 'Maria Souza', '98.765.432/0001-11'),
('Salvador', 'Editora Globo', '7133991122', 'Rua das Flores, 89', 'Carlos Pereira', '45.678.912/0001-55'),
('Belo Horizonte', 'Agir', '3134005566', 'Av. Minas, 321', 'Fernanda Lima', '33.444.555/0001-77'),
('Porto Alegre', 'Companhia Editora Nacional', '5133667788', 'Rua Central, 654', 'Roberto Alves', '22.111.333/0001-22');

INSERT INTO Clientes (Telefone, Nome_cliente, Email, CPF, Data_nascimento)
VALUES
('1199887766', 'Ana Oliveira', 'ana@gmail.com', '123.456.789-00', '1995-04-12'),
('2199776655', 'Bruno Santos', 'bruno@hotmail.com', '987.654.321-11', '1988-09-23'),
('3199665544', 'Carla Souza', 'carla@yahoo.com', '456.789.123-22', '2000-01-30'),
('4199554433', 'Diego Almeida', 'diego@gmail.com', '789.123.456-33', '1992-06-15'),
('5199443322', 'Fernanda Lima', 'fernanda@hotmail.com', '321.654.987-44', '1985-12-05');


INSERT INTO Vendas (valor_total, quantidade, Data_venda, Cod_livro, Cod_cliente)
VALUES
(79.80, 2, '2025-09-01', 1, 1), -- Dom Casmurro p/ Ana
(29.50, 1, '2025-09-02', 2, 2), -- O Alquimista p/ Bruno
(84.00, 2, '2025-09-05', 3, 3), -- Capitães da Areia p/ Carla
(35.00, 1, '2025-09-07', 4, 4), -- 1984 p/ Diego
(50.00, 2, '2025-09-10', 5, 5); -- Pequeno Príncipe p/ Fernanda

-- CONSULTA --
select * from Vendas;
select * from Clientes;
select * from Editores;
select * from Autores;
select * from Livros;

-- CONSULTA POR TITULO E PREÇO --
select titulo, preco
from livros;

-- CONSULTA POR TITULO, PRECO > 30.00
select titulo, preco
from livros
where preco > 30.00;

-- CONSULTAS POR TITULO E PRECO EM ORDEM CRESCENTE --
select titulo, preco
from livros
order by preco desc;

-- LIMITAR CONSULTAS POR VALOR DE QUANTIDADE APRESENTADAS --
-- APARECEM POR ORDEM DE INSERÇÃO DOS ELEMENTOS --
select titulo from livros
limit 2;

-- RENOMEAR COLUNAS COM AS, SÓ NA VISUALIZAÇÃO--
select titulo as nome, preco as valor
from livros;

-- CONSULTAS AGREGADAS --
select count(*) as titulo
from livros;

-- CONSULTAS COM JOINS --
-- JUNÇÃO DE CODS --
select livros.titulo, autores.nome from livros
join autores on livros.Cod_livro = autores.Cod_autor;

-- CONSULTA POR AGRUPAMENTOS GROUP BY
select titulo, count(*) as quantidade
from livros
group by titulo;

