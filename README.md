# Sistema de Agendamentos

Aplicacao web feita em PHP e MySQL seguindo a arquitetura MVC, com cadastro de usuarios, autenticacao e um CRUD completo de agendamentos.

## Tecnologias
- PHP
- MySQL (MariaDB)
- Apache (XAMPP)
- HTML e CSS

## Funcionalidades
- Cadastro e login de usuarios
- Senhas armazenadas com hash (bcrypt)
- Dashboard com a lista de agendamentos do usuario logado
- CRUD completo de agendamentos (criar, listar, editar e remover)

## Como executar
1. Copie a pasta `agendamentos` para dentro do diretorio `htdocs` do XAMPP.
2. Inicie o Apache e o MySQL pelo painel do XAMPP.
3. Abra o phpMyAdmin e importe o arquivo `sql/schema.sql` (ou rode o script para criar o banco e as tabelas).
4. Acesse no navegador: `http://localhost/agendamentos/public/`

## Estrutura de pastas
```
agendamentos/
├── config/        configuracoes e conexao (Singleton)
├── app/
│   ├── core/        App (roteador) e Controller base
│   ├── controllers/ Auth, Dashboard e Agendamentos
│   ├── models/      Usuario e Agendamento
│   └── views/       telas (auth, dashboard, agendamentos, templates)
├── public/        ponto de entrada (index.php) e arquivos estaticos
└── sql/           script do banco de dados
```

## Arquitetura e padroes utilizados
O projeto utiliza o padrao MVC e dois design patterns:
- Singleton: a classe `Database` garante uma unica instancia da conexao PDO em toda a aplicacao.
- Front Controller: todas as requisicoes passam por `public/index.php`, que instancia a classe `App` responsavel por interpretar a URL e direcionar para o controller e metodo corretos.
