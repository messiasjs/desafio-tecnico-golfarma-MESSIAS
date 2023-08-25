# desafio-tecnico-golfarma-MESSIAS

# Sistema de Gerenciamento de Pedidos com Laravel

Este é um exemplo de um sistema de pedidos CRUD (Create, Read, Update, Delete) desenvolvido utilizando o framework Laravel. 
O sistema permite a criação, listagem, exibição de detalhes, atualização e exclusão de pedidos, com autenticação usando Laravel Sanctum.

# Requisitos
Certifique-se de ter as seguintes ferramentas instaladas em sua máquina:

- PHP
- Composer
- MySQL

# Rotas da API
  
A API oferece as seguintes rotas para operações CRUD de pedidos:

- Criar Pedido:

Rota: POST /api/pedidos

Parâmetros de entrada: Cliente, Total e Status (JSON)

Formato de resposta: JSON com os detalhes do pedido criado.


- Listar Pedidos:
  
Rota: GET /api/pedidos

Formato de resposta: JSON contendo uma lista de todos os pedidos.


- Detalhes do Pedido:

Rota: GET /api/pedidos/{pedido}

Parâmetros de entrada: ID do Pedido

Formato de resposta: JSON com os detalhes do pedido específico.


- Atualizar Pedido:

Rota: PUT /api/pedidos/{pedido}

Parâmetros de entrada: ID do Pedido e dados a serem atualizados (JSON)

Formato de resposta: JSON com os detalhes do pedido atualizado.


- Deletar Pedido:

Rota: DELETE /api/pedidos/{pedido}

Parâmetros de entrada: ID do Pedido
Formato de resposta: Sem conteúdo (204 No Content) em caso de sucesso.
