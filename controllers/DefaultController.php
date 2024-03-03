<?php

namespace Simple\Api;

use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Engine\ActionFilter;

/**
 * Class DefaultController
 * Описывает общие методы апи
 * @package Simple\Api
 */
class DefaultController extends Controller
{
    /**
     * Функция конфигурации методов контроллера.
     * Подключаються или убираються префильтры такие как аутентификации, проверки по токену и.т.д
     * @return \string[][][]
     */
    public function configureActions()
    {
        return [
            'getApiMethod' => [
                '-prefilters' => [
                    ActionFilter\Authentication::class,
                    ActionFilter\Csrf::class
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function getApiMethodAction() {
        return [
            'option_1' => 'value_1',
            'option_2' => 'value_2',
            'option_3' => 'value_3',
            'option_4' => 'value_4',
        ];
    }

}