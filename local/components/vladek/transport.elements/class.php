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
 * Class TransportMainElementsComponent
 * @package Vladek\Components
 */
class TransportMainElementsComponent extends CBitrixComponent
{
    private $section;
    private $templateName;
    private $itemCountAll;
    private $filter = [];
    private $sort = [];
    private $pagin;

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
        $this->arResult['ITEMS'] = $this->getItems(3, 6);
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

        if($_GET['sort_time'] && ($_GET['sort_time'] == 'asc' || $_GET['sort_time'] == 'desc')) $this->sort['UF_TRANSPORT_CREATED_DATE'] = $_GET['sort_time'];
        if($_GET['sort_price']  && ($_GET['sort_price'] == 'asc' || $_GET['sort_price'] == 'desc')) $this->sort['UF_TRANSPORT_PRICE'] = $_GET['sort_price'];

        ($_GET['page_id']) ? $pagin = $_GET['page_id'] : $pagin = 0;
        $this->pagin = $pagin;

        $sectionCode = array_reverse($pageURLAr)[0];
        $this->section = $sectionCode;
    }

    public function getCategories($iblockID)
    {
        $entityDataClass = $this->GetEntityDataClass($iblockID);
        $categories = $entityDataClass::getList(array(
            'select' => array('ID', 'UF_TRANSPORT_CATEGORY_NAME', 'UF_TRANSPORT_CATEGORY_BANNER')
        ));
        while($category = $categories->fetch()){
           $result[] = $category;
        }

        return $result;
    }

    public function getItems($iblockID, $marksID)
    {
        $filter = $this->filter;
        $sort = $this->sort;

        $entityDataClass = $this->GetEntityDataClass($iblockID);

        $items = $entityDataClass::getList(array(
            'select' => array('ID', 'UF_TRANSPORT_IMAGES', 'UF_TRANSPORT_NAME', 'UF_TRANSPORT_CODE',
                'UF_TRANSPORT_DESC', 'UF_TRANSPORT_CREATED_DATE', 'UF_TRANSPORT_ADDRESS', 'UF_TRANSPORT_PRICE', 'UF_TRANSPORT_MARK'),
            'filter' => $filter,
            'order'  => $sort
        ));
        while($item = $items->fetch()){
            $entityDataClass = $this->GetEntityDataClass($marksID);
            $marks = $entityDataClass::getList(array(
                'select' => array('UF_TRANSPORT_MARK_CODE', 'UF_TRANSPORT_MARK_NAME'),
                'filter' => array('ID' => $item['UF_TRANSPORT_MARK'])
            ));
            $mark = $marks->fetch();
            $item['UF_TRANSPORT_MARK'] = $mark['UF_TRANSPORT_MARK_CODE'];
            $item['MARK_NAME'] = $mark['UF_TRANSPORT_MARK_NAME'];
            $result[] = $item;

        }

        $this->itemCountAll = count($result);

        return $result;
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
