<?php

namespace Work\Components;

use \Bitrix\Main\Loader;
use \CBitrixComponent;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

/**
 * Class UslugiMainMapComponent
 * @package Unikal\Components
 */
class WorkVariant extends CBitrixComponent
{
    const TYPES_WORK = 10;
    public function executeComponent()
    {
        $this->arResult['CATEGORIES'] = self::getCategory();
        $this->includeComponentTemplate();//Активируем компонент
    }

    public static function getCategory(): array
    {
        // Получение типов услуг
        \CModule::IncludeModule('highloadblock');
        $Count = [];
        $entity_data_class_type_uslugi = GetEntityDataClass(self::TYPES_WORK);
        $rsData = $entity_data_class_type_uslugi::getList(array());
        while($el = $rsData->fetch()){
            $Count[] = $el;
        }
        return $Count;
    }
}