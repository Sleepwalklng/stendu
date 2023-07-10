<?php

namespace Work\Components;

use \Bitrix\Main\Loader;
use \CBitrixComponent;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

/**
 * Class UslugiMainMapComponent
 * @package Unikal\Components
 */
class WorkMap extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        Loader::includeModule('iblock');
        Loader::IncludeModule('highloadblock');
        $this->templateName = $this->GetTemplateName();

        return $arParams;
    }


    public function executeComponent()
    {

        // $this->processingURL($this->arParams['URL_PARAM']);
        $this->arResult['CATEGORIES'] = 123;
        $this->arResult['MAP'] = $this->getMap(11);

        $this->includeComponentTemplate();//Активируем компонент
    }

    public function getMap($iblockID){
        // Получение услуг
        $entity_data_class_uslugi = GetEntityDataClass($iblockID);
        $rsUslugi = $entity_data_class_uslugi::getList(array());
        while($usl = $rsUslugi->fetch()){
            $arUslugi[] = $usl;
        };
        return $arUslugi;

    }
    public function GetEntityDataClass($HlBlockId) {
        if (empty($HlBlockId) || $HlBlockId < 1)
        {
            return false;
        }
        $hlblock = HLBT::getById($HlBlockId)->fetch();
        $entity = HLBT::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();
        return $entity_data_class;
    }
}