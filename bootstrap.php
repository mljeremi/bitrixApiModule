<?php

use Bitrix\Main\ModuleManager;

if (!ModuleManager::isModuleInstalled('simple.api'))
    ModuleManager::registerModule('simple.api');

CModule::AddAutoloadClasses(
    'simple.api',
    array(
        '\Simple\Api\DefaultController' => 'controllers/DefaultController.php',
        '\Simple\Api\DefaultAction' => 'controllers/DefaultAction.php',
    )
);