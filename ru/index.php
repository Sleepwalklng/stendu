<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("1С-Битрикс: Управление сайтом");


$MY_HL_BLOCK_ID = 3;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
$rsData = $entity_data_class::getList(array(
   'select' => array('*'),
   'order' => array('UF_TRANSPORT_MARK' => 'ASC'),
   'filter' => array('UF_PREMIUM' => "1")
));
while($el = $rsData->fetch()){
    $resList[] = $el;
}


function nameMark($id) {
  $MY_HL_BLOCK_ID6 = 6;
  CModule::IncludeModule('highloadblock');
  $entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID6);
  $rsData = $entity_data_class::getList(array(
     'select' => array('UF_TRANSPORT_MARK_NAME'),
     'order' => array('UF_TRANSPORT_MARK_NAME' => 'ASC'),
     'filter' => array('ID' => $id)
  ));
  while($el = $rsData->fetch()){
      $res[] = $el['UF_TRANSPORT_MARK_NAME'];
  }

  return $res['0'];

}
?>



  <div class="inner"></div>

  <main class="main">
    <section class="banner">
      <div class="container">
        <div class="banner__inner">
          <div class="banner__left">
            <div class="banner__title title">
              Доска бесплатных объявлений
            </div>

            <div class="banner__text">
              Здесь удобно искать товары и услуги, недвижимость и работу в несколько кликов!
            </div>

            <!--<a class="banner__link link" href="#">
              <span class="link__text">Все объявления</span>

              <div class="link__btn"></div>
            </a>-->
          </div>

          <img class="banner__img" src="<?= SITE_TEMPLATE_PATH ?>/images/banner-bg1.png" alt="">

          <div class="banner__benefits">
            <div class="banner__like">
              <img class="banner__like-img" src="<?= SITE_TEMPLATE_PATH ?>/images/like.svg" alt="">
            </div>

            <div class="banner__subtitle">
              Наши преимущества
            </div>

            <ul class="banner__list">
              <li class="banner__item">
                1 млн аудитория
              </li>

              <li class="banner__item">
                Публикация бесплатно
              </li>

              <li class="banner__item">
                Активно до 100 дней
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

      <? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"mainpage_slider", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "SORT",
			2 => "PREVIEW_TEXT",
			3 => "PREVIEW_PICTURE",
			4 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "Raznoe",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "round",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "mainpage_slider"
	),
	false
); ?>

  

    <div class="blurbs">
      <div class="container">
        <div class="blurbs__inner">
          <div class="blurb">
            <a class="blurb__ref" href="#">
              <img class="blurb__img" src="<?= SITE_TEMPLATE_PATH ?>/images/blurb1.jpg" alt="">

              <div class="blurb__content">
                <div class="blurb__title">
                  Разные черты внедорожного характера
                </div>

                <div class="blurb__text">
                  Автомобили в наличии в салонах официальных диллеров Chevrolet
                </div>
              </div>
            </a>
          </div>

          <div class="blurb">
            <a class="blurb__ref" href="#">
              <img class="blurb__img" src="<?= SITE_TEMPLATE_PATH ?>/images/blurb1.jpg" alt="">

              <div class="blurb__content">
                <div class="blurb__title">
                  Разные черты внедорожного характера
                </div>

                <div class="blurb__text">
                  Автомобили в наличии в салонах официальных диллеров Chevrolet
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="blurb blurb--large">
          <img class="blurb__img" src="<?= SITE_TEMPLATE_PATH ?>/images/blurb2.jpg" alt="">

          <div class="blurb__content">
            <div class="blurb__title">
              Разные черты внедорожного характера
            </div>

            <div class="blurb__text">
              Автомобили в наличии в салонах официальных диллеров Chevrolet
            </div>

            <a class="blurb__link" href="#">
              <span class="blurb__link-text">Подробнее</span>

              <img class="blurb__link-img" src="<?= SITE_TEMPLATE_PATH ?>/images/arrow-blue.svg " alt="Подробнее">
            </a>
          </div>
        </div>
      </div>
    </div>

    <section class="recomendation">
      <div class="container">
        <div class="recomendation__title title">
          Рекомендации для вас
        </div>

        <div class="recomendation__inner">
          <ul class="recomendation__items">

            <? foreach ($resList as $item) { ?>
            <li class="recomendation__item cart">
              <div class="cart__top swiper-container">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">

                    <? foreach ($item['UF_TRANSPORT_IMAGES'] as $image) { ?>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= CFile::GetPath($image) ?>" alt="">
                    </li>
                    <? } ?>


                  </ul>

                  <div class="cart__pagination"></div>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      <?= $item['UF_TRANSPORT_NAME'] ?>
                    </div>

                    <div class="cart__cost">
                      <?= $item['UF_TRANSPORT_PRICE'] ?>
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      <?= $item['UF_TRANSPORT_ADDRESS'] ?>
                    </div>

                    <div class="cart__date">
                      12 июня 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    <?= $item['UF_TRANSPORT_DESC'] ?>
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">
                    Написать
                  </a>

                  <a class="cart__favorite" href="#" onclick=''>
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>
            <? } ?>

            <!--<li class="recomendation__item cart">
              <div class="cart__top">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                    </li>

                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                    </li>

                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                    </li>

                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                    </li>
                  </ul>

                  <div class="cart__pagination"></div>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      Jaguar I-Pace, 2021
                    </div>

                    <div class="cart__cost">
                      10 000
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      Рига
                    </div>

                    <div class="cart__date">
                      14 сентября 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал..
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                    Написать
                  </a>

                  <a class="cart__favorite" href="#">
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>

            <li class="recomendation__item cart cart--active">
              <div class="cart__top">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                    </li>

                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                    </li>

                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                    </li>

                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                    </li>
                  </ul>

                  <div class="cart__pagination"></div>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      Женские кроссовки Nike air Force
                    </div>

                    <div class="cart__cost">
                      10 000
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      Рига
                    </div>

                    <div class="cart__date">
                      14 сентября 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал..
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                    Написать
                  </a>

                  <a class="cart__favorite" href="#">
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>

            <li class="recomendation__item cart cart--large">
              <div class="cart__top">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large1.jpg" alt="">
                    </li>

                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large2.jpg" alt="">
                    </li>

                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large3.jpg" alt="">
                    </li>

                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large1.jpg" alt="">
                    </li>

                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large2.jpg" alt="">
                    </li>

                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large3.jpg" alt="">
                    </li>
                  </ul>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      Opel Vivaro, 2021
                    </div>

                    <div class="cart__cost">
                      2 106 900
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      Рига
                    </div>

                    <div class="cart__date">
                      14 сентября 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал..
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                    Написать
                  </a>

                  <a class="cart__favorite" href="#">
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>

            <li class="recomendation__item cart">
              <div class="cart__top">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                    </li>
                  </ul>

                  <div class="cart__pagination"></div>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      Женские кожаные сумки Boyy c ручками
                    </div>

                    <div class="cart__cost">
                      10 000
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      Рига
                    </div>

                    <div class="cart__date">
                      14 сентября 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал..
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                    Написать
                  </a>

                  <a class="cart__favorite" href="#">
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>

            <li class="recomendation__item cart">
              <div class="cart__top">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                    </li>
                  </ul>

                  <div class="cart__pagination"></div>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      1-к. квартира, 18 м², 3/11 эт.
                    </div>

                    <div class="cart__cost">
                      11 000 000
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      Рига
                    </div>

                    <div class="cart__date">
                      14 сентября 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал..
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                    Написать
                  </a>

                  <a class="cart__favorite" href="#">
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>

            <li class="recomendation__item cart">
              <div class="cart__top">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                    </li>
                  </ul>

                  <div class="cart__pagination"></div>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      Jaguar I-Pace, 2021
                    </div>

                    <div class="cart__cost">
                      10 000
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      Рига
                    </div>

                    <div class="cart__date">
                      14 сентября 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал..
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                    Написать
                  </a>

                  <a class="cart__favorite" href="#">
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>

            <li class="recomendation__item cart cart--active">
              <div class="cart__top">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                    </li>
                  </ul>

                  <div class="cart__pagination"></div>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      Женские кроссовки Nike air Force
                    </div>

                    <div class="cart__cost">
                      10 000
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      Рига
                    </div>

                    <div class="cart__date">
                      14 сентября 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал..
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                    Написать
                  </a>

                  <a class="cart__favorite" href="#">
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>

            <li class="recomendation__item cart cart--large">
              <div class="cart__top">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large1.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large2.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large3.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large1.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large2.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper-large3.jpg" alt="">
                    </li>
                  </ul>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      Opel Vivaro, 2021
                    </div>

                    <div class="cart__cost">
                      2 106 900
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      Рига
                    </div>

                    <div class="cart__date">
                      14 сентября 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал..
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                    Написать
                  </a>

                  <a class="cart__favorite" href="#">
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>

            <li class="recomendation__item cart">
              <div class="cart__top">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                    </li>
                  </ul>

                  <div class="cart__pagination"></div>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      Женские кожаные сумки Boyy c ручками
                    </div>

                    <div class="cart__cost">
                      10 000
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      Рига
                    </div>

                    <div class="cart__date">
                      14 сентября 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал..
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                    Написать
                  </a>

                  <a class="cart__favorite" href="#">
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>

            <li class="recomendation__item cart">
              <div class="cart__top">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                    </li>
                  </ul>

                  <div class="cart__pagination"></div>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      Jaguar I-Pace, 2021
                    </div>

                    <div class="cart__cost">
                      10 000
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      Рига
                    </div>

                    <div class="cart__date">
                      14 сентября 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал..
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                    Написать
                  </a>

                  <a class="cart__favorite" href="#">
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>

            <li class="recomendation__item cart">
              <div class="cart__top">
                <div class="cart__inner">
                  <ul class="cart__list swiper-wrapper">
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg" alt="">
                    </li>
                    <li class="cart__box swiper-slide">
                      <img class="cart__img" src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg" alt="">
                    </li>
                  </ul>

                  <div class="cart__pagination"></div>
                </div>
              </div>

              <div class="cart__line"></div>

              <div class="cart__bottom">
                <div class="cart__wrapper">
                  <div class="cart__left">
                    <div class="cart__subtitle">
                      1-к. квартира, 18 м², 3/11 эт.
                    </div>

                    <div class="cart__cost">
                      11 000 000
                    </div>
                  </div>

                  <div class="cart__right">
                    <div class="cart__location">
                      <img class="cart__location-img" src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg" alt="местоположение">

                      Рига
                    </div>

                    <div class="cart__date">
                      14 сентября 10:29
                    </div>
                  </div>
                </div>


                <div class="cart__info">
                  <div class="cart__text">
                    Своевременное обслуживание. Пройдено ТО. Весь комплект ключей и документов. Птс оригинал..
                  </div>

                  <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg" alt="Написать">

                    Написать
                  </a>

                  <a class="cart__favorite" href="#">
                    <img class="cart__favorite-img" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg" alt="добавить в избранное">
                    <img class="cart__favorite-img cart__favorite-img--active" src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                      alt="добавить в избранное">
                  </a>
                </div>
              </div>
            </li>-->
          </ul>

          <div class="recomendation__advertising advertising">
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

            <div class="advertising__other advertising-block">
              <a class="advertising__other-link" href="#">
                <div class="advertising__other-wrapper">
                  <img class="advertising__other-img" src="<?= SITE_TEMPLATE_PATH ?>/images/advertising-img.png" alt="фото рекламы">
                </div>

                <div class="advertising__other-content">
                  <div class="advertising__other-title">
                    Stendū вакансии
                  </div>

                  <div class="advertising__other-text">
                    Тысячи предложений о работе рядом с домом!
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>