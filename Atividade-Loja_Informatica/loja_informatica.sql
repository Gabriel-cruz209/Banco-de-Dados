create database loja_informatica;

-- Ativar BD
use loja_informatica;

create table produtos (
cod_produto int, 
descrição varchar(255),
nome_produto varchar(100),
preço_produto decimal,
imagem blob
);

create table estoque (
cod_estoque int,
qtde int,
local_estoque varchar(255),
nome_produto varchar(100),
observações varchar(255)
);

create table funcionarios(
cod_funcionario int,
nome_funcionario varchar(100),
data_nascimento datetime,
cpf varchar(14),
salario decimal
);

create table serviços(
cod_serviço int,
tipo_serviço varchar(150),
agendamento_serviço datetime,
valor_serviço decimal,
observação varchar(255)
);

create table clientes(
cod_cliente int,
nome_cliente varchar(100),
cpf varchar(14),
endereço varchar(255),
data_nascimento datetime
);