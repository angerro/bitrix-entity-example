<?php

Bitrix\Main\Loader::registerAutoLoadClasses(null, [
    'Project\BrandTable'  => '/local/php_interface/lib/BrandTable.php',
    'Project\ShopTable'   => '/local/php_interface/lib/ShopTable.php',
    'Project\TshirtTable' => '/local/php_interface/lib/TshirtTable.php',
]);


function dd($data): void
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
