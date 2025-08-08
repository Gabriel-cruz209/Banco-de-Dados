create database loja_produto_limpeza;

use loja_produto_limpeza;

create table funcionarios(
cod_funcionario int,
nome_funcionario varchar(100),
cpf varchar(14),
data_nascimento datetime,
salario_funcionario decimal
);

create table clientes(
cod_cliente int,
nome_cliente varchar(100),
cpf varchar(14),
data_nascimento datetime,
endereço varchar(200)
);

create table produtos(
cod_produto int,
nome_produto varchar(100),
validade_produto datetime,
preço decimal,
descrição_produto varchar(200)
);

create table estoque(
cod_estoque int,
cod_produto int,
local_estoque varchar(200),
observação varchar(200),
quantidade int
);

create table pedidos(
cod_pedido int,
cod_produto int,
cod_cliente int,
observação varchar(200),
valor_pedido decimal
);