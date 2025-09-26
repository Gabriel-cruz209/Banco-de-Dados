-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.
create database Plataforma_Concursos;
use Plataforma_Concursos;
select database();


-- Criação das Tabelas Parte 2 --
CREATE TABLE ALUNOS (
id_aluno int not null auto_increment PRIMARY KEY,
data_nascimento_aluno datetime not null,
nome_aluno varchar(100) not null,
email_aluno varchar(100) not null
);

CREATE TABLE INSCRIÇÕES (
id_inscricoes int not null auto_increment PRIMARY KEY,
data_inscricao datetime not null,
id_aluno int ,
id_cursos int ,
FOREIGN KEY(id_aluno) REFERENCES ALUNOS (id_aluno),
FOREIGN KEY(id_cursos) REFERENCES CURSOS (id_cursos)
);

CREATE TABLE CURSOS (
id_cursos int not null auto_increment PRIMARY KEY,
titulo_curso varchar(100) not null,
descricao_curso varchar(100) not null,
carga_horaria_curso int not null,
status_curso varchar(10) default 'Ativo' not null
);

CREATE TABLE AVALIAÇÕES (
id_avaliacao int not null auto_increment PRIMARY KEY,
comentario_avaliacao varchar(100) not null,
nota_avaliacao decimal not null,
id_inscricoes int,
FOREIGN KEY(id_inscricoes) REFERENCES INSCRIÇÕES (id_inscricoes)
);

-- Inserção dos Dados Parte 3 --

insert into ALUNOS (data_nascimento_aluno, nome_aluno, email_aluno)
values
('1995-04-12','Pedro Salles','Predo@gmail.com'),
('1988-09-23','Gabriel Bernardi', 'Gabriel@gmail.com'),
('2000-01-30', 'Jorge Amado', 'Jorge@gmail.com'),
('1992-06-15','George Soares', 'George@gmail.com'),
('1985-12-05', 'Antoine Cruz', 'Antoine@gmail.com');

insert into INSCRIÇÕES (data_inscricao,id_aluno,id_cursos) 
values
('1995-04-12',1,1),
('1988-09-23',1,1),
('2000-01-30',1,1),
('1992-06-15',1,1),
('1985-12-05',1,1);

insert into CURSOS (titulo_curso,descricao_curso,carga_horaria_curso,status_curso)
values
('Informatica','Tecnologias', 1000, 'Ativo'),
('Administração','Gerenciamento', 1200, 'Ativo'),
('Mecanica','Gerenciamento e Manutenção de peças', 1100, 'Ativo'),
('Medicina','Cuidados Medicos', 3000, 'Ativo'),
('Logistica','Controle e Planejamento', 2000, 'Inativo');

insert into AVALIAÇÕES (comentario_avaliacao, nota_avaliacao,id_inscricoes)
values
('Melhore',1,1),
('Bom Trabalho',9,1),
('Adequado',8,1);

-- Atualizar Dados Parte 4 --

update ALUNOS set email_aluno = "Pedraoo@gmail.com"
where id_aluno = 2;

update CURSOS set carga_horaria_curso = 1100
where id_cursos = 2;

update ALUNOS set nome_aluno = "Erick Souza"
where id_aluno = 2;

update CURSOS set status_curso = "Inativo"
where id_curso = 1;

update AVALIAÇÕES set nota_avaliacao = 5
where id_avaliacao = 1;

-- Exclusão de Dados Parte 5 --

delete from INSCRIÇÕES where id_inscricoes = 2;

delete from CURSOS where titulo_curso = 'Medicina';

delete from AVALIAÇÕES where comentario_avaliacao = 'Melhore';

delete from ALUNOS where id_aluno = 1;

delete from CURSOS where status_curso = 'Inativo';

-- Consultas Com Agrupamento Parte 6 --

select * from ALUNOS;
select * from CURSOS;
select * from AVALIAÇÕES;
select * from INSCRIÇÕES;

select nome_aluno, email_aluno
from ALUNOS;

select nome_curso, carga_horaria_curso
from CURSOS
where carga_horaria_curso > 30;

select nome_curso, status_curso
from CURSOS
where status_curso = 'Inativo';

select nome_aluno, data_nascimento_aluno
from ALUNOS
where data_nascimento_aluno > 1995-01-01;

select nota_avaliacao
from AVALIAÇÕES
where nota_avaliacao >= 9;

select count(*) as titulo_curso
from CURSOS;

select titulo_curso, carga_horaria_curso
from CURSOS
order by carga_horaria_curso desc
limit 3;

-- Desafios Extra Parte 7 --

create index idx_email_aluno on ALUNOS (email_aluno);
show index from ALUNOS;



