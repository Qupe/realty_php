# Системные требования

### Backend
- PHP >= 5.6.4
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
- Composer
- MySql >= 5.6.3

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
- gulp watch_scss
- gulp watch_scripts
- php artisan serve