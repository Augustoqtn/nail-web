create database IF NOT EXISTS nails;

DROP TABLE IF EXISTS clientes;
-- cria tabela
create table clientes (
  id int(11) not null auto_increment,
  nome text, 
  telefone text, 
  cpf text,
  PRIMARY KEY (id)
);
