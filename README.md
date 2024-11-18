# API de Pedidos de Viagens Corporativas

Esta é uma API para gerenciar pedidos de viagens. Ela foi desenvolvida utilizando o framework Laravel, com banco de dados MySQL e suporte para testes e requisições utilizando o Insomnia.

## Tecnologias Utilizadas

- Laravel: Framework PHP para desenvolvimento backend.
- MySQL: Banco de dados relacional.
- Docker: Para configurar o ambiente de desenvolvimento.
- Insomnia: Para testes de API e envio de requisições.

## Pré-requisitos

- [Docker](https://www.docker.com/),
- [Composer](https://getcomposer.org/),
- [Insomnia](https://insomnia.rest/),
- [Laravel](https://laravel.com/),
- [Xampp](http://localhost/dashboard/), *opcaional*

## Banco de Dados 

APP_NAME=teste_api
APP_ENV=local
APP_KEY=base64:9xa9YYpTTxOdLvBz8u9Kq69twjivBfD1D2wxkqokkqE=
APP_DEBUG=true
APP_TIMEZONE=America/Sao_Paulo
APP_URL=http://127.0.0.1:8000

## Executar as migrações

- php artisan migrate

## Seeders

- php artisan db:seed

## Start do servidor 

- php artisan serve
