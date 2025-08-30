# 📊 Calculadora de Planos

Sistema de calculadora de planos e vendas, desenvolvido em **Laravel** com ambiente totalmente configurado via **Docker Compose**.  
A aplicação roda em containers separados para backend, API, frontend, banco de dados e servidor de e-mail.

---

## 🚀 Tecnologias

- **Backend:** Laravel 12.25.0  
- **Frontend:** Blade (Laravel)  
- **Banco de dados:** MySQL 8  
- **Containerização:** Docker & Docker Compose  
- **API:** disponível na porta `3000`  
- **Frontend:** disponível na porta `3001`  
- **MailHog (captura de emails):** disponível na porta `8025`  

---

## 📂 Estrutura de Pastas
- backend/ # Código-fonte Laravel
- nginx/ # Configurações Nginx para API e Web
- docker-compose.yml

## Configuração do Ambiente
### Requisitos

- Docker
- Docker Compose
- Git

--- 

### Passos para rodar o projeto

## 1. Clonar o repositório
No terminal:

git clone https://github.com/jamile-ramos/Calculadora-de-Dados

cd seu-projeto

## 2. Rodar o ambiente Docker

Dentro da pasta do projeto:

docker-compose up -d --build


## 3. Crie o arquivo .env
   
Copie o arquivo .env.example para .env e configure  as variáveis.

Edite o .env para ajustar as configurações do banco de dados:

DB_CONNECTION=mysql

DB_HOST=laravel_db

DB_PORT=3306

DB_DATABASE=calculadoraDados

DB_USERNAME=user

DB_PASSWORD=secret

E configure o envio de emails (MailHog):

MAIL_MAILER=smtp

MAIL_HOST=mailhog

MAIL_PORT=1025

MAIL_FROM_ADDRESS="hello@example.com"

MAIL_FROM_NAME="${APP_NAME}"


## 4. Instalar dependências PHP (Composer)
   
docker-compose exec app composer install --prefer-dist

## 5. Limpar cache
docker-compose exec app php artisan config:clear

## 6. Gerar chave da aplicação
   
docker-compose exec app php artisan key:generate

## 7. Rodar migrations e seeders
   
docker-compose exec app php artisan migrate

docker-compose exec app php artisan db:seed --class=AdminUserSeeder

Acessar para ver os email http://localhost:8025

🌐 Acessos

Frontend (Web): http://localhost:3001

API: http://localhost:3000/api

MailHog (emails): http://localhost:8025


