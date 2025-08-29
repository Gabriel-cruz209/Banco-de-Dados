create database REMOTERC;

use REMOTERC;

create table PRODUTOS(
Cod_Prod int auto_increment primary key not null,
Descricao_produto varchar(200),
Peso_produto decimal not null,
ValorUnit_produto decimal not null
);

create table VENDEDOR(
Cod_Vend int auto_increment primary key not null,
Nome_vendedor varchar(100) not null,
Salario_vendedor decimal(5, 2) not null,
FSalario_vendedor int not null
);

create table CLIENTE(
Cod_Cli int auto_increment primary key not null,
Nome_cliente varchar(100) not null,
Endereco_cliente varchar(200) not null,
Cidade_cliente varchar(100) not null,
UF_cliente varchar(2) not null
);

alter table VENDEDOR modify Salario_vendedor decimal not null;



-- Inserir elementos na tabela

insert into PRODUTOS (Cod_Prod, Descricao_produto, Peso_produto, ValorUnit_produto) values 
(1 , 'Teclado', 5, 35.00), (2 ,' Mouse', 2, 25.00), (3 ,' HD', 10, 350.00);

insert into VENDEDOR (Cod_Vend, Nome_vendedor, Salario_vendedor, FSalario_vendedor) values
(1 , 'Ronaldo', 3512.00, 1), 
(2 , 'Robertson', 3225.00, 2),
(3 , 'Clodoaldo', 4350.00, 3);

insert into CLIENTE (Cod_Cli, Nome_cliente, Endereco_cliente, Cidade_cliente, UF_cliente) values
(11 , 'Bruno', 'Rua 1 456', 'Rio Claro' , 'SP'), 
(12 , 'Cláudio', 'Rua Quadrada 234', 'Campinas', 'SP'), 
(13 , 'Cremilda', 'Rua das Flores 666', 'São Paulo', 'SP');

-- Alterando os dados da table
alter table VENDEDOR
modify column Salario_vendedor decimal(10,2);
update VENDEDOR set Salario_vendedor = 3150.00 where Cod_Vend = 1;
update VENDEDOR set Salario_vendedor = Salario_vendedor + (Salario_vendedor * 0.10) where Cod_Vend = 2;
update VENDEDOR set Salario_vendedor = 3500.00 where Cod_Vend = 3;

select *from VENDEDOR