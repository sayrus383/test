# Laravel Ticker Convert

## .env
```
AUTH_TOKEN='Vt7aTmJ3pA7ZJGcDEJm9XvN32yfN9AjbPfSGrHukn5Td23anUYX8beej7WNYbb72' - Bearer auth token
RATE_PERCENT=2 - если вдруг наценка для курсов увеличится
```

## Обновление тикера
```
php artisan rates:update - обновление курсов
php artisan schedule:run - обновление курсов каждую минуту
Так же добавил интерфейс для тикеров, если сменится сервис получения курсов (App\Contracts\Services\RateTickerInterface)
```
