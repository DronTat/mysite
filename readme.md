<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Установка
!!!Предпологается что Вы изначально настроили Homestead
1. Скачиваем репозиторий:
git clone https://github.com/DronTat/mysite.git

2. Выполните предварительные настройки в файле .env

3. Выполним установку:
composer install

4. После выполнения настроек, применим миграции с заполнением начальных данных:<br>
php artisan migrate:refresh --seed

5. Приятного пользования

В данном приложении использованы библиотеки:
JQuery File Upload, Nayjest/grids, Bootstrap

Заметка: если у Вас возникнет проблема 413 при загрузке файла, поменяйте настройки:<br>
"/etc/nginx/sites-available/ваш_сайт" установите параметр client_max_body_size = 150m;