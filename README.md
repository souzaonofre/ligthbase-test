## Teste Laravel Lightbase

O nosso desafio consiste na criação de um sistema de controle de clientes e suas respectivas placas de carro.

Você precisará construir uma base de dados com os seguintes campos:

    ID;
    Nome;
    Telefone;
    CPF;
    Placa do Carro.


## Endpoints Implementados

    GET     /api/cliente                        -> ClienteController@listarClientes 
    
    POST    /api/cliente                        -> ClienteController@novoCliente 

    GET     /api/cliente/final-placa/{numero}   -> ClienteController@consultarPlaca
  
    GET     /api/cliente/{id}                   -> ClienteController@consultarCliente
  
    PUT     /api/cliente/{id}                   -> ClienteController@editarCliente
  
    DELETE  /api/cliente/{id}                   -> ClienteController@removerCliente


## Instalacão, Operacão e Teste

### Requisitos basicos para testar o codigo do projeto

- Git 
- Terminal Git-Bash p/ Windows e Mac
- PHP >= 8.0
- PHP Composer
- Docker, Docker Engine ou Docker desktop

Obs.: Todos os comandos abaixo devem ser executados no Terminal(Linux) ou Git-Bash(Windows/Mac).

### Baixar codigo do projeto

> git clone git@github.com:souzaonofre/ligthbase-test.git

> cd ligthbase-test


### Configurar variaveis de ambiente

> cp -f .env.sail.example .env


### Montar e executar servicos no Docker via sail command

> ./vendor/laravel/sail/bin/sail up -d


### Instalar dependencias para testes do projeto

> ./vendor/laravel/sail/bin/sail composer install


### Verificar o funcionamento do App via sail command

> ./vendor/laravel/sail/bin/sail artisan about


### Listar as rotas da API via sail command

> ./vendor/laravel/sail/bin/sail artisan route:list --except-vendor


### Montar e alimentar a Base de Dados via sail command

> ./vendor/laravel/sail/bin/sail artisan migration

> ./vendor/laravel/sail/bin/sail artisan db:seed


### Executar testes os funcionalidades via sail command

> ./vendor/laravel/sail/bin/sail test



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
