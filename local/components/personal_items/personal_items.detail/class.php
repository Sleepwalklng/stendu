<?php

namespace PersonalItem\Components;

use \Bitrix\Main\Loader;
use \CBitrixComponent;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

/**
 * Class UslugiMainMapComponent
 * @package Unikal\Components
 */
class PersonalItemsDetail extends CBitrixComponent
{
    const HL_BLOCK_ID = 13;
    const HL_BLOCK_ID_CATEGORIES_FILTER = 15;
    const HL_BLOCK_ID_TYPES_FILTER = 16;

    public function executeComponent()
    {
        $this->arResult = self::getPersonalItemFromDB();

        $this->includeComponentTemplate();//Активируем компонент
    }

    public static function getPersonalItemFromDB(): array
    {
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID);
        $rsItem = $entity_data_class::getList(array(
            'filter' => array('UF_SESSION_CODE' => self::getItemFromUrl())
        ));
        $item = $rsItem->fetch();
        $item['UF_PRICE'] = format_price($item['UF_PRICE']);
        return $item;

    }

    public static function getPersonalItemCategory($id): string
    {
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID_CATEGORIES_FILTER);
        $rsItem = $entity_data_class::getList(array(
            'filter' => array('ID' => $id)
        ));
        $item = $rsItem->fetch();

        return $item['UF_NAME'];

    }
    public static function getSimilarFromDB($id): array
    {
        // Получение Работ
        $arWork = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID);
        $rsWork = $entity_data_class::getList(array(
            'filter' => array('UF_CATEGORY' => $id)
        ));
        while ($work = $rsWork->fetch()) {
            $arWork[] = $work;
        };
        return $arWork;

    }

    public static function getPersonalItemType($id): string
    {
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID_TYPES_FILTER);
        $rsItem = $entity_data_class::getList(array(
            'filter' => array('ID' => $id)
        ));
        $item = $rsItem->fetch();

        return $item['UF_NAME'];

    }


    public static function getFieldEnum($fId, $id): string
    {
        $obEnum = new \CUserFieldEnum;
        $rsEnumState = $obEnum->GetList(array(), array("USER_FIELD_ID" => $fId, 'ID' => $id));

        $arEnumState = $rsEnumState->Fetch();

        return $arEnumState["VALUE"];

    }


    public static function getItemFromUrl(): string
    {
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $url = new \Bitrix\Main\Web\Uri($request->getRequestUri());
        $page = explode('/', $url);
        $id = $page[3];
        return $id;

    }
}