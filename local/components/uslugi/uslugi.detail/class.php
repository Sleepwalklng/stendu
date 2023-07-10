<?php

namespace Uslugi\Components;

use \CBitrixComponent;

/**
 * Class UslugiMainMapComponent
 * @package Unikal\Components
 */
class UslugiDetail extends CBitrixComponent
{
    const HL_BLOCK_ID = 1;
    const HL_BLOCK_ID_TYPES = 7;

    public function executeComponent()
    {
        $this->arResult = self::getUslugiItemsFromDB();
        $this->arResult['TYPE'] = $this->getUslugisTypeFromDB();

        $this->includeComponentTemplate();//Активируем компонент
    }

    public static function getUslugiItemsFromDB(): array
    {
        // Получение Работ
        $arUslugi = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID);
        $rsUslugi = $entity_data_class::getList(array(
            'filter' => array('UF_SESSION_CODE' => self::getItemFromUrl())
        ));
        while ($Uslugi = $rsUslugi->fetch()) {
            $Uslugi['UF_PRICE'] = format_price($Uslugi['UF_PRICE']);
            $arUslugi = $Uslugi;
        };
        return $arUslugi;

    }
    public static function getSimilarFromDB($id): array
    {
        $arUslugi = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID);
        $rsUslugi = $entity_data_class::getList(array(
            'filter' => array('UF_TYPE_USLUGI' => $id)
        ));
        while ($Uslugi = $rsUslugi->fetch()) {
            $Uslugi['UF_PRICE'] = format_price($Uslugi['UF_PRICE']);
            $arUslugi[] = $Uslugi;
        };
        return $arUslugi;

    }

    public static function getUslugisTypeFromDB(): array
    {
        $Count = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class_type_uslugi = GetEntityDataClass(self::HL_BLOCK_ID_TYPES);
        $arUslugi = self::getUslugiItemsFromDB();
        $rsData = $entity_data_class_type_uslugi::getList(array(
            'filter' => array('ID' => $arUslugi['UF_TYPE_USLUGI'])
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
        $code = $page[4];
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