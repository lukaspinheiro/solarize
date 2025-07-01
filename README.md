# Solarize

Projeto Laravel 12 + React 19 + Tailwind 4, com Vite e Docker.

---

## 🚀 Tecnologias

- Laravel 12 (API/backend)
- React 19 (frontend com Inertia.js)
- Tailwind CSS 4
- Docker e Docker Compose
- MySQL 8
- Vite
- TypeScript
- Ziggy + Radix UI

---

## 📦 Requisitos

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

---

## 🆕 Passo a passo para iniciar um novo projeto

```bash
# 1 - Subir os containers (build inicial)
docker-compose up -d --build

# 2 - Instalar dependências do Laravel
docker exec -it laravel-app composer install

# 3 - Instalar dependências do Node (React/Vite)
docker exec -it laravel-node npm install

# 4 - Rodar as migrations
docker exec -it laravel-app php artisan migrate

# 5 - Subir novamente (caso tenha parado o ambiente)
docker-compose up -d
