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
    private $sectionCode;
    private $templateName;
    private $sections = [];

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

        $this->arResult['CURRENT_URI'] = $this->processingURL(); //Передаём url текущего раздела
        $this->arResult['ITEMS'] = $this->getItems($this->idIBlock, $this->sections); //Передаём товары в представление
        $this->arResult['FILTER'] = $this->filter($this->idIBlock, 4);
        $this->includeComponentTemplate();//Активируем компонент
    }

    private function processingURL() : string //Обработка url и получение кода текущего раздела
    {
        $requestInstance = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $uri = new \Bitrix\Main\Web\Uri($requestInstance->getRequestUri());
        $query = $uri->getQuery();
        $url = $uri->getUri();
        $remove_http = str_replace('http://', '', $url);
        $split_url = explode('?', $remove_http);
        $pageURL = explode('/', $split_url[0]);
        foreach ($pageURL as $val)
        {
            if($val) $pageURLAr[] = $val;
        }


        $sectionCode = array_reverse($pageURLAr)[0];
        $this->sections = $_GET['FILTER'];

        return $sectionCode;
    }

    private function getItems($iblockID, $sections)
    {
        if(!$sections)
        {
            $items = CIBlockElement::GetList(array(), Array('IBLOCK_ID' => $iblockID, 'ACTIVE' => 'Y'), false, array(),
                array('ID', 'NAME', 'PREVIEW_TEXT',
                    'PREVIEW_PICTURE', 'SECTION_CODE', 'CATALOG_GROUP_1', 'QUANTITY', 'DETAIL_PAGE_URL'));
        }
        else
        {
            $items = CIBlockElement::GetList(array(), Array('IBLOCK_ID' => $iblockID, 'ACTIVE' => 'Y', 'SECTION_CODE' => $sections), false, array(),
                array('ID', 'NAME', 'PREVIEW_TEXT',
                    'PREVIEW_PICTURE', 'SECTION_CODE', 'CATALOG_GROUP_1', 'QUANTITY', 'DETAIL_PAGE_URL'));
        }

        while($item = $items->GetNext())
        {

            $mxResult = \CCatalogSku::getOffersList($item['ID'], $iblockID, array('ACTIVE' => 'Y', '>QUANTITY' => 0), array('ID'));
            if($mxResult)
            {
                $itemZ[$item['ID']] = $item;
                $itemZ[$item['ID']]['SKU'] = 1;
            }
            else
            {
                if($item['QUANTITY'] > 0) $itemZ[$item['ID']] = $item;
            }

        }
        foreach ($itemZ as $val) //Перебираем массив с элементами для создания более удобного массива/вывода
        {
            $result[] = $val;
        }

        return $result;
    }

    public function filter($iblockID, $HlBlockId)
    {
        function GetEntityDataClass($HlBlockId)  //Получаем данные из highload блока
        {
            if (empty($HlBlockId) || $HlBlockId < 1) return false;
            $hlblock = HLBT::getById($HlBlockId)->fetch();
            $entity = HLBT::compileEntity($hlblock);
            $entity_data_class = $entity->getDataClass();
            return $entity_data_class;
        }
        $entity_data_class = GetEntityDataClass($HlBlockId);
        $rsData = $entity_data_class::getList(array(   //Передаём данные в массив из highload блока
            'select' => array('*')
        ));

        $items = \CIBlockSection::GetList(
            array(),
            array('IBLOCK_ID' => $iblockID, 'ACTIVE' => 'Y'),
            false,
            array('ID', 'NAME', 'CODE', 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID', 'UF_PROPS_FILTER'),
            false);
        while($item = $items->GetNext())
        {

            if(($item['DEPTH_LEVEL'] == 1))
            {
                $depth1[] = ['ID' => $item['ID'], 'NAME' => $item['NAME'], 'CODE' => $item['CODE']];
            }
            if(($item['DEPTH_LEVEL'] == 2))
            {
                while($el = $rsData->fetch()) //Получаем свойства текущего раздела
                {
                    if ($el['ID'] == $item['UF_PROPS_FILTER'])
                    {
                        $filter = $el['UF_PROPERTY_FULL']; //Для вывода товаров каталога
                        break;
                    }
                }

                $depth2[] = ['SECTION_ID' => $item['IBLOCK_SECTION_ID'], 'NAME' => $item['NAME'], 'CODE' => $item['CODE'], 'PROPERTY' => $filter];
            }
        }

        foreach($depth1 as $val) //Приводим разделы к удобному виду
        {
            foreach($depth2 as $v)
            {
                if($val['ID'] == $v['SECTION_ID']) $result[$val['NAME']][] = ['NAME' => $v['NAME'], 'CODE' => $v['CODE'], 'PROPERTY' => $v['PROPERTY']];
            }
        }

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


}
