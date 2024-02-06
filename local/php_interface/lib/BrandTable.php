<?php

namespace Project;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\TextField;
use Bitrix\Main\SystemException;

/**
 * Class BrandTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> UF_NAME text optional
 * </ul>
 *
 * @package Bitrix\Brand
 **/

class BrandTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return 'c_brand';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     * @throws SystemException
     */
    public static function getMap(): array
    {
        return [
            new IntegerField(
                'ID',
                [
                    'primary' => true,
                    'autocomplete' => true,
                    'title' => Loc::getMessage('BRAND_ENTITY_ID_FIELD')
                ]
            ),
            new TextField(
                'NAME',
                [
                    'title' => Loc::getMessage('BRAND_ENTITY_UF_NAME_FIELD'),
                    'column_name' => 'UF_NAME',
                ]
            ),
        ];
    }
}
