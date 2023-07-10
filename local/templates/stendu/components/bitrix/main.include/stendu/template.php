<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if(!empty($arParams['ID'])){
    $id = $arParams['ID'];
}
if(!empty($arParams['USER_ID'])){
    $user_id = $arParams['USER_ID'];
}
if(!empty($arParams['TITLE'])){
    $title = $arParams['TITLE'];
}
if(!empty($arParams['PRICE'])){
    $price = $arParams['PRICE'];
}

if($arResult["FILE"] <> '')
    include($arResult["FILE"]);