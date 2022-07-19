## Запуск сборки

- `git clone git@github.com:dvsalamatov/payment_service_test.git`
- `cd payment_service_test`
- `cp .env.dist .env`
- `docker-compose up -d --build`
- `docker exec -it api_php composer install`

Результат задания доступен по адресу: http://localhost:8180/app.php

## Задание

Реализация простейшего платежного сервиса, который принимает платежи двух видов: по карте и Qiwi с помощью двух банков.
