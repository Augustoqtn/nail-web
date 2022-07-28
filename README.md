Nail It
----------

Iniciando o banco de dados:

```
docker-compose up

mysql -u root --port 3307 -ppw1234 # entra no console mysql

> CREATE DATABASE nails; 

# sai do console e na linha de comando cria as tabelas;
mysql -u root --port 3307 nails -ppw1234 < create-script.sql 

# inicia o servidor
php -S 0.0.0.0:8000
```
