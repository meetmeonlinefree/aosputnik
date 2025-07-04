# Тестовое задание: GET /api/prices (Laravel 8+)

## Описание

Проект реализует API-эндпоинт `/api/prices`, который возвращает список товаров (id, title, price).  
При передаче параметра `currency` (`RUB`, `USD`, `EUR`) — цена возвращается с конвертацией и форматированием:

- `RUB = 1`  
- `USD = 90`  
- `EUR = 100`  

Формат:
- RUB: `1 200 ₽`
- USD: `$1.50`
- EUR: `€2.00`

## Стек

- Laravel 8+
- Laravel Resource (JsonResource)
- PHP 7.4+
- SQLite / MySQL

---

## Установка

```bash
git clone https://github.com/your-username/laravel-prices-api.git
cd laravel-prices-api
composer install
cp .env.example .env
php artisan key:generate

```

---

## Использование

## Получить список всех товаров:

GET /api/prices
С указанием валюты (конвертация):
```bash
GET /api/prices?currency=USD
GET /api/prices?currency=EUR
GET /api/prices?currency=RUB
```
---

## Пример ответа:
```bash
[
  {
    "id": 1,
    "title": "Ноутбук",
    "price": "$11.11"
  },
  {
    "id": 2,
    "title": "Смартфон",
    "price": "$6.67"
  }
]

```
