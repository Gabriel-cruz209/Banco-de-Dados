-- DDL - CRIAÇÃO DO BANCO DE DADOS E TABELAS CORRIGIDAS

DROP DATABASE IF EXISTS mecanica;
CREATE DATABASE mecanica;
USE mecanica;

CREATE TABLE Cliente (
    id_cliente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(100) NOT NULL,
    cpf_cliente VARCHAR(14) NOT NULL UNIQUE,
    celular_cliente VARCHAR(11) NOT NULL,
    endereco_cliente VARCHAR(100) NOT NULL,
    email_cliente VARCHAR(50) NOT NULL
);

CREATE TABLE Veiculo (
    id_veiculo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    marca_veiculo VARCHAR(100) NOT NULL,
    modelo_veiculo VARCHAR(100) NOT NULL,
    ano_veiculo YEAR NOT NULL,
    cor_veiculo VARCHAR(50) NOT NULL,
    placa_veiculo VARCHAR(7) NOT NULL UNIQUE
);

CREATE TABLE Mecanico (
    id_mecanico INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_mecanico VARCHAR(100) NOT NULL,
    cpf_mecanico VARCHAR(14) NOT NULL UNIQUE,
    celular_mecanico VARCHAR(11) NOT NULL,
    endereco_mecanico VARCHAR(100) NOT NULL,
    email_mecanico VARCHAR(50) NOT NULL,
    salario_mecanico DECIMAL(10,2) NOT NULL
);

CREATE TABLE Servico (
    id_servico INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome_servico VARCHAR(100) NOT NULL,
    tipo_servico VARCHAR(100) NOT NULL,
    preco_servico DECIMAL(10,2) NOT NULL,
    descricao_servico VARCHAR(100) NOT NULL
);

CREATE TABLE Peca (
    id_peca INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_peca VARCHAR(100) NOT NULL,
    tipo_peca VARCHAR(100) NOT NULL,
    preco_peca DECIMAL(10, 2) NOT NULL,
    preco_custo DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    descricao_peca VARCHAR(100) NOT NULL,
    qtde_peca INT NOT NULL,
    fabricante_peca VARCHAR(100) NOT NULL
);

CREATE TABLE OS (
    id_os INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    preco_os DECIMAL (10,2) NOT NULL,
    data_inicio_os DATE NOT NULL,
    descricao_os VARCHAR(100) NOT NULL,
    data_termino_os DATE,
    status_os VARCHAR(100) NOT NULL,
    id_cliente INT NOT NULL,
    id_veiculo INT NOT NULL,
    FOREIGN KEY(id_cliente) REFERENCES Cliente (id_cliente),
    FOREIGN KEY(id_veiculo) REFERENCES Veiculo (id_veiculo)
);

CREATE TABLE possuem (
    id_cliente INT,
    id_veiculo INT,
    PRIMARY KEY(id_cliente, id_veiculo),
    FOREIGN KEY(id_cliente) REFERENCES Cliente (id_cliente),
    FOREIGN KEY(id_veiculo) REFERENCES Veiculo (id_veiculo)
);

CREATE TABLE OS_mecanico(
    id_mecanico INT,
    id_os INT,
    PRIMARY KEY(id_os, id_mecanico),
    FOREIGN KEY(id_os) REFERENCES OS (id_os),
    FOREIGN KEY(id_mecanico) REFERENCES Mecanico (id_mecanico)
);

CREATE TABLE OS_peca(
    id_peca INT,
    id_os INT,
    qtde_vendida INT NOT NULL,
    preco_unitario_cobrado DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY(id_os, id_peca),
    FOREIGN KEY(id_os) REFERENCES OS (id_os),
    FOREIGN KEY(id_peca) REFERENCES Peca (id_peca)
);

CREATE TABLE OS_servico(
    id_servico INT,
    id_os INT,
    preco_cobrado DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY(id_os, id_servico),
    FOREIGN KEY(id_os) REFERENCES OS (id_os),
    FOREIGN KEY(id_servico) REFERENCES Servico (id_servico)
);


-- DML - INSERÇÃO DE DADOS

SET SQL_SAFE_UPDATES = 0;

