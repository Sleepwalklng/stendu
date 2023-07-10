<?php

namespace RealEstate\Components;

use \CBitrixComponent;
use Google\Cloud\Translate\V2\TranslateClient;

/**
 * Class UslugiMainMapComponent
 * @package Unikal\Components
 */

/** @var array $arParams */
class RealEstateSection extends CBitrixComponent
{
    const HL_BLOCK_ID = 2;

    public function executeComponent()
    {

        $this->arResult = self::getRealEstateFromDB($this->arParams);

        $this->includeComponentTemplate();//Активируем компонент
    }

    public static function getRealEstateFromDB($params): array
    {
        if (!empty($params['UF_DEAL_TYPE'])) {
            $filter = ["UF_STATUS" => "84", 'UF_DEAL_TYPE' => $params['UF_DEAL_TYPE']];
        } else {
            $filter = ["UF_STATUS" => "84"];
        }
        $arRealEstate = [];
        \CModule::IncludeModule('highloadblock');
        $entity_data_class = GetEntityDataClass(self::HL_BLOCK_ID);
        $rsRealEstate = $entity_data_class::getList(array(
            "select" => array("*"),
            "order" => array("ID" => "DESC"),
            'filter' => $filter
        ));
        while ($el = $rsRealEstate->fetch()) {
            $el['UF_PRICE'] = format_price($el['UF_PRICE']);
            $arRealEstate[] = $el;
        }
//        foreach ($arRealEstate as $key => $item) {
//            foreach ($item as $key2 => $el) {
//                if ($el) {
//                    if (is_string($el)) {
//                        $arRealEstate[$key][$key2] = self::getItemTranslate($el, $lang['lang']);
//                    }
//                }
//            }
//        }
        return $arRealEstate;

    }

    public static function getItemTranslate($field, $lang): string
    {
        $translate = new TranslateClient([
            'key' => 'AIzaSyBVzWclwddGOJh2PAH6L9EbMBVLiVtRCRg'
        ]);
//        $fieldLang = $translate->detectLanguage($field);
//        if ($lang == $fieldLang['languageCode']) {
//            $res = $field;
//        } else {
        $result = $translate->translate($field, [
            'target' => $lang
        ]);
        $res = $result['text'];
//        }

        return $res;
    }

    public static function getLangFromUrl(): string
    {
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $url = new \Bitrix\Main\Web\Uri($request->getRequestUri());
        $page = explode('/', $url);
        $code = $page[1];
        return $code;

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