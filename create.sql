
-- cria bando de dados
create database nail;

-- cria tabela
create table clientes (nome text, telefone text, cpf text);

-- mostra todos os detalhes das colunas
show columns from nails;

-- adicona dados a coluna
insert into clientes values (valores);

-- realiza consulta na tabela
select * from clientes;

-- adiciona um novo campo na coluna (id)
alter table clientes add column id int(11) not null auto_increment;

-- adiciona o (id) como chave primaria
add primary key (id);

--edita um cliente 
update clientes set nome=:nome, telefone=:telefone, cpf=:cpf where id=:id;

