# Системные требования

### Backend
- PHP >= 7.1
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
- Composer
- MySql >= 5.7

### Frontend
- Nodejs >= 6.10.1
- Npm >= 3.10.10
- Gulp

### Common
- Git

# Развертывание и запуск проекта

- cd ~/site-dir
- composer install
- npm install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate:refresh --seed
- gulp watch_scss
- gulp watch_scripts
- php artisan serve