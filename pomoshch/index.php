<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Помощь");
CModule::IncludeModule("iblock");
?>

<div class="inner inner--help"></div>

<main class="main main--hidden">
    <section class="help">
        <div class="container">
            <div class="help__title help__title--center">
                Помощь
            </div>

            <form class="help__search " action="#">
                <input class="help__search-input" type="text" name="SEARCH" placeholder="Поиск по вопросам..">

                <button type="submit" class="help__search-btn" href="#">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/search.svg" alt="Найти" class="help__search-img">

                    <span>Найти</span>
                </button>
            </form>


            <ul class="search_help help__items">
    <? $razdHead = CIBlockSection::GetList(array("SORT" => "ASC"),
    array('IBLOCK_ID' => 6, 'ACTIVE' => 'Y'), true);


while ($arRazdel = $razdHead->GetNext()) { ?>

    <li class="help__item">
            <div class="help__subtitle">
              <?= $arRazdel['NAME'] ?>
            </div>

          <ul class="help__list">

				<? $res = CIBlockElement::GetList(
                    array('SORT' => "ASC"),
                    array('IBLOCK_ID' => 6, 'ACTIVE' => 'Y', 'SECTION_ID' => $arRazdel['ID']),
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
            </ul>
        </div>
    </section>
</main>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
