create database reserva_equipamentos;

use reserva_equipamentos;

create table fornecedor (
cod_fornecedor int auto_increment primary key not null,
nome_fornecedor varchar(100) not null,
CNPJ varchar(18) not null,
cidade varchar(100),
celular varchar(19),
estado varchar(2) default 'SP' not null,
endereço varchar(100)
);

create table clientes (
cod_cliente int auto_increment primary key not null,
nome_cliente varchar(100),
CPF_cliente varchar(14) not null,
endereço_cliente varchar(100),
celular_cliente varchar(19),
data_nascimento_cliente datetime not null
);

create table equipamentos(
cod_equipamento int auto_increment primary key not null,
nome_equipamento varchar(100),
descrição_equipamento varchar(100),
valor_equipamento decimal(5, 2) not null
);

create table fornecer(
cod_fornecer int primary key auto_increment not null,
cod_equipamento int not null,
cod_fornecedor int not null,
foreign key (cod_equipamento) references equipamentos (cod_equipamento),
foreign key (cod_fornecedor) references fornecedor (cod_fornecedor)
);

create table reservar(
cod_reserva int primary key auto_increment not null,
cod_equipamento int not null,
cod_cliente int not null,
foreign key (cod_equipamento) references equipamentos (cod_equipamento),
foreign key (cod_cliente) references clientes (cod_cliente)
);
