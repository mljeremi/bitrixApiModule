<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Routing\RoutingConfigurator;
use Bitrix\Main\Engine\Response\Json;
use \Bitrix\Main\HttpRequest;
use Bitrix\Main\Routing\Controllers\PublicPageController;
use Simple\Api;

/**
 * @param RoutingConfigurator $routes
 */
return function (RoutingConfigurator $routes) {

    /**
     * Роут на базе функции, встроенный обработчик
     */
    $routes->get('/api/routes/function', function(HttpRequest $request) {
        if (Loader::includeModule('simple.api')) {
            $controller = new Api\DefaultController();
            (new Json($controller->getApiMethodAction()))->send();
        }
    });

    /**
     * Роут на базе Action
     */
    $routes->get('/api/routes/action', Api\DefaultAction::class);

    /**
     * Роут на базе контроллера
     */
    $routes->get('/api/routes/controller', [Api\DefaultController::class, 'getApiMethod']);

    /**
     * Контроллер для отображения html страниц
     */
    $routes->get('/api/routes/public', new PublicPageController('/local/modules/simple.api/public/include.php'));


    /**
     * Группа роутов
     * Роут по пути \api\group\controller\{id} работает только со значением 20
     */
    $routes->prefix('api/group')->group(function (RoutingConfigurator $routes) {
        $routes->get('action/{id}', Api\DefaultAction::class);
        $routes->get('controller/{id}', [Api\DefaultController::class, 'getApiMethod'])
            ->where('id', '20');
        $routes->get('public/{id}', new PublicPageController('/local/modules/simple.api/public/include.php'));
    });
};