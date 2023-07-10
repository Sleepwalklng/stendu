<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
CModule::IncludeModule('main');
CModule::IncludeModule('search');
$obSearch = new CSearch;
$obSearch->Search(array(
    'QUERY' => "%".$_POST['SEARCH']."%  ",
    'SITE_ID' => 's1',
    'MODULE_ID' => 'iblock',
    'PARAM1' => 'Raznoe',
    'PARAM2' => array(6)
));
$obSearch->Statistic = new CSearchStatistic($obSearch->strQueryText, $obSearch->strTagsText);
$obSearch->Statistic->PhraseStat($obSearch->NavRecordCount, $obSearch->NavPageNomer);

$catalog_array = [];
while ($arSearch = $obSearch->GetNext()) {
    $catalog_array[] = $arSearch['ITEM_ID'];

}
if (!count($catalog_array) && !empty($_POST['SEARCH'])) {
    ?>
    <style>.help__items {
            display: block
        }</style><?php
    echo "<h2 style='text-align: center; font-size: 150%'>По вашему запросу ничего не найдено!</h2>";
} else {
    $section_array = [];
    $section_lists = CIBlockElement::GetList(
        array('SORT' => "ASC"),
        array('IBLOCK_ID' => 6, 'ACTIVE' => 'Y', 'ID'=>$catalog_array),
        false,
        false,
        array('ID', 'NAME', 'DETAIL_PAGE_URL'));
    while ($section_list = $section_lists->GetNext()) {
//        print_r($section_list);
        $section_array[] = $section_list['~IBLOCK_SECTION_ID'];
    }
    $razdHead = CIBlockSection::GetList(array("SORT" => "ASC"),
        array('IBLOCK_ID' => 6, 'ACTIVE' => 'Y','ID'=> array_unique($section_array)), true);


    while ($arRazdel = $razdHead->GetNext()) { ?>

        <li class="help__item">
            <div class="help__subtitle">
                <?= $arRazdel['NAME'] ?>
            </div>

            <ul class="help__list">

                <? $res = CIBlockElement::GetList(
                    array('SORT' => "ASC"),
                    array('IBLOCK_ID' => 6, 'ACTIVE' => 'Y', 'SECTION_ID' => $arRazdel['ID'],'ID' =>$catalog_array ),
                    false,
                    false,
                    array('ID', 'NAME', 'DETAIL_PAGE_URL'));
                while ($item = $res->GetNext()) { ?>


                    <li class="help__case">
                        <a class="help__link" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                            <?= $item['NAME'] ?>
                        </a>
                    </li>

                <? } ?>

            </ul>

            <div class="help__wrapper">

                <img class="help__item-img" src="<?= CFile::GetPath($arRazdel['PICTURE']) ?>" alt="">
            </div>
        </li>

    <? } ?>

    <li class="help__item help__item--support">
        <div class="help__subtitle">
            Служба поддержки
        </div>

        <div class="help__item-text">
            Если вы не нашли решение, напишите в службу поддержки — мы ответим в течение 4 часов. Для
            профессиональных пользователей ответ может занять до 6 суток.
        </div>

        <a class="help__support" href="#">
            Задать вопрос
        </a>

        <div class="help__wrapper">

            <img class="help__item-img" src="<?= SITE_TEMPLATE_PATH ?>/images/help12.png" alt="">
        </div>
    </li>
<?php } ?>