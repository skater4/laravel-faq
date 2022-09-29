## Тестовое задание на вакансию PHP Разработчик

Для развертывания проекта выполните следующие команды

```shell
git clone git@github.com:skater4/laravel-faq.git && cd laravel-faq/docker && docker-compose up --build
```
```
docker-compose exec apache bash -c 'cd /var/www/html && composer install && cp .env.example .env && php artisan migrate'
```

Проект будет доступен по адресу http://127.0.0.1

PHPMyAdmin по адресу http://127.0.0.1:8080
