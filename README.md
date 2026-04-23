# DevStore

PHP web app, kas rāda klientus un pasūtījumus no MySQL datubāzes.

## Uzstādīšana

```bash
git clone <repo-url>
cd devstore
cp .env.example .env
```

Aizpildiet `.env` ar saviem datubāzes parametriem, tad importējiet datubāzi:

```bash
mysql -u your_user -p store_dev < db/store_dev.sql
```

Palaidiet serveri:

```bash
cd public
php -S localhost:8000
```

## Maršruti

| URL | Apraksts |
|-----|----------|
| `/customers` | Visi klienti |
| `/customers?with-orders=full` | Klienti ar pasūtījumiem |
| `/orders` | Visi pasūtījumi |
| `/orders?status=delivered` | Pasūtījumi pēc statusa |

Pieejamie statusi: `pending`, `processing`, `shipped`, `delivered`, `cancelled`

## Struktūra

```
devstore/
├── .env
├── db/
│   └── DB.php
├── public/
│   └── index.php
└── src/
    ├── controllers/
    ├── models/
    └── views/
```

## Prasības

- PHP 8.0+
- MySQL 5.7+