create database solar;

use solar;

create table if not exists clientes (
cod_cliente int auto_increment not null,
nome_cliente varchar(100),
CPF varchar(14) not null,
endereco varchar(100),
celular varchar(19),
primary key (cod_cliente)
);

create table if not exists produto (
cod_produto int auto_increment not null,
nome_produto varchar(100) not null,
qtde int not null,
descrição varchar(100),
valor decimal(5, 2) not null,
primary key (cod_produto)
);

create table if not exists fornecedor(
id_fornecedor int auto_increment not null,
nome_fornecedor varchar(100) not null,
CNPJ varchar(18) not null,
cidade varchar(100),
celular varchar(19),
estado varchar(2) default 'SP' not null,
endereço varchar(100),
primary key (id_fornecedor)
);

create table if not exists vende (
cod_venda int primary key auto_increment not null,
cod_produto int not null,
id_fornecedor int not null,
foreign key (cod_produto) references produto (cod_produto),
foreign key (id_fornecedor) references fornecedor (id_fornecedor)
);

create table if not exists compra (
cod_compra int primary key auto_increment not null,
cod_produto int not null,
cod_cliente int not null,
foreign key (cod_produto) references produto (cod_produto),
foreign key (cod_cliente) references clientes (cod_cliente)
);

create table funcionario (
id_funionario int auto_increment primary key not null,
nome_funcionario varchar(100) not null,
CPF_funcionario varchar(14) not null,
data_nascimento_funcionario datetime not null,
endereço_funcionario varchar(100) not null,
celular_fucionrio varchar(19) not null,
salario_funcionario decimal (5, 2) not null,
id_departamento int not null,
foreign key (id_departamento) references departamento (id_departamento)
);

create table departamento(
id_departamento int auto_increment primary key not null,
nome_departamento varchar (50) not null,
localização varchar(100) not null,
responsavel varchar(100) not null,
setor varchar(50) not null
);

-- CONSULTAR TABELA FUNCIONARIOS
select * from funcionario;

-- ALTERAÇÕES EM TABELAS
alter table funcionario
add sexo char(1) not null;

alter table funcionario
drop column sexo;

alter table funcionario
rename to empregado;

alter table empregado
change CPF_funcionario CIC_funcionario varchar(18);

alter table fornecedor
modify column estado char(2) default 'MG';

alter table empregado
add primary key (CIC_funcionario);

