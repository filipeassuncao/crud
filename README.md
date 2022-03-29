# Teste Backend

## :green_circle: Sobre

Desafio backend Pleno.

## :large_blue_circle: Tecnologias

 - [LARAVEL](https://laravel.com/)
 - [PHP](https://www.php.net/)
 - [DOCKER](https://www.docker.com/)

## :arrow_down: Clonar Repositório

```bash
    $ git clone https://github.com/filipeassuncao/backend.git
```
## :red_circle: Configuração

### Dependências:

**1º** Ter instalado no computador o Docker: https://docs.docker.com/engine/install/

**2º** Ter instalado no computador o Docker Compose: https://docs.docker.com/compose/install/

### Executando:

Na primeira vez que for iniciar o container, rode o comando que irá realizar a configuração do ambiente onde será executado a aplicação:


```bash
    $ docker-compose up --build -d
```

Para realizar as configurações e iniciar o projeto execute o comando:

```bash
     $ docker exec -it backend /bin/bash ./start.sh
```
Caso deseje executar novamente os testes, abra outra aba no terminal e entre novamente no container:

```bash
     $ docker exec -it backend /bin/bash
```
Para executar todos os testes do projeto e verificar a **COBERTURA DE TESTES (COVERAGE)** execute o comando:
```bash
     $ composer test
```


## :white_circle: Acesso

1 - Acesse no seu browser http://localhost:6001

## :orange_circle: Documentação via swagger

2 - Acesse no seu browser http://localhost:6001/api/documentation
