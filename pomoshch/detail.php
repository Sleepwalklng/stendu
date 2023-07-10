<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Помощь");
CModule::IncludeModule("iblock");


$resList = array();
$res = CIBlockElement::GetList(
        array('NAME' => "ASC"),
        array('IBLOCK_ID' => 6, 'CODE' => $_REQUEST['ELEMENT_CODE']),
        false,
        false,
        array('ID', 'NAME', 'PROPERTY_ZAGOLOVOK1', 'PROPERTY_ZAGOLOVOK2', 'PROPERTY_ZAGOLOVOK3', 'PROPERTY_TEXT1', 'PROPERTY_TEXT2', 'PROPERTY_TEXT3'));
while ($item = $res->GetNext()) {
    $resList[] = $item;
}

?>


  <div class="inner inner--help"></div>

  <main class="main main--hidden">
    <div class="breadcrumbs">
      <div class="container">
        <ul class="breadcrumbs__list breadcrumbs__list--">
          <li class="breadcrumbs__item">
            <a href="/pomoshch" class="breadcrumbs__link">
              Помощь
            </a>
          </li>


          <li class="breadcrumbs__item">
            <a href="#" class="breadcrumbs__link">
              <?= $resList['0']['NAME'] ?>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <section class="help">
      <div class="container">
        <div class="help__inner">
          <div class="help__unswer">
            <div class="help__unswer-title">
              <?= $resList['0']['PROPERTY_ZAGOLOVOK1_VALUE'] ?>
            </div>

            <div class="help__unswer-text">
              	<?= $resList['0']['~PROPERTY_TEXT1_VALUE']['TEXT'] ?>
            </div>
          </div>

					<!-- баннер -->
          <div class="help__advertising advertising">
            <div class="advertising__our advertising-block">
              <div class="advertising__our-inner">

                <div class="advertising__our-title">
                  Снижаем цены на приоритетные объявления
                </div>
            
                <div class="advertising__our-text">
                  Публиковать объявления теперь еще выгоднее! Показы чаще, продажи быстрее
                </div>
            
                <a class="advertising__our-link link link--white">
                  <span class="link__text">Подробнее</span>
            
                  <div class="link__btn"></div>
                </a>
              </div>
            
              <img class="advertising__our-img" src="<?= SITE_TEMPLATE_PATH ?>/images/advertising-star.png" alt="">
            </div>
          </div>


          
          <div class="help__unswer">
            <div class="help__unswer-title">
              <?= $resList['0']['PROPERTY_ZAGOLOVOK2_VALUE'] ?>
            </div>
          
            <div class="help__unswer-text">
              <?= $resList['0']['~PROPERTY_TEXT2_VALUE']['TEXT'] ?>
            </div>
          </div>





        </div>
      </div>
    </section>
  </main>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>