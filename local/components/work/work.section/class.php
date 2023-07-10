<?php

namespace Work\Components;

use \CBitrixComponent;

/**
 * Class UslugiMainMapComponent
 * @package Unikal\Components
 */

/** @var array $arParams */
class WorksSection extends CBitrixComponent
{
    const HL_BLOCK_ID = 11;

    public function executeComponent()
    {
        $this->arResult = self::getWorksFromDB();

        $this->includeComponentTemplate();//Активируем компонент
    }

    public static function getWorksFromDB(): array
    {
        $arWorks = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID);
        $rsData = $entity_data_class::getList(array( "select" => array("*"),
            "order" => array("ID" => "DESC"),
            "filter" => array("UF_STATUS" => "34"),));
        while ($el = $rsData->fetch()) {
            $el['UF_PRICE'] = format_price($el['UF_PRICE']);
            $arWorks[] = $el;
        }

        return $arWorks;

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