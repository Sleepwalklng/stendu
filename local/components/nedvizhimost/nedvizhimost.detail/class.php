<?php

namespace RealEstate\Components;

use \Bitrix\Main\Loader;
use \CBitrixComponent;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

/**
 * Class UslugiMainMapComponent
 * @package Unikal\Components
 */
class RealEstateDetail extends CBitrixComponent
{
    const HL_BLOCK_ID = 2;

    public function executeComponent()
    {
        $this->arResult = self::getRealEstateFromDB();

        $this->includeComponentTemplate();//Активируем компонент
    }

    public static function getRealEstateFromDB(): array
    {
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
        $arWork = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID);
        $rsWork = $entity_data_class::getList(array(
            'filter' => array('UF_DEAL_TYPE' => $id)
        ));
        while ($work = $rsWork->fetch()) {
            $work['UF_PRICE'] = format_price($work['UF_PRICE']);
            $arWork[] = $work;
        };
        return $arWork;

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