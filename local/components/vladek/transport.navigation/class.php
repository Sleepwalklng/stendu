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
 * Class TransportMainNavComponent
 * @package Vladek\Components
 */
class TransportMainNavComponent extends CBitrixComponent
{
    private $order;
    private $templateName;
    private $itemCountAll;
    private $filter = [];
    private $sort = [];
    private $itemCountShow;

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
        $this->arResult['CATEGORIES'] = $this->getCategories(5);
        $this->arResult['ITEMS'] = $this->getItems(3);
        $this->arResult['ITEMS_COUNT'] = $this->itemCountAll;
        $this->arResult['MARKS'] = $this->getMarks(6, 3);
        $this->arResult['ITEMS_COUNT_SHOW'] = $this->itemCountShow;

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
        foreach ($pageURL as $val) {if ($val) $pageURLAr[] = $val;}

        $categoryCode = $this->getItemCode(5,  'UF_TRANSPORT_CATEGORY_CODE', $_GET['category']);

        if($categoryCode) $this->filter['UF_TRANSPORT_CATEGORY'] = $categoryCode;
        if($_GET['mileage'])
        {
            switch ($_GET['mileage'])
            {
                case 'ALL':
                    break;
                case 'NEW':
                    $this->filter['<=UF_TRANSPORT_MILEAGE'] = 0;
                    break;
                case 'WITH':
                    $this->filter['>UF_TRANSPORT_MILEAGE'] = 0;
                    break;
            }
        }


        $sectionCode = array_reverse($pageURLAr)[0];
        $this->order = $sectionCode;
    }

    public function getCategories($iblockID)
    {
        $entityDataClass = $this->GetEntityDataClass($iblockID);
        $categories = $entityDataClass::getList(array(
            'select' => array('ID', 'UF_TRANSPORT_CATEGORY_NAME', 'UF_TRANSPORT_CATEGORY_BANNER', 'UF_TRANSPORT_CATEGORY_CODE')
        ));
        while($category = $categories->fetch()){
           $result[] = $category;
        }

        return $result;
    }

    public function getItems($iblockID)
    {
        $entityDataClass = $this->GetEntityDataClass($iblockID);
        $items = $entityDataClass::getList(array(
            'select' => array('ID')
        ));
        while($item = $items->fetch()){
            $result[] = $item;
        }

        $this->itemCountAll = count($result);

        return $result;
    }

    public function getMarks($iblockID, $itemsID)
    {
        $filter = $this->filter;

        $entityDataClass = $this->GetEntityDataClass($iblockID);
        $marks = $entityDataClass::getList(array( //Получаем Все марки
            'select' => array('ID', 'UF_TRANSPORT_MARK_NAME', 'UF_TRANSPORT_MARK_CODE', 'UF_TRANSPORT_MARK_LOGO'),
        ));
        while($mark = $marks->fetch())
        {
            $filter['UF_TRANSPORT_MARK'] = $mark['ID'];
            $entityDataClass = $this->GetEntityDataClass($itemsID);
            $items = $entityDataClass::getList(array( //Получаем элементы, с количеством элементов
                'select' => array('ID', 'UF_TRANSPORT_MARK', 'UF_TRANSPORT_CODE'),
                'filter' => $filter
            ));

            $itemsCount = [];
            while($item = $items->fetch()) {$itemsCount[] = $item['ID'];}

            if(!$itemsCount || empty($itemsCount)) continue;
            else $mark['COUNT'] = count($itemsCount);

            $result[] = $mark;

        }

        $this->itemCountShow = count($result);

        return array_chunk($result, 4);
    }


    public function getIBlockIdByCode($code)
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

    public function GetEntityDataClass($HlBlockId)
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

    public function getItemCode($HlBlockId,  $propertyName, $code = false)
    {
        if($code != false && $code != '')
        {
            $entityDataClass = $this->GetEntityDataClass($HlBlockId);
            $items = $entityDataClass::getList(array(
                'select' => array('ID'),
                'filter' => array($propertyName => $code)
            ));

            $item = $items->fetch();

            return $item['ID'];
        }
        return '';
    }

    public function getPropertyByCode($propertyCollection, $code)  {
        foreach ($propertyCollection as $property)
        {
            if($property->getField('CODE') == $code)
                return $property;
        }
    }


}