INSERT INTO Cliente (nome_cliente, cpf_cliente, celular_cliente, endereco_cliente, email_cliente) VALUES 
("Pedro Calazans", "111.111.111-90", "19908909090", "Rua sebastiao camargo calazans n20","contenporaneo@gmail.com"),
("Alice Silva", "222.222.222-00", "11987654321", "Av. Principal, 100", "alice@email.com"),
("Bruno Costa", "333.333.333-11", "21999887766", "Travessa dos Anjos, 5", "bruno@email.com"),
("Carlos Oliveira", "444.444.444-22", "31912345678", "Rua das Flores, 45", "carlos@email.com");


INSERT INTO Mecanico (nome_mecanico, cpf_mecanico, celular_mecanico, endereco_mecanico, email_mecanico, salario_mecanico) VALUES 
("Oswaldo", "121.211.121-90", "19978909780", "Rua Cafe com Leite","cafess@gmail.com", 10000),
("Joao Silva", "100.100.100-00", "11900001111", "Rua A", "joao@email.com", 5000),
("Marcos Souza", "200.200.200-00", "11922223333", "Av B", "marcos@email.com", 6500),
("Carlos Ferreira", "300.300.300-00", "11944445555", "Rua C", "carlosf@email.com", 7000);

INSERT INTO Servico (nome_servico, tipo_servico, preco_servico, descricao_servico) VALUES 
("Revisao Completa", "Revisao", 2000.00, "Revisao completa"),
("Troca de Oleo", "Manutencao", 150.00, "Troca de oleo e filtro"),
("Reparo Motor", "Motor", 5000.00, "Conserto em geral do motor");

INSERT INTO Veiculo(marca_veiculo, modelo_veiculo, ano_veiculo, cor_veiculo, placa_veiculo) VALUES 
("Nissan", "Skyline R34", 2005, "Azul", "ABC1234"),
("Ford", "Fiesta", 2018, "Preto", "DEF5678"),
("Volkswagen", "Fusca", 1970, "Amarelo", "GHI9012"),
("Ford", "Ka", 2020, "Branco", "JKL3456");

INSERT INTO Peca(nome_peca, tipo_peca, preco_peca, preco_custo, descricao_peca, qtde_peca, fabricante_peca) VALUES 
('Embreagem Completa', 'Transmissão', 850.00, 500.00, 'Kit completo de embreagem', 10, 'Bosch'),
('Filtro de Óleo', 'Consumível', 50.00, 20.00, 'Filtro para troca de óleo', 20, 'Fram'),
('Vela de Ignição', 'Ignição', 80.00, 40.00, 'Vela de Ignição de iridium', 5, 'Bosch'),
('Pneu Aro 15', 'Rodas', 400.00, 250.00, 'Pneu comum', 2, 'Pirelli');

INSERT INTO possuem (id_cliente, id_veiculo) VALUES 
(1, 1),
(2, 2),
(3, 3),
(2, 4);

INSERT INTO OS (preco_os, data_inicio_os, descricao_os, data_termino_os, status_os, id_cliente, id_veiculo) VALUES 
(1500.00,'2025-02-10','Troca de embreagem e revisão completa','2025-02-15', 'Concluída', 1, 1),
(500.00,'2025-05-20','Troca de óleo','2025-05-20', 'Concluída', 2, 2),
(300.00,'2025-07-01','Diagnóstico motor','2025-07-05', 'Em Execução', 3, 3),
(100.00,'2025-11-01','Revisão simples','2025-11-01', 'Concluída', 2, 4);

INSERT INTO OS_mecanico (id_os, id_mecanico) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 2);

INSERT INTO OS_peca (id_os, id_peca, qtde_vendida, preco_unitario_cobrado) VALUES
(1, 1, 1, 850.00),
(2, 2, 1, 50.00),
(3, 3, 4, 80.00);

INSERT INTO OS_servico (id_os, id_servico, preco_cobrado) VALUES
(1, 1, 2000.00),
(2, 2, 150.00),
(3, 3, 5000.00);


-- CONSULTAS CORRIGIDAS

-- SELECT BÁSICO
SELECT * FROM Cliente;
SELECT * FROM Veiculo;
SELECT * FROM Peca;
SELECT * FROM Mecanico;
SELECT * FROM Servico;
SELECT * FROM OS;
SELECT * FROM possuem;

-- Atividade 1 selects
-- 1.Selecione todos os veículos cadastrados que são da marca "Ford"
SELECT * FROM Veiculo
WHERE marca_veiculo = 'Ford';

