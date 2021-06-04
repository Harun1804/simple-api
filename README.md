## Cloning

1. Lakukan Clone Repository

```
git clone https://github.com/Harun1804/simple-api.git
```

2. Masuk ke directory

```
cd simple-api
```

## Install Library dan Copy file .env

1. Install Composer Terlebih Dahulu <br>
   [Download disini](https://getcomposer.org/download/)
2. Install Packagenya Terlebih Dahulu

```
composer install
```

3. Copy isi file .env.example

```
cp .env.example .env
```

## Configuration

1. Buka File .env
2. Atur **DB_DATABASE** dengan yang diinginkan
3. Buatlah database kosong di phpmyadmin dengan nama yang sudah dibuat pada file .env tadi
4. Lakukan migrasi database

```
php artisan migrate
```

5. Kemudian jalankan aplikasinya

```
php -S localhost:8000 -t public
```

6. Kemudian buka **localhost:8000** diweb browser
7. Tambahkan **/key** diurl tersebut
8. Kemudian Copykan yang ada pada layar
9. Kembali lagi ke file .env
10. Cari **APP_KEY** dan pastekan disitu

## Api Documentation
Ini merupakan dokumentasi api yang digunakan [Klik disini](https://documenter.getpostman.com/view/6505899/TzY4faHq)