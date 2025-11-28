create database mecanica;
use mecanica;

CREATE TABLE Cliente (
id_cliente int not null auto_increment PRIMARY KEY,
nome_cliente varchar(100) not null,
cpf_cliente varchar(14) not null,
celular_cliente varchar(11) not null,
endereco_cliente varchar(100) not null,
email_cliente varchar(50) not null
);

CREATE TABLE OS (
id_os int not null auto_increment PRIMARY KEY,
preco_os decimal (10,2) not null,
data_inicio_os date not null,
descricao_os varchar(100) not null,
data_termino_os date not null,
id_cliente int not null ,
id_mecanico int not null,
id_peca int not null,
id_veiculo int not null,
id_servico int not null,
FOREIGN KEY(id_cliente) REFERENCES Cliente (id_cliente),
FOREIGN KEY(id_servico) REFERENCES Servico (id_servico),
FOREIGN KEY(id_veiculo) REFERENCES Veiculo (id_veiculo),
FOREIGN KEY(id_peca) REFERENCES Peca (id_peca),
FOREIGN KEY(id_mecanico) REFERENCES Mecanico (id_mecanico)
);

CREATE TABLE Peca (
id_peca int not null auto_increment PRIMARY KEY,
nome_peca varchar(100) not null,
tipo_peca varchar(100) not null,
preco_peca decimal (10, 2) not null,
descricao_peca varchar(100) not null
);

CREATE TABLE Veiculo (
id_veiculo int not null auto_increment PRIMARY KEY,
marca_veiculo varchar(100) not null,
modelo_veiculo varchar(100) not null,
ano_veiculo date not null,
cor_veiculo varchar(50) not null,
placa_veiculo varchar(7) not null
);

CREATE TABLE Mecanico (
id_mecanico int not null auto_increment PRIMARY KEY,
nome_mecanico varchar(100) not null,
cpf_mecanico varchar(14) not null,
celular_mecanico varchar(11) not null,
endereco_mecanico varchar(100) not null,
email_mecanico varchar(50) not null,
salario_mecanico decimal (10,2) not null
);

CREATE TABLE Servico (
id_servico int auto_increment not null PRIMARY KEY,
nome_servico varchar(100) not null,
tipo_servico varchar(100) not null,
preco_servico decimal (10,2) not null,
descricao_servico varchar(100) not null
);

CREATE TABLE possuem (
id_possuem int not null auto_increment primary key,
id_cliente int,
id_veiculo int,
FOREIGN KEY(id_cliente) REFERENCES Cliente (id_cliente),
FOREIGN KEY(id_veiculo) REFERENCES Veiculo (id_veiculo)
);

insert into Cliente (nome_cliente,cpf_cliente,celular_cliente,endereco_cliente,email_cliente)
values ("Pedro Calazans", "111.111.111-90", "19908909090", "Rua sebastiao camargo calazans n20","contenporaneo@gmail.com");

insert into Mecanico (nome_mecanico,cpf_mecanico,celular_mecanico,endereco_mecanico,email_mecanico,salario_mecanico)
values ("Oswaldo", "121.211.121-90", "19978909780", "Rua Cafe com Leite","cafess@gmail.com", 10000);

insert into Servico (nome_servico,tipo_servico,preco_servico,descricao_servico)
values ("Revisao", "Revisao Completa", 2000, "Foi realizada uma revisao completa pelo carro");

insert into possuem (id_cliente,id_veiculo)
values (1,1);

insert into Veiculo(marca_veiculo,modelo_veiculo,ano_veiculo,cor_veiculo,placa_veiculo)
values ("Nissan", "Skyline R34", "2005-02-15", "Azul", "ABC1234");

insert into Peca(nome_peca,tipo_peca,preco_peca,descricao_peca)
values ('Embreagem Completa', 'Transmissão', 850.00, 'Kit completo de embreagem para veículos populares');

insert into OS (preco_os,data_inicio_os,descricao_os,data_termino_os,id_cliente,id_mecanico,id_peca,id_veiculo,id_servico)
values (1500.00,'2025-02-10','Troca de embreagem e revisão completa','2025-02-15',1,1,1,1,1);

