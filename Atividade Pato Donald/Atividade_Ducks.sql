-- Atividade DUCKS --

-- Atividade 1 --
SHOW TABLES;

-- Atividade 2 --
DESCRIBE ducks;

-- Atividade 3 --
select * from ducks;

-- Atividade 4 --
select * from ducks;

-- Atividade 5 --
select * from ducks order by age;

-- Atividade 6 --
select * from ducks order by age limit 3;

-- Atividade 7 --
select name, age * 12 AS age_in_months 
from ducks;

-- Atividae 8 --
select distinct species from ducks;

-- Atividade 9 --
SELECT * 
FROM duck_surveys 
using SAMPLE 10; -- Comando não direcionado ara mysql

-- Atividade 10 --
SELECT COUNT(*), AVG(age), MIN(age), MAX(age) 
FROM ducks;