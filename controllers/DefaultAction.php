<?php


namespace Simple\Api;

use Bitrix\Main\Engine\Action;
use Bitrix\Main\Engine\Contract\RoutableAction;

/**
 * Class DefaultAction
 * Описывает функцию роутинга на базе Action
 * @package Simple\Api
 */
class DefaultAction extends Action implements RoutableAction
{

    /**
     * @inheritDoc
     */
    public static function getControllerClass()
    {
        return DefaultController::class;
    }

    /**
     * @inheritDoc
     */
    public static function getDefaultName()
    {
        return 'getApiMethod';
    }
}