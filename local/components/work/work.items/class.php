<?php

namespace Work\Components;

use \Bitrix\Main\Loader;
use \CBitrixComponent;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

/**
 * Class WorkItems
 * @package Unikal\Components
 */
class WorkItems extends CBitrixComponent
{
    const HL_BLOCK_ID_WORK = 11;
    const HL_BLOCK_ID_TYPES_WORK = 10;

    public function executeComponent()
    {
        $this->arResult['WORK'] = self::getWorkFromDB();
        $this->arResult['TYPE_WORK'] = self::getTypeWorkFromDB();
        $this->includeComponentTemplate();//Активируем компонент
    }

    public static function getWorkFromDB(): array
    {
        // Получение услуг
        $arWork =[];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class_work = GetEntityDataClass(self::HL_BLOCK_ID_WORK);
        $rsWork = $entity_data_class_work::getList(array());
        while($usl = $rsWork->fetch()){
            $arWork[] = $usl;
        };
        return $arWork;
    }

    public static function getTypeWorkFromDB(): array
    {
        // Получение типов услуг
        $Count = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class_type_uslugi = GetEntityDataClass(self::HL_BLOCK_ID_TYPES_WORK);
        $rsData = $entity_data_class_type_uslugi::getList(array());
        while($el = $rsData->fetch()){
            $Count[] = $el;
        }
        return $Count;
    }
}