<?php

use Project\TshirtTable;
use Bitrix\Main\Application;

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

Application::getConnection()->startTracker();

$query = TshirtTable::query()
    ->setSelect([
        'NAME',
        'BRAND',
        'SHOPS.ID',
        'SHOPS.ADDRESS'
    ])
    ->exec();

Application::getConnection()->stopTracker();
$sql = $query->getTrackerQuery()->getSql();

dd($sql);

$tShirts = $query->fetchCollection();
?>

<table>
    <tr>
        <td>
            Название
        </td>
        <td>
            Бренд
        </td>
        <td>
            Магазины
        </td>
    </tr>
    <?php foreach ($tShirts as $tShirt) : ?>
        <tr>
            <td>
                <?= $tShirt->get('NAME'); ?>
            </td>
            <td>
                <?= $tShirt->get('BRAND')->get('NAME'); ?>
            </td>
            <td>
                <?php foreach ($tShirt->get('SHOPS') as $shop) : ?>
                    <?= $shop->get('ADDRESS') ?>
                    <br>
                <?php endforeach; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
