use Livraria;

select * from Livros;
select * from Vendas;

start transaction;
-- 1. Diminuir 2 Unidades dos estoque do livro "Dom Casmurro" (id_livro = 1)
update Livros 
set Quantidade = Quantidade - 2
where Cod_livro = 1;

-- 2.inserir o registro da venda
insert into Vendas(Cod_venda, Data_venda, quantidade)
values (1, NOW(), 2);

-- Se tudo ocorrer bem finaliza a transação
commit;

-- se algo der errado e você precisar desfazer, use o comando
rollback;