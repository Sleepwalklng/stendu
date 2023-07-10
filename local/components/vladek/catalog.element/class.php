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
 * Class CatalogSectionComponent
 * @package Vladek\Components
 */
class CatalogSectionComponent extends CBitrixComponent
{
    private $idIBlock;
    private $templateName;
    private $itemCode = [];
    private $parentSection;

    public function onPrepareComponentParams($arParams)
    {
        Loader::includeModule('iblock');
        Loader::includeModule('catalog');
        Loader::IncludeModule('highloadblock');
        $this->templateName = $this->GetTemplateName();

        return $arParams;
    }


    public function executeComponent()
    {
        $this->idIBlock = $this->getIBlockIdByCode('catalog'); //Здесь прописываем тот код каталога, который указан в ИБ

        $this->processingURL($this->arParams['URL_PARAM']);
        $this->arResult['CURRENT_URI'] = $this->itemCode;  //Передаём url текущего элемента
        $this->arResult['ITEM'] = $this->getItems($this->idIBlock, $this->itemCode); //Передаём товары в представление
        $this->arResult['SKU'] = $this->getSku($this->idIBlock, 3, 4, $this->arResult['ITEM']['ID'], $this->arResult['ITEM']['SECTION_ID']); //Передаём торговые предложения в представление
        $this->includeComponentTemplate();//Активируем компонент
    }

    private function processingURL($urlParam = 0) //Обработка url и получение кода текущего элемента
    {
        $requestInstance = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $uri = new \Bitrix\Main\Web\Uri($requestInstance->getRequestUri());
        $url = $uri->getUri();

        if($urlParam != 0 || $urlParam) $url = $urlParam;
        $remove_http = str_replace('http://', '', $url);
        $split_url = explode('?', $remove_http);
        $pageURL = explode('/', $split_url[0]);
        foreach ($pageURL as $val) {if($val) $pageURLAr[] = $val;}

        $sectionCode = array_reverse($pageURLAr)[0];

        $this->itemCode = $sectionCode;
    }

    private function getSku($iblockID, $skuIblockID, $HlBlockId, $itemID, $sectionCode)
    {
        $currentEl = '';
        if($this->arParams['ELEMENT_ID'] > 0) $currentEl = $this->arParams['ELEMENT_ID'];

        $entity_data_class = $this->GetEntityDataClass($HlBlockId);
        $rsData = $entity_data_class::getList(array(   //Передаём данные в массив из highload блока
            'select' => array('*')
        ));

        $items = \CIBlockSection::GetList(
            array(),
            array('IBLOCK_ID' => $iblockID, 'ACTIVE' => 'Y', 'ID' => $sectionCode),
            false,
            array('ID', 'NAME', 'CODE', 'IBLOCK_SECTION_ID', 'UF_PROPS_FILTER'),
            false);
        $item = $items->GetNext();

        while($el = $rsData->fetch()) //Получаем свойство для выбора текущего элемента
        {
            if ($el['ID'] == $item['UF_PROPS_FILTER'])
            {
                $filter = ['PROPERTY' => $el['UF_PROPERTY_FULL'], 'NAME' => $el['UF_NAME']]; //Для вывода товаров каталога
                break;
            }
        }

        $n = 0;
        $items = \CIBlockElement::GetList( //Получаем сами данные
            array(),
            array('IBLOCK_ID' => $skuIblockID, 'ACTIVE' => 'Y', 'PROPERTY_CML2_LINK' => $itemID),
            false,
            false,
            array('ID', $filter['PROPERTY'], 'QUANTITY', 'CATALOG_GROUP_1', 'PREVIEW_PICTURE'));
        while ($item = $items->GetNext())
        {
            if($item['ID'])
            {
                if($n == 0) $result['DEFAULT_ID'] = $item['ID'];
                $result[$item['ID']] = $item; $n++;
            }
        }

        if(array_key_exists($_GET['search'], $result)) $search = $_GET['search'];
        else $search = $result['DEFAULT_ID'];

        $items = CIBlockElement::GetList(array(),
            array('IBLOCK_ID' => $skuIblockID, 'ACTIVE' => 'Y', 'ID' => $search), false, array(),
            array('PROPERTY_ADD_PHOTO'));

        while($itemImage = $items->GetNext())
        {
            $result['IMAGES'][] = $itemImage['PROPERTY_ADD_PHOTO_VALUE'];
        }

        $result['MAIN'] = $filter;
        $result['SKU_BASE_ID'] = $search;
        $result['ELEMENT_ID'] = $currentEl;

        return $result;
    }

    private function getItems($iblockID, $section)
    {
        $items = CIBlockElement::GetList(array(), array('IBLOCK_ID' => $iblockID, 'ACTIVE' => 'Y', 'CODE' => $section), false, array(), //Получаем основные данные о товаре
            array('ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'SECTION_CODE', 'CATALOG_GROUP_1', 'QUANTITY', 'DETAIL_PAGE_URL', 'PROPERTY_ARTNUMBER','PROPERTY_PROPS', 'PROPERTY_ADVANTAGES', 'PROPERTY_ADDITIONAL', 'IBLOCK_SECTION_ID'));
            $item = $items->GetNext();
            $item['IMAGES'][0] = $item['PREVIEW_PICTURE'];

            $items = CIBlockElement::GetList(array(), //Получаем доп. картинки
            array('IBLOCK_ID' => $iblockID, 'ACTIVE' => 'Y', 'CODE' => $section), false, array(),
            array('PROPERTY_ADD_PHOTO'));

            while($itemImage = $items->GetNext()) {$item['IMAGES'][] = $itemImage['PROPERTY_ADD_PHOTO_VALUE'];}

            $items = \CIBlockSection::GetList(array(), //Получаем название категории
            array('IBLOCK_ID' => $iblockID, 'ACTIVE' => 'Y', 'ID' => $item['IBLOCK_SECTION_ID']), false, array('NAME', 'ID'),
            false);
            $itemSection = $items->GetNext();

        $item['SECTION_NAME'] = $itemSection['NAME'];
        $item['SECTION_ID'] = $itemSection['ID'];

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

    private function GetEntityDataClass($HlBlockId)  //Получаем данные из highload блока
    {
        if (empty($HlBlockId) || $HlBlockId < 1) return false;
        $hlblock = HLBT::getById($HlBlockId)->fetch();
        $entity = HLBT::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();
        return $entity_data_class;
    }


}
