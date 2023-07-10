<?php

namespace Vladek\Components;

use Bitrix\Iblock\IblockTable;
use \Bitrix\Main\ArgumentException;
use \Bitrix\Main\Grid\Options as GridOptions;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Loader;
use \Bitrix\Main\UI\PageNavigation;
use \CBitrixComponent;
use \CIBlockElement;
use \Exception;
use \Bitrix\Main\UI\Filter\Options;
use \Bitrix\Main\Web\Uri;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

/**
 * Class TransportDetailComponent
 * @package Vladek\Components
 */
class TransportDetailComponent extends CBitrixComponent
{
    private $section;
    private $templateName;
    private $itemCountAll;

    public function onPrepareComponentParams($arParams)
    {
        Loader::includeModule('iblock');
        Loader::IncludeModule('highloadblock');
        $this->templateName = $this->GetTemplateName();

        return $arParams;
    }

    public function executeComponent()
    {

        $this->processingURL($this->arParams['URL_PARAM']);
        $this->arResult['ITEM'] = $this->getItem(3, 6, 5);
        $this->arResult['ITEMS_COUNT'] = $this->itemCountAll;

        $this->includeComponentTemplate();//Активируем компонент
    }

    private function processingURL($urlParam = 0) //Обработка url и получение кода текущего элемента
    {
        $requestInstance = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $uri = new \Bitrix\Main\Web\Uri($requestInstance->getRequestUri());
        $url = $uri->getUri();
        if ($urlParam != 0 || $urlParam) {
            $url = $urlParam;
        }
        $remove_http = str_replace('http://', '', $url);
        $split_url = explode('?', $remove_http);
        $pageURL = explode('/', $split_url[0]);

        foreach ($pageURL as $val) {
            if ($val) $pageURLAr[] = $val;
        }

        $sectionCode = array_reverse($pageURLAr)[0];
        $this->section = $sectionCode;
    }

    public function getItem($iblockID, $marksID, $categoryID)
    {

        $entityDataClass = $this->GetEntityDataClass($iblockID);

        $items = $entityDataClass::getList(array(
            'select' => array('ID', 'UF_TRANSPORT_IMAGES', 'UF_TRANSPORT_NAME', 'UF_TRANSPORT_CODE', 'UF_TRANSPORT_CATEGORY',
                'UF_TRANSPORT_DESC', 'UF_TRANSPORT_CREATED_DATE', 'UF_TRANSPORT_ADDRESS', 'UF_TRANSPORT_PRICE', 'UF_TRANSPORT_MARK'),
            'filter' => array('UF_TRANSPORT_CODE' => $this->section)
        ));
        $item = $items->fetch();

        $mark = $this->getMarkData($marksID, $item['UF_TRANSPORT_MARK']);

        $item['CATEGORY'] = $this->getCategoryData($categoryID, $item['UF_TRANSPORT_CATEGORY']);

        $item['MARK'] = $mark;

        return $item;
    }

    private function getIBlockIdByCode($code)
    {
        $IB = IblockTable::getList([
            'select' => ['ID'],
            'filter' => ['CODE' => $code],
            'limit' => '1',
            'cache' => ['ttl' => 3600],
        ]);
        $return = $IB->fetch();
        if (!$return) {
            throw new Exception('Инфоблок с кодом"' . $code . '" не найден.');
        }

        return $return['ID'];
    }

    private function GetEntityDataClass($HlBlockId)
    {
        if (empty($HlBlockId) || $HlBlockId < 1)
        {
            return false;
        }
        $hlblock = HLBT::getById($HlBlockId)->fetch();
        $entity = HLBT::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();
        return $entity_data_class;
    }

    private function getMarkData($HlBlockId, $ID)
    {
        $entityDataClass = $this->GetEntityDataClass($HlBlockId);
        $marks = $entityDataClass::getList(array(
            'select' => array('UF_TRANSPORT_MARK_CODE', 'UF_TRANSPORT_MARK_NAME'),
            'filter' => array('ID' => $ID)
        ));
        $mark = $marks->fetch();

        return $mark;
    }

    private function getCategoryData($HlBlockId, $ID)
    {
        $entityDataClass = $this->GetEntityDataClass($HlBlockId);
        $categories = $entityDataClass::getList(array(
            'select' => array('UF_TRANSPORT_CATEGORY_CODE', 'UF_TRANSPORT_CATEGORY_NAME'),
            'filter' => array('ID' => $ID)
        ));
        $category = $categories->fetch();

        return $category;
    }

    private function getPropertyByCode($propertyCollection, $code)
    {
        foreach ($propertyCollection as $property)
        {
            if($property->getField('CODE') == $code)
                return $property;
        }
    }


}
