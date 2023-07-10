<?php

namespace PersonalItems\Components;

use \CBitrixComponent;

/**
 * Class UslugiMainMapComponent
 * @package Uslugi\Components
 */

/** @var array $arParams */
class PersonalItemsSection extends CBitrixComponent
{
    const HL_BLOCK_ID = 13;

    public function executeComponent()
    {
        $this->arResult = self::getPersonalItemsFromDB();

        $this->includeComponentTemplate();//Активируем компонент
    }

    public static function getPersonalItemsFromDB(): array
    {
        $arPersonalItems = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID);
        $rsData = $entity_data_class::getList(array( "select" => array("*"),
            "order" => array("ID" => "DESC"),
            "filter" => array("UF_STATUS" => "34"),));
        while ($el = $rsData->fetch()) {
            $el['UF_PRICE'] = format_price($el['UF_PRICE']);
            $arPersonalItems[] = $el;
        }

        return $arPersonalItems;

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