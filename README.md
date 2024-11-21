## Деплой проекта
1. Проверить необходимое окружение (Все зависимости в composer.json). Для установки всех зависимостей запустить команду: ```composer update```
2. Проверить подключение к серверу с базой данных в файле .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task
DB_USERNAME=root
DB_PASSWORD=
```
В моем случае:

mysql - субд<br/>
HOST и PORT, полученные в PhpMyAdmin(Проект запускаю на локалке через php artisan serve, сервер с бд - OpenServer)<br/>
task - имя базы данных<br/>
имя пользователя и пароль для доступа к бд<br/>

При вводе корректных данных бд может выводится ошибка о том, что нет связи с бд. В таком случае нужно применить команду  
```php artisan config:clear```

если все сделано правильно на этом этапе laravel должен выдать ошибку "Base table or view not found" и предложение о запуске миграции  
Запуск миграции сразу с сидером:
``` php artisan migrate:fresh --seed --seeder=MySeeder ```  

В файле MySeeder.php подписаны комментариями товары, категории, админы, и клменты(Пароли оставил в сидере для удобства). В нем идет все необходимое кроме допуска к категориям у пользователей(Их нужно ставить вручную в админке)

## Использование сервиса
Доступ к админке по адресу /admin (Если запускать на локалке, то полный адрес будет http://127.0.0.1:8000/admin)  
Использовать для входа почту и пароль любого админа из сидера.  


Categories - категории  
Clients - партнеры  
Goods - товары  

Допустимые категории ставятся при редактировании партнера во вкладке clients

Для выполнения запросов к api нужно быть авторизованым, авторизация осуществляется по токену.  
Для получения токена нужно по адресу http://127.0.0.1:8000/api/login отправить post запрос с логином и паролем партнера(в моем случае отправлял через postman)
```
{
    "login": "user5@example.com",
    "password": "aaaeee"
}
```
## Методы

post registration - регистрация пользователя  
post api/login - получение токена для авторизации  
get api/logout - удаление активного токена(разлогиниться)  
get api/profile - вывод информации об активном пользователе  
get api/items - выводит все товары в соответствии категорий пользователя, которые ему доступны   
get api/items?name=string - то же самое, но с фильтрацией по названию   
get api/items/{item_id} - вывод товара с уникальным номером item_id при условии, что его категория доступна пользователю  
get api/categories - выводит все категории, которые доступны пользователю   
get api/categories?name=string - то же самое, но с фильтрацией по названию 
get api/categories/{category_id} - вывод категории с уникальным номером category_id при условии, что она доступна пользователю  

## Пример работы
![1](https://github.com/user-attachments/assets/e5602811-5566-482f-992f-b6f8b14fbac7)
<hr>  

![2](https://github.com/user-attachments/assets/c3cfc3ff-0f91-4593-9162-f2c1ae23873e)

