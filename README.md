# CRUD DE ESCOLAS

Aplicação Web do tipo monolitica criada com
- PHP para o backend ^7.4
- HTML, CSS e Javascript pro frontend
- MySQL/MariaDB para o banco de dados

## Funcionalidades

- CRUD de Aunos
- CRUD de Usuarios
- CRUD de Professores
- CRUD de Categorias
- CRUD de Cursos

## Passo a Passo para rodar o projeto

Certifique-se que seu computador tem os softwars:
- PHP
- MySQL ou Maria DB
- Editor de Texto (por exemplo Vs Code)
- Navegador Web
- Composer (Gerenciador de pacotes do PHP)

#### Clone do Projeto

Baixe ou  faça o clone do repositorio:

`git clone https://github.com/ElvisNascimento/crud-php-escola`

Após isso, entre no diretorio que foi gerado

`crud-php-escola`
e
#### Habilitar as extensões do PHP

- abra o diretório de instalação do PHP, encontro o arquivo *php.ini-production*,
renomei-o para *php.ini* e abra-o com algum editor de texto.

Encontre as seguintes linhas e remova o *;* que o precede a linha.

- pdo_mysql
- curl 
- mb_string
- open_ssl

#### Instalar as dependências

- Dentro do diretório da aplicação execute no terminal:

`composer install`

Certifique-se que um diretório chamado **/vendor** foi criado.

### Banco de dados

>>> O Banco de dados é do tipo relacional e contém as tableas com até 2 niveis de normalização.

#### Criação do banco de dados

entre no seu cliente de banco de dados  e digite o seguinte comando:
```sql
CREATE DATABASE db_escola;

```

### Migrar a estrutura do banco de dados
Ainda dentro do cliente de banco de dados, copie e cole o conteudo do arquivo **db.sql** e execute.

certifique-se que as tabelas foram criadas,executando o comando:
```sql
    SHOW TABLES;
```

Se o resultado for a lista de tabelas existentes, então esta tudo certo.

#### Configure as credenciais de acesso

- Encontre o arquivo **/config/database.php** e edite-o conforme as credenciais 
do seu usuário do banco de dados.

### Crie o primeiro Usuário de acesso 

Dentro do diretório da aplicação,
execute no terminal o comando

`php config/create-admin.php`

isso criará um usuário com as Credenciais:

|Nome|e-mail|password|
| -  | -    | -      |
|admin|admin@admin.com|123456|


### Executando a aplicação

para executar e testar a aplicação, dentro do terminal execute:
`php -S locahost:8000 -t public`

Agora acesse o endereço <link>http//localhost:8000</link> em seu navegador




