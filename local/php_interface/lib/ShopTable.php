<?php

namespace Project;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\TextField;

/**
 * Class ShopTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> UF_ADDRESS text optional
 * </ul>
 *
 * @package Bitrix\Shop
 **/

class ShopTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'c_shop';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            new IntegerField(
                'ID',
                [
                    'primary' => true,
                    'autocomplete' => true,
                    'title' => Loc::getMessage('SHOP_ENTITY_ID_FIELD')
                ]
            ),
            new TextField(
                'NAME',
                [
                    'title' => Loc::getMessage('SHOP_ENTITY_UF_NAME_FIELD'),
                    'column_name' => 'UF_NAME',
                ]
            ),
            new TextField(
                'ADDRESS',
                [
                    'title' => Loc::getMessage('SHOP_ENTITY_UF_ADDRESS_FIELD'),
                    'column_name' => 'UF_ADDRESS',
                ]
            ),
        ];
    }
}
