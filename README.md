# Documentação do Sistema de Gerenciamento de Pedidos

## Visão Geral

O Sistema de Gerenciamento de Pedidos é uma API RESTful desenvolvida em Laravel, que permite criar, listar, visualizar, atualizar e excluir pedidos. A API requer autenticação usando o Laravel Sanctum para acessar as rotas protegidas. Cada pedido é representado por um ID único, informações do cliente, total e status.

## Requisitos
Para desenvolver e executar este sistema, você precisará das seguintes ferramentas e tecnologias:

- PHP (versão compatível com o Laravel)
- Composer
- Laravel
- Banco de Dados

## Instalação

- Clone o repositório do sistema:
- Navegue até a pasta do projeto:
- Instale as dependências usando o Composer:
- Copie o arquivo .env.example para .env e configure as variáveis de ambiente, incluindo a configuração do banco de dados.
- Execute as migrações para criar as tabelas do banco de dados:
- Execute o servidor de desenvolvimento:


## Autenticação

A API usa autenticação por token usando o Laravel Sanctum. Para acessar as rotas protegidas, você deve primeiro fazer login e obter um token. Para fazer login, envie uma solicitação POST para /login com as credenciais do usuário. O token gerado deve ser incluído no cabeçalho das solicitações para as rotas protegidas.

## Rotas da API

### Criar Pedido

- Rota: POST /api/pedidos
- Autenticação: Token de autenticação é obrigatório.
- Parâmetros de entrada:

  - name (string): Nome do cliente.
  - price (decimal): Valor total do pedido.
  - status (string): Status do pedido (Pendente, Em andamento, Concluído).

- Formato de resposta: JSON contendo os detalhes do pedido criado.

### Listar Pedidos

- Rota: GET /api/pedidos
- Autenticação: Token de autenticação é obrigatório.
- Formato de resposta: JSON contendo uma lista de todos os pedidos.

### Detalhes do Pedido
- Rota: GET /api/pedidos/{pedido}
- Autenticação: Token de autenticação é obrigatório.
- Parâmetros de entrada:
  - pedido (integer): ID do pedido desejado.
- Formato de resposta: JSON contendo os detalhes do pedido específico.

### Atualizar Pedido
- Rota: PUT /api/pedidos/{pedido}
- Autenticação: Token de autenticação é obrigatório.
- Parâmetros de entrada:
  - pedido (integer): ID do pedido a ser atualizado.
  - name (string): Nome do cliente.
  - price (decimal): Valor total do pedido.
  - status (string): Status do pedido.
- Formato de resposta: JSON contendo os detalhes do pedido atualizado.

### Excluir Pedido
- Rota: DELETE /api/pedidos/{pedido}
- Autenticação: Token de autenticação é obrigatório.
- Parâmetros de entrada:
  - pedido (integer): ID do pedido a ser excluído.
- Formato de resposta: Sem conteúdo (204 No Content) em caso de sucesso.

## Testes
O sistema possui alguns testes para garantir que as funcionalidades principais estejam funcionando corretamente.


