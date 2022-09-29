## Тестовое задание на вакансию PHP Разработчик

Для развертывания проекта выполните команду

```shell
git clone git@github.com:skater4/laravel-faq.git && cd laravel-faq/docker && docker-compose up --build && docker-compose exec apache bash -c 'cd /var/www/html && cp .env.example .env && composer install && php artisan migrate'
```

Проект будет доступен по адресу http://127.0.0.1

PHPMyAdmin по адресу http://127.0.0.1:8080
