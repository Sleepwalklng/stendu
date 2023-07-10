<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

const MY_HL_BLOCK_ID_PERSONAL_ITEMS_TYPES_FILTER = 16;
const MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES = 14;
const MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES_FILTER = 15;
const MY_HL_BLOCK_ID_PERSONAL_ITEMS_OUTERWEAR = 20;
if (!empty($_POST['categoriesId'])) {

    $entity_data_class_personal_items_categories = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES);
    $rsData = $entity_data_class_personal_items_categories::getList(array());
    while ($el = $rsData->fetch()) {
        if ($_POST['categoriesId'] == $el['ID']) {
            $categoriesFilterId = $el['UF_CATEGORIES'];
        }
    }

    $entity_data_class_personal_items_categories_filter = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES_FILTER);
    $rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
    while ($el = $rsDataCatFilter->fetch()) {
        if (!empty($categoriesFilterId)) {
            foreach ($categoriesFilterId as $id) {
                if ($id == $el['ID']) {
                    $categoriesFilter[] = $el;
                }
            }
        }
    }?>
    <? foreach ($categoriesFilter as $arIts): ?>
        <li class="info__box categories-categoria" data-name="<?= $arIts['UF_NAME'] ?? '' ?>" data-id="<?= $arIts['ID'] ?? '' ?>">
            <button class="info__elem"
                    type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
        </li>
    <? endforeach; ?><?php
} elseif (!empty($_POST['category1'])) {

    $entity_data_class_personal_items_categories = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES);
    $rsData = $entity_data_class_personal_items_categories::getList(array());
    while ($el = $rsData->fetch()) {
        if ($_POST['category1'] == $el['ID']) {
            $categoriesFilterId = $el['UF_CATEGORIES'];
        }
    }

    $entity_data_class_personal_items_categories_filter = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES_FILTER);
    $rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
    while ($el = $rsDataCatFilter->fetch()) {
        if (!empty($categoriesFilterId)) {
            foreach ($categoriesFilterId as $id) {
                if ($id == $el['ID']) {
                    $categoriesFilter[] = $el;
                }
            }
        }
    }?>
    <? foreach ($categoriesFilter as $arIts): ?>
        <li class="info__box categories-categoria" data-name="<?= $arIts['UF_NAME'] ?? '' ?>" data-id="<?= $arIts['ID'] ?? '' ?>">
            <button class="info__elem"
                    type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
        </li>
    <? endforeach; ?>
<?php } elseif (!empty($_POST['category2'])) {

    $entity_data_class_personal_items_categories_filter = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_CATEGORIES_FILTER);
    $rsDataCatFilter = $entity_data_class_personal_items_categories_filter::getList(array());
    while ($el = $rsDataCatFilter->fetch()) {
        if ($_POST['category2'] == $el['ID']) {
            $categoriesFilterId = $el['UF_CATEGORY_TYPE'];

        }
    }

    $entity_data_class_personal_items_types_filter = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_TYPES_FILTER);
    $rsDataTypeFilter = $entity_data_class_personal_items_types_filter::getList(array());
    while ($el = $rsDataTypeFilter->fetch()) {
        if (!empty($categoriesFilterId)) {
            foreach ($categoriesFilterId as $id) {
                if ($id == $el['ID']) {
                    $categoriesFilter[] = $el;
                }
            }
        }
    }
    ?>
    <? foreach ($categoriesFilter as $arIts): ?>
        <li class="info__box categories-outerwear" data-name="<?= $arIts['UF_NAME'] ?? '' ?>" data-id="<?= $arIts['ID'] ?? '' ?>">
            <button class="info__elem" data-id="<?= $arIts['ID'] ?? '' ?>"
                    type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
        </li>
    <? endforeach; ?>
<?php } elseif (!empty($_POST['category3'])) {


    $entity_data_class_personal_items_types_filter = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_TYPES_FILTER);
    $rsDataTypeFilter = $entity_data_class_personal_items_types_filter::getList(array());
    while ($el = $rsDataTypeFilter->fetch()) {
        if ($_POST['category3'] == $el['ID']) {
            $categoriesFilterId = $el['UF_SUBCATEGORIES'];

        }
    }

    $entity_data_class_personal_items_outerwear = GetEntityDataClass(MY_HL_BLOCK_ID_PERSONAL_ITEMS_OUTERWEAR);
    $rsDataTypeFilter = $entity_data_class_personal_items_outerwear::getList(array());
    while ($el = $rsDataTypeFilter->fetch()) {
        if (!empty($categoriesFilterId)) {
            foreach ($categoriesFilterId as $id) {
                if ($id == $el['ID']) {
                    $categoriesFilter[] = $el;
                }
            }
        }
    }?>
    <? foreach ($categoriesFilter as $arIts): ?>
    <li class="info__box" >
        <button class="info__elem"
                type="button"><?= $arIts['UF_NAME'] ?? '' ?></button>
    </li>
<? endforeach; ?>
<?php }?>


