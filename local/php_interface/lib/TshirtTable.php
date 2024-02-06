<?php
namespace Project;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\TextField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Main\ORM\Fields\Relations\ManyToMany;

/**
 * Class TshirtTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> UF_NAME text optional
 * <li> UF_BRAND int optional
 * <li> UF_SHOP text optional
 * </ul>
 *
 * @package Bitrix\Tshirt
 **/

class TshirtTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'c_tshirt';
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
                    'title' => Loc::getMessage('TSHIRT_ENTITY_ID_FIELD')
                ]
            ),
            new TextField(
                'NAME',
                [
                    'title' => Loc::getMessage('TSHIRT_ENTITY_UF_NAME_FIELD'),
                    'column_name' => 'UF_NAME',
                ]
            ),
            (new Reference(
                'BRAND',
                BrandTable::class,
                Join::on('this.ID', 'ref.ID')
            ))
                ->configureJoinType('inner'),
            (new ManyToMany('SHOPS', ShopTable::class))
                ->configureTableName('c_tshirt_uf_shop')
                ->configureLocalPrimary('ID', 'ID')
                ->configureLocalReference('T_ID')
                ->configureRemotePrimary('ID', 'VALUE')
                ->configureRemoteReference('T_VALUE')
        ];
    }
}
