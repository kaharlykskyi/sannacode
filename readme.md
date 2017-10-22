
1. Clone this repository and cd inside.  
2. Copy .env file: `cp .env.example .env`
3. Install dependencies `composer install`
4. Generate app key `php artisan key:generate`
5. Create database and set up it in `.env`
6. Migrate tables `php artisan migrate` and seed the DB `php artisan db:seed`
7. Serve `php artisan serve`

And you can find application at: `http://127.0.0.1:8000`

На счет функционала:
1) Роуты

    1.1  `/table` - турнирная таблица лиги

    1.2. `/match` - список всех завершенных матчей (результаты)
    
    1.3 `/match/create` - форма добавления нового результат
    
    1.4 `/match/{id}/edit` - форма редактирования существующего результат
    
    1.5 `/match/{id}` - с методом `delete` удаляет выбраный результат
    
    1.6 `/upcoming` - список всех будущих матчей матчей (расписание)
    
    1.7 `/upcoming/create` - форма добавления нового матча
    
    1.8 `/upcoming/{id}/edit` - форма редактирования существующего будущего матча
    
    1.9 `/upcoming/{id}` - с методом `delete` удаляет выбраный матч
    
2) Все таблицы сортируютьсяи филтруються в поле поиска.
3) Нотифаер о будущем матче реализован через `cron` задачи, для этого нужно на сервере запустить:
    
    3.1 `crontab -e` 
    
    3.2 `* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1`
    
    В `app\Console\Commands\SendEmail.php` в методе `handle()` отправляем всем юзерам которые подписаны на какую либо команду и она играет в течение 24 часов - емейл.
    В `app\Console\Kernel.php` в методе `schedule()` указываем `cron` отправлять сообщения (исполнять команду `email:send`) ежедневнов  00:00.