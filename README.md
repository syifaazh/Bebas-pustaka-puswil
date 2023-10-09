PANDUAN PAKENYA

buka terminal, ketik perintah berikut
> git clone https://github.com/simax1721/bebas-pustaka-puswil.git

> cd bebas-pustaka-puswil

> composer update

> code .

ubah nama file .env.example ke .env

kembali ke terminal
> php artisan migrate

> php artisan db:seed --class=UserRoleSeeder

*note
run project melalui http://localhost/bebas-pustaka-puswil bukan melalui "php artisan serve"
