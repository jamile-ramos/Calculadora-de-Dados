# Calculadora de Planos

Sistema de calculadora de planos e vendas, desenvolvido em Laravel com ambiente totalmente configurado via Docker Compose. Permite fácil execução da aplicação com containers para backend, frontend e banco de dados.
---

## Tecnologias

- Backend: Laravel 12.25.0
- Frontend: Blade (Laravel)
- Banco de dados: MySQL
- Containerização: Docker & Docker Compose
- API: disponível na porta `3000`
- Frontend: disponível na porta `3001`
- 

---

## Estrutura de Pastas
- backend/ # Código-fonte Laravel
- nginx/ # Configurações Nginx para API e Web
- docker-compose.yml


## Configuração do Ambiente
### Requisitos

- Docker
- Docker Compose
- Git

### Passos para rodar o projeto

1. Clonar o repositório
No terminal:

git clone https://github.com/jamile-ramos/Calculadora-de-Dados
cd seu-projeto

2. Rodar o ambiente Docker
Dentro da pasta do projeto:
docker-compose up -d --bui

Instalar composer
docker-compose exec app composer install

4. Instalar servidor de email

docker run -d -p 1025:1025 -p 8025:8025 --name mailhog mailhog/mailhog

Depois rode:

docker-compose up -d

Acessar para ver os email http://localhost:8025

4. Rodar sistema

docker-compose exec app php artisan serve

5. Acesse:
http://localhost:3001/calculadora_plano

6. Acessar a aplicação
Agora você poderá acessar:

API: http://localhost:3000/api

Frontend: http://localhost:3001

Criar seed admin