-- 2.Clientes que abriram OS nos últimos 6 meses
SELECT * FROM Cliente
WHERE id_cliente IN (
    SELECT id_cliente FROM OS
    WHERE data_inicio_os >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
);

-- 3.Mecânicos com “Injeção Eletrônica” no nome
SELECT * FROM Mecanico
WHERE nome_mecanico LIKE '%Injeção Eletrônica%';

-- 4.OS com status “Aguardando Peça”
SELECT * FROM OS
WHERE status_os = 'Aguardando Peça';

-- 5.Peças com estoque abaixo de 5
SELECT * FROM Peca
WHERE qtde_peca < 5;

-- 6.Veículos que tiveram mais de uma OS
SELECT * FROM Veiculo
WHERE (SELECT COUNT(*) FROM OS WHERE OS.id_veiculo = Veiculo.id_veiculo) > 1;

-- 7.OS feitas pelo mecânico 3
SELECT OS.* FROM OS
INNER JOIN OS_mecanico ON OS.id_os = OS_mecanico.id_os
WHERE OS_mecanico.id_mecanico = 3;

-- 8.Peças com preço acima de 200
SELECT nome_peca, preco_peca FROM Peca
WHERE preco_peca > 200;


-- Atividade 3 Update
-- 1.Atualize o preco_peca de todas as peças do fabricante "Bosch", aplicando um aumento de 5%.
UPDATE Peca SET preco_peca = preco_peca * 1.05
WHERE fabricante_peca = "Bosch";

-- 2.Modifique o status da Ordem de Serviço de ID 3 de "Em Execução" para "Concluída".
UPDATE OS SET status_os = "Concluída", data_termino_os = CURDATE() 
WHERE id_os = 3;

-- 3.Atualize a data_termino_os de todas as Ordens de Serviço que ainda estão "Em Execução" e foram abertas há mais de 30 dias.
UPDATE OS SET data_termino_os = CURDATE(), status_os = "Atrasada"
WHERE status_os = "Em Execução" AND data_inicio_os <= DATE_SUB(CURDATE(), INTERVAL 30 DAY);

-- 4.(Desafio) Dobre a quantidade em estoque (qtde_peca) da peça com id_peca = 2.
UPDATE Peca SET qtde_peca = qtde_peca * 2
WHERE id_peca = 2;


-- Atividade 4 Alter Table
-- 1.Adicione uma nova coluna email (tipo VARCHAR(100)) à tabela Clientes.
-- A coluna já existe (email_cliente), mas o comando seria:
-- ALTER TABLE Cliente ADD COLUMN email_novo VARCHAR(100);

-- 2.Modifique o tipo de dados da coluna nome_mecanico na tabela Mecanico para VARCHAR(150).
ALTER TABLE Mecanico MODIFY COLUMN nome_mecanico VARCHAR(150);

-- 3.Remova uma coluna (ex: diagnostico_entrada) da tabela Ordens_Servico.
-- Exemplo de comando:
-- ALTER TABLE OS DROP COLUMN diagnostico_entrada; 

-- 4.(Desafio) Adicione uma restrição CHECK na tabela Pecas para garantir que preco_peca seja sempre maior ou igual ao preco_custo.
ALTER TABLE Peca
ADD CONSTRAINT chk_preco_pecas
CHECK (preco_peca >= preco_custo);


-- Atividade 5 Inner Join
-- 1.Liste a placa e o modelo dos veículos que estão atualmente com uma OS "Em Execução".
SELECT V.placa_veiculo, V.modelo_veiculo
FROM Veiculo AS V
INNER JOIN OS AS O ON V.id_veiculo = O.id_veiculo
WHERE O.status_os = 'Em Execução';

-- 2.Mostre o nome dos clientes que possuem veículos da marca “Volkswagen".
SELECT C.nome_cliente, V.marca_veiculo
FROM Cliente AS C
INNER JOIN possuem AS P ON C.id_cliente = P.id_cliente
INNER JOIN Veiculo AS V ON P.id_veiculo = V.id_veiculo
WHERE V.marca_veiculo = 'Volkswagen';

-- 3. Exiba os nomes dos mecânicos que já trabalharam em pelo menos uma Ordem de Serviço.
SELECT DISTINCT M.nome_mecanico
FROM Mecanico AS M
INNER JOIN OS_mecanico AS OSM ON M.id_mecanico = OSM.id_mecanico;

