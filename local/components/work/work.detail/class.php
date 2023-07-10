<?php

namespace Work\Components;

use \Bitrix\Main\Loader;
use \CBitrixComponent;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

/**
 * Class UslugiMainMapComponent
 * @package Unikal\Components
 */
class WorkDetail extends CBitrixComponent
{
    const HL_BLOCK_ID = 11;
    const HL_BLOCK_ID_TYPES = 10;

    public function executeComponent()
    {
        $this->arResult = self::getWorkItemsFromDB();
        $this->arResult['TYPE'] = $this->getWorksTypeFromDB();

        $this->includeComponentTemplate();//Активируем компонент
    }

    public static function getWorkItemsFromDB(): array
    {
        // Получение Работ
        $arWork = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID);
        $rsWork = $entity_data_class::getList(array(
            'filter' => array('UF_SESSION_CODE' => self::getItemFromUrl())
        ));
        while ($work = $rsWork->fetch()) {
            $work['UF_PRICE'] = format_price($work['UF_PRICE']);
            $arWork = $work;
        };
        return $arWork;

    }
    public static function getSimilarFromDB($id): array
    {
        // Получение Работ
        $arWork = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID);
        $rsWork = $entity_data_class::getList(array(
            'filter' => array('UF_TYPE_WORK' => $id)
        ));
        while ($work = $rsWork->fetch()) {
            $work['UF_PRICE'] = format_price($work['UF_PRICE']);
            $arWork[] = $work;
        };
        return $arWork;

    }

    public static function getWorksTypeFromDB(): array
    {
        $Count = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class_type_uslugi = GetEntityDataClass(self::HL_BLOCK_ID_TYPES);
        $arWork = self::getWorkItemsFromDB();
        $rsData = $entity_data_class_type_uslugi::getList(array(
            'filter' => array('ID' => $arWork['UF_TYPE_WORK'])
        ));
        while ($el = $rsData->fetch()) {
            $Count = $el;
        }
        return $Count;
    }

    public static function getItemFromUrl(): string
    {
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $url = new \Bitrix\Main\Web\Uri($request->getRequestUri());
        $page = explode('/', $url);
        $code = $page[3];
        return $code;

    }

    public static function getFieldEnum($fId, $id): string
    {
        $obEnum = new \CUserFieldEnum;
        $rsEnumState = $obEnum->GetList(array(), array("USER_FIELD_ID" => $fId, 'ID' => $id));

        $arEnumState = $rsEnumState->Fetch();

        return $arEnumState["VALUE"];


    }
}