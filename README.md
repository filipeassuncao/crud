# Teste Backend

## :green_circle: Sobre

Desafio backend Pleno.

## :large_blue_circle: Tecnologias

 - [LARAVEL](https://laravel.com/)
 - [PHP](https://www.php.net/)
 - [DOCKER](https://www.docker.com/)

## :arrow_down: Clonar Repositório

```bash
    $ git clone https://github.com/filipeassuncao/crud.git
```
## :red_circle: Configuração

### Dependências:

**1º** Ter instalado no computador o Docker: https://docs.docker.com/engine/install/

**2º** Ter instalado no computador o Docker Compose: https://docs.docker.com/compose/install/

### Executando:

**1º** Duplique o arquivo .env.example para um novo chamado ".env".

**2º** Escolha um servidor de email de sua preferencia e preencha as variaveis de ambiente no arquivo .env com suas credencais.

```bash
    MAIL_MAILER
    MAIL_HOST
    MAIL_PORT
    MAIL_USERNAME
    MAIL_PASSWORD
    MAIL_ENCRYPTION
    MAIL_FROM_ADDRESS
```
----------------------------------
## Linux

Na primeira vez que for iniciar o container, na pasta raiz do projeto, rode o comando que irá realizar a configuração do ambiente da aplicação:


```bash
    $ make buildd
```
Em seguida, execute o comando para executar a aplicação:
```bash
    $ make exec
```

----------------------------------

## Windows

Para realizar as configurações e iniciar o projeto:

```bash
     $  docker-compose up --build -d
```
Execute o comando para entrar no container:
```bash
  $ docker exec -it backend /bin/bash
```
Instale as dependências:
```bash
     $ composer install
```
Execute as migrations:
```bash
     $ php artisan migrate
```
Gere a documentação Swagger:
```bash
     php artisan l5-swagger:generate
```

Rode os testes:
```bash
     composer test
```

Inicie a aplicação:
```bash
      php artisan queue:work & php artisan serve
```

----------------------------------

**(opcional)** Caso deseje executar novamente os testes, abra outra aba no terminal e entre novamente no container:

```bash
     $ docker exec -it backend /bin/bash 
```
**(opcional)** Para executar todos os testes do projeto e verificar a **COBERTURA DE TESTES (COVERAGE)** execute o comando:
```bash
     $ composer test
```


## :purple_circle: Acesso

1 - Acesse no seu browser http://localhost:6001

## :orange_circle: Documentação via swagger

2 - Acesse no seu browser http://localhost:6001/api/documentation