-- 4.(Desafio) Liste apenas os nomes dos serviços que já foram executados.
SELECT DISTINCT S.nome_servico
FROM Servico AS S
INNER JOIN OS_servico AS OSS ON S.id_servico = OSS.id_servico;


-- Atividade 6 Left Join
-- 1.Liste todos os clientes cadastrados e, para aqueles que já tiveram OS, mostre os IDs das ordens.
SELECT C.nome_cliente, O.id_os
FROM Cliente AS C
LEFT JOIN OS AS O
ON C.id_cliente = O.id_cliente;

-- 2.Mostre todos os mecânicos e a quantidade de Ordens de Serviço em que cada um trabalhou.
SELECT M.nome_mecanico, COUNT(OSM.id_os) AS total_os
FROM Mecanico AS M
LEFT JOIN OS_mecanico AS OSM
ON M.id_mecanico = OSM.id_mecanico
GROUP BY M.id_mecanico, M.nome_mecanico;

-- 3.Exiba todas as peças cadastradas e, se houver, a quantidade total vendida de cada uma.
SELECT P.nome_peca, SUM(OP.qtde_vendida) AS Total_Vendas
FROM Peca AS P
LEFT JOIN OS_peca AS OP
ON P.id_peca = OP.id_peca
GROUP BY P.id_peca, P.nome_peca;

-- 4.(Desafio) Liste todos os veículos e a data da última OS aberta para cada um.
SELECT V.modelo_veiculo, MAX(O.data_inicio_os) AS ultima_os
FROM Veiculo AS V
LEFT JOIN OS AS O
ON V.id_veiculo = O.id_veiculo
GROUP BY V.id_veiculo, V.modelo_veiculo;


-- Atividade 7 Right Join
-- 1.(Inverso do 6.1) Liste todas as Ordens de Serviço e o nome do cliente correspondente.
SELECT O.id_os, C.nome_cliente
FROM Cliente AS C
RIGHT JOIN OS AS O
ON C.id_cliente = O.id_cliente;

-- 2.Mostre todos os serviços e os IDs das OS onde eles foram usados.
SELECT S.nome_servico, OS.id_os
FROM OS_servico AS OSS
RIGHT JOIN Servico AS S ON OSS.id_servico = S.id_servico
LEFT JOIN OS ON OSS.id_os = OS.id_os;

-- 3.Exiba todos os itens da tabela OS_Mecanicos e traga o nome completo do mecânico.
SELECT M.nome_mecanico, OSM.id_os
FROM OS_mecanico AS OSM
RIGHT JOIN Mecanico AS M ON M.id_mecanico = OSM.id_mecanico
WHERE OSM.id_os IS NOT NULL;

-- 4.(Desafio) Liste todos os veículos (tabela Veiculo, direita) e as OS associadas (tabela OS, esquerda).
SELECT V.modelo_veiculo, O.id_os
FROM OS AS O
RIGHT JOIN Veiculo AS V
ON V.id_veiculo = O.id_veiculo;


-- Atividade 8 Subconsultas
-- 1.Escreva uma consulta para encontrar os clientes que já abriram mais de 1 Ordem de Serviço.
SELECT nome_cliente
FROM Cliente
WHERE id_cliente IN(
    SELECT id_cliente
    FROM OS
    GROUP BY id_cliente
    HAVING COUNT(*) > 1
);

-- 2.Identifique as peças (nome da peça) que foram utilizadas na mesma Ordem de Serviço do mecânico "Marcos Souza" (ID 3).
SELECT P.nome_peca
FROM Peca AS P
INNER JOIN OS_peca AS OP ON P.id_peca = OP.id_peca
WHERE OP.id_os IN (
    SELECT id_os FROM OS_mecanico WHERE id_mecanico = 3
);

-- 3.Liste os veículos (placa e modelo) que nunca tiveram uma Ordem de Serviço.
SELECT V.modelo_veiculo, V.placa_veiculo
FROM Veiculo AS V
WHERE id_veiculo NOT IN(
    SELECT DISTINCT id_veiculo FROM OS
);

-- 4.(Desafio) Encontre os serviços cujo preco_servico é maior que o preço médio de todos os serviços.
SELECT nome_servico, preco_servico
FROM Servico
WHERE preco_servico > (
    SELECT AVG(preco_servico)
    FROM Servico
);


