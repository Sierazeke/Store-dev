DevStore
Vienkārša PHP web aplikācija, kas apkalpo klientu un pasūtījumu datus no MySQL datubāzes.
Funkcionalitāte

GET /customers — atgriež klientu sarakstu HTML tabulā
GET /customers?with-orders=full — atgriež klientu sarakstu kopā ar visiem to pasūtījumiem

Struktūra
devstore/
├── .env                        # slepenie datubāzes parametri (nav git)
├── .env.example                # .env veidne
├── .gitignore
├── README.md
├── db/
│   └── DB.php                  # datubāzes klase (connect, query, queryWithParams)
├── public/
│   └── index.php               # ieejas punkts, maršrutēšana
└── src/
    ├── controllers/
    │   └── CustomerController.php   # apstrādā /customers pieprasījumus
    └── views/
        └── customers.php            # HTML skats klientu sarakstam
Uzstādīšana
1. Klonējiet repozitoriju
bashgit clone <repo-url>
cd devstore
2. Izveidojiet .env failu
bashcp .env.example .env
Atveriet .env un aizpildiet savus datubāzes parametrus:
DB_HOST=127.0.0.1
DB_NAME=store_dev
DB_USER=your_user
DB_PASS=your_password
3. Importējiet datubāzi
bashmysql -u your_user -p store_dev < db/store_dev.sql
4. Palaidiet PHP iebūvēto serveri
bashcd public
php -S localhost:8000
Aplikācija pieejama: http://localhost:8000
Prasības

PHP 8.0+
MySQL 5.7+