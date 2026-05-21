# Paróquia Online - Sistema Web de Informações

Site institucional da Paróquia Nossa Senhora da Glória.

## Time

- **Product Owner:** Luis Gustavo Romanichen Domingues
- **Scrum Master:** João Vitor Grando
- **Desenvolvedor:** José Afonso Machado da Cruz
- **Desenvolvedor:** Gustavo Ferreira dos Santos

## Tecnologias

- PHP 8.x / Laravel 10
- MySQL
- Bootstrap 5
- Blade (template engine do Laravel)

## Como rodar o projeto

### Requisitos

- PHP >= 8.1
- Composer
- MySQL
- Node.js (opcional, para compilar assets)

### Instalação

```bash
git clone https://github.com/SEU_USUARIO/paroquia-online.git
cd paroquia-online

composer install

cp .env.example .env
php artisan key:generate
```

### Configurar banco de dados

Edite o `.env` com suas credenciais MySQL:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=paroquia_online
DB_USERNAME=root
DB_PASSWORD=
```

Depois rode as migrations e seeders:

```bash
php artisan migrate --seed
```

### Iniciar servidor

```bash
php artisan serve
```

Acesse em: http://localhost:8000

## Acesso administrador

Após rodar `php artisan migrate --seed`, use o login normal em `/login`:

| Campo | Valor |
|-------|-------|
| E-mail | `admin@paroquia.com` |
| Senha | `admin123` |

O painel fica em: http://localhost:8000/admin

Se o banco já existir, crie só o admin com:

```bash
php artisan db:seed --class=AdminSeeder
```

## Sprint 1 - Funcionalidades implementadas

- US001: Visualização de horários de missas
- US002: Visualização de eventos e festas da comunidade
- US003: Cadastro de usuário
- US004: Login de usuário