-- Atividade 9 Agregação (SUM, COUNT, AVG, GROUP BY)
-- 1.Calcule o faturamento total (OS_peca + OS_servico) de uma OS específica (ex: ID 1).
SELECT
    SUM(COALESCE(OP.qtde_vendida * OP.preco_unitario_cobrado, 0) + COALESCE(OSV.preco_cobrado, 0)) AS faturamento_total
FROM OS AS O
LEFT JOIN OS_peca AS OP ON O.id_os = OP.id_os
LEFT JOIN OS_servico AS OSV ON O.id_os = OSV.id_os
WHERE O.id_os = 1;

-- 2.Determine o tempo médio (em dias) que as Ordens de Serviço ficam abertas.
SELECT AVG(DATEDIFF(data_termino_os, data_inicio_os)) AS media_dias
FROM OS
WHERE data_termino_os IS NOT NULL;

-- 9.1 Agregações Simples
-- 1.Calcule o número total de veículos cadastrados na oficina.
SELECT COUNT(*) AS total_veiculos
FROM Veiculo;

-- 2.Determine o valor total do inventário (estoque).
SELECT SUM(qtde_peca * preco_custo) AS total_inventario
FROM Peca;

-- 3.Encontre o preço médio da mão de obra de todos os serviços.
SELECT AVG(preco_servico) AS media_servicos
FROM Servico;

-- 9.2 Agregações com Agrupamento (GROUP BY)
-- 1.Agrupe os veículos por marca e conte quantos veículos de cada marca a oficina atende.
SELECT marca_veiculo, COUNT(*) AS total
FROM Veiculo
GROUP BY marca_veiculo;

-- 2.Determine o número de Ordens de Serviço abertas por mês.
SELECT MONTH(data_inicio_os) AS mes, COUNT(*) AS total
FROM OS
GROUP BY MONTH(data_inicio_os);

-- 3.Conte quantas OS cada status possui atualmente.
SELECT status_os, COUNT(*) AS total
FROM OS
GROUP BY status_os;

-- 9.3 Agregações com Filtros (WHERE)
-- 1.Calcule o número total de OS que estão com o status "Concluída".
SELECT COUNT(*) AS total
FROM OS
WHERE status_os = 'Concluída';

-- 2.Determine o faturamento total apenas dos veículos da marca "Nissan".
SELECT SUM(O.preco_os) AS faturamento
FROM OS AS O
JOIN Veiculo AS V ON O.id_veiculo = V.id_veiculo
WHERE V.marca_veiculo = 'Nissan';

-- 3.Encontre o preço médio da mão de obra apenas dos serviços na especialidade "Revisao".
SELECT AVG(preco_servico) AS media_revisao
FROM Servico
WHERE tipo_servico = 'Revisao';

-- 9.4 Agregações com Condições Complexas (HAVING)
-- 1.Encontre os id_cliente dos clientes que já gastaram mais de R$ 500,00 na oficina.
SELECT id_cliente, SUM(preco_os) AS total_gasto
FROM OS
GROUP BY id_cliente
HAVING SUM(preco_os) > 500;

-- 2.Liste as id_peca das peças que foram vendidas mais de 1 vez no total.
SELECT id_peca, SUM(qtde_vendida) AS total_vendido
FROM OS_peca
GROUP BY id_peca
HAVING SUM(qtde_vendida) > 1;

-- 3.Encontre os id_mecanico dos mecânicos que trabalharam em mais de 1 Ordem de Serviço no total.
SELECT id_mecanico, COUNT(id_os) AS total_os
FROM OS_mecanico
GROUP BY id_mecanico
HAVING COUNT(id_os) > 1;

-- 4.(Desafio - Todos de 9) Encontre o nome do mecânico que mais trabalhou em Ordens de Serviço.
SELECT M.nome_mecanico, COUNT(OSM.id_os) AS total_os
FROM Mecanico AS M
LEFT JOIN OS_mecanico AS OSM ON M.id_mecanico = OSM.id_mecanico
GROUP BY M.id_mecanico, M.nome_mecanico
ORDER BY total_os DESC
LIMIT 1;

-- 10. INDEXAÇÃO
CREATE INDEX idx_placa ON Veiculo(placa_veiculo);
CREATE INDEX idx_os_veiculo ON OS(id_veiculo);
CREATE INDEX idx_os_peca_composto ON OS_peca(id_os, id_peca);

SET SQL_SAFE_UPDATES = 0;