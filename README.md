### Bitrix-api MVC template
Заготовка модуля апи для битрикс

### Установка
Расположить папку модуля в папке local.
Скопировать файл routes.php в папку local\routes. Если не включен роутинг, в файле .settings.php активировать файлы роутов:
```php
'routing' => [
    'value' => [
        'config' => ['routes.php']
    ]
]
```

Подключить файл bootstrap.php в prolog части сайта например в файле local\php_interfaces\init.php
```php
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/modules/simple.api/bootstrap.php';
```

По желанию переименовать имя папки и namespaces модуля, контроллеров. Важно!. Они должны совпадать. Simple\Api => simple.api