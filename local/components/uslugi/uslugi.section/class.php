<?php

namespace Uslugi\Components;

use \CBitrixComponent;

/**
 * Class UslugiMainMapComponent
 * @package Unikal\Components
 */

/** @var array $arParams */
class UslugiSection extends CBitrixComponent
{
    const HL_BLOCK_ID = 1;

    public function executeComponent()
    {
        $this->arResult = self::getUslugiFromDB();

        $this->includeComponentTemplate();//Активируем компонент
    }

    public static function getUslugiFromDB(): array
    {
        $arUslugi = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID);
        $rsData = $entity_data_class::getList(array( "select" => array("*"),
            "order" => array("ID" => "DESC"),
            "filter" => array("UF_STATUS" => "29"),));
        while ($el = $rsData->fetch()) {
            $el['UF_PRICE'] = format_price($el['UF_PRICE']);
            $arUslugi[] = $el;
        }

        return $arUslugi;

    }



    public static function getFieldEnum($id): array
    {
        $obEnum = new \CUserFieldEnum;
        $rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => $id));
        while ($ob = $rsEnum->fetch()) {
            $arr[] = $ob;
        }

        return $arr;
    }

    public static function getFieldEnumArr($id, $ar): array
    {
        $obEnum = new \CUserFieldEnum;
        $rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => $id));
        while ($ob = $rsEnum->fetch()) {
            if ($ar) {
                if (in_array($ob['ID'], $ar)) {
                    $arr[] = $ob;
                }
            } else {
                $arr[] = $ob;
            }

        }
        return $arr;
    }
}