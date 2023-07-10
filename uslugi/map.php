<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Услуги");

use lib\GetUserData;

global $USER;
$ID_user = $USER->GetID();
const MY_HL_BLOCK_ID_TYPES_USLUG = 7;
$entity_data_class_type_uslugi = GetEntityDataClass(MY_HL_BLOCK_ID_TYPES_USLUG);
$rsData = $entity_data_class_type_uslugi::getList(array());
while ($el = $rsData->fetch()) {
    $arTypes[] = $el;
}
?>
<?php
// Получение услуг
const MY_HL_BLOCK_ID_USLUGI = 1;
$entity_data_class_uslugi = GetEntityDataClass(MY_HL_BLOCK_ID_USLUGI);
$rsUslugi = $entity_data_class_uslugi::getList(array("select" => array("*"),
    "order" => array("ID" => "DESC"),
    "filter" => array("UF_STATUS" => "29"),));
while ($usl = $rsUslugi->fetch()) {
    $usl['UF_PRICE'] = format_price($usl['UF_PRICE']);
    $arUslugi[] = $usl;
};


// избранное
if ($USER->IsAuthorized()) {

    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();
    $arElements = $arUser['UF_FAVOR'];

    foreach ($arElements as $item) {
        $el = explode("-", $item);
        if ($el['0'] == '4') {
            $resultFav[] = $el['1'];
        }
    }
}


?>

    <main class="main main--hidden">
        <section class="property-map">
            <div class="property-map__top">

                <div class="dropdown property-map__link">
                    <span class="dropdown-btn">Услуги</span>
                    <ul class="dropdown-list">
                        <?php foreach ($arTypes as $type): ?>
                            <li class="dropdown-item"><?= $type['UF_NAME'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="dropdown property-map__link">
                    <span class="dropdown-btn">Цена</span>
                    <ul class="dropdown-list">
                        <li class="dropdown-item">
                            <input type="text" placeholder="От"/>
                        </li>
                        <li class="dropdown-item">
                            <input type="text" placeholder="До"/>
                        </li>
                    </ul>
                </div>

                <form class="property-map__search" action="#">
                    <input class="property-map__input" type="text" placeholder="Город, адрес, район, ж/д, шоссе или ЖК">

                    <a class="property-map__search-btn" href="#">
                        <svg viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M8.11 14.4856C11.7606 14.4856 14.72 11.5262 14.72 7.87562C14.72 4.22502 11.7606 1.26562 8.11 1.26562C4.4594 1.26562 1.5 4.22502 1.5 7.87562C1.5 11.5262 4.4594 14.4856 8.11 14.4856Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.1103 15.8769L14.7188 14.4854" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </a>
                </form>
            </div>

            <div  id="catalog" class="wrapper-filter property-map__inner">
                <div class="property-map__left">
                    <div class="property-map__amount">
                        <span class="property-map__num"> <?= count($arUslugi); ?></span> объявления
                    </div>

                    <ul class="property-map__list">
                        <? foreach ($arUslugi as $arItem): ?>

                            <li class="property-map__cart cart <? if (in_array($arItem['ID'], $resultFav)) {
                                echo 'cart--favorite';
                            } ?>">
                                <div class="cart__top">
                                    <div class="cart__inner">
                                        <? if (!empty($arItem['UF_PHOTO'])): ?>
                                            <ul class="cart__list swiper-wrapper">
                                                <?php foreach ($arItem['UF_PHOTO'] as $photo): ?>
                                                    <li class="cart__box swiper-slide">
                                                        <img class="cart__img" src="<?= CFile::GetPath($photo) ?>"
                                                             alt="">
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <div class="cart__pagination"></div>
                                    </div>
                                </div>

                                <div class="cart__line"></div>

                                <div class="cart__bottom">
                                    <div class="cart__wrapper">
                                        <div class="cart__left">
                                            <div class="cart__subtitle">
                                                <?= $arItem['UF_NAME'] ?? ''; ?>
                                            </div>

                                            <div class="cart__cost">
                                                <?= $arItem['UF_PRICE'] ?? '' ?>
                                            </div>
                                        </div>

                                        <div class="cart__right">
                                            <div class="cart__location">
                                                <img class="cart__location-img"
                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg"
                                                     alt="местоположение">

                                                <?= $arItem['UF_ADRES'] ?? '' ?>
                                            </div>
                                        </div>

                                        <a class="cart__favorite" href="#"  data-item="<?= $arItem['ID'] ?>" data-razdel="4">
                                                <img class="cart__favorite-img"
                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg"
                                                     alt="добавить в избранное">
                                                <img class="cart__favorite-img cart__favorite-img--active"
                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                                                     alt="добавить в избранное">
                                        </a>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div id="map"></div>
            </div>
        </section>
    </main>
    <div class="announcement-modal">
        <div class="announcement-modal__inner">
            <div class="announcement-modal__left">
                <img class="announcement-modal__img"
                     src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/appearance-photo.png" alt="">
            </div>

            <div class="announcement-modal__boundary"></div>

            <div class="announcement-modal__right">
                <div class="announcement-modal__title">
                    Пользователь увдит объявление <span>Часы Tangente Sport Neomatik Automatic</span> сразу после
                    проверки.
                </div>

                <div class="announcement-modal__text">
                    Обычно она занимает пару минут, в редких случаях нам нужно больше времени.
                </div>

                <a class="announcement-modal__up href=" #"">
                Поднять просмотры
                </a>

                <a class="announcement-modal__close" href="#"></a>
            </div>
        </div>
    </div>

    <div class="categories-modal">
        <div class="categories-modal__inner">
            <div class="categories-modal__left">
                <ul class="categories-modal__items">
                    <li class="categories-modal__item">
                        <button class="categories-modal__btn categories-modal__btn--active link" type="button">
                            <span class="link__text">Авто</span>

                            <div class="link__btn"></div>
                        </button>
                    </li>
                    <li class="categories-modal__item">
                        <button class="categories-modal__btn link" type="button">
                            <span class="link__text">Недвижимость</span>

                            <div class="link__btn"></div>
                        </button>
                    </li>
                    <li class="categories-modal__item">
                        <button class="categories-modal__btn link" type="button">
                            <span class="link__text">Личные вещи</span>

                            <div class="link__btn"></div>
                        </button>
                    </li>
                    <li class="categories-modal__item">
                        <button class="categories-modal__btn link" type="button">
                            <span class="link__text">Услуги</span>

                            <div class="link__btn"></div>
                        </button>
                    </li>
                    <li class="categories-modal__item">
                        <button class="categories-modal__btn link" type="button">
                            <span class="link__text">Работа</span>

                            <div class="link__btn"></div>
                        </button>
                    </li>
                </ul>
            </div>

            <div class="categories-modal__right">
                <ul class="categories-modal__list categories-modal__list--active">
                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category1.png"
                                 alt="">

                            <div class="categories-modal__text">
                                Легковые авто
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category2.png"
                                 alt="">

                            <div class="categories-modal__text">
                                Запчасти и аксессуары
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category3.png"
                                 alt="">

                            <div class="categories-modal__text">
                                Мото
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category4.png"
                                 alt="">

                            <div class="categories-modal__text">
                                Коммерческий транспорт
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category5.png"
                                 alt="">

                            <div class="categories-modal__text">
                                Водный транспорт
                            </div>
                        </a>
                    </li>
                </ul>

                <ul class="categories-modal__list">
                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category2.png"
                                 alt="">

                            <div class="categories-modal__text">
                                Запчасти и аксессуары
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category3.png"
                                 alt="">

                            <div class="categories-modal__text">
                                Мото
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category4.png"
                                 alt="">

                            <div class="categories-modal__text">
                                Коммерческий транспорт
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="<?= SITE_TEMPLATE_PATH ?>/images/data-category5.png"
                                 alt="">

                            <div class="categories-modal__text">
                                Водный транспорт
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="categories-modal__list">
                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img"
                                 src="<?= SITE_TEMPLATE_PATH ?>/  images/data-category1.png" alt="">

                            <div class="categories-modal__text">
                                Легковые авто
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category2.png" alt="">

                            <div class="categories-modal__text">
                                Запчасти и аксессуары
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category3.png" alt="">

                            <div class="categories-modal__text">
                                Мото
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category4.png" alt="">

                            <div class="categories-modal__text">
                                Коммерческий транспорт
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="categories-modal__list">
                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category1.png" alt="">

                            <div class="categories-modal__text">
                                Легковые авто
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category2.png" alt="">

                            <div class="categories-modal__text">
                                Запчасти и аксессуары
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category4.png" alt="">

                            <div class="categories-modal__text">
                                Коммерческий транспорт
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category5.png" alt="">

                            <div class="categories-modal__text">
                                Водный транспорт
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="categories-modal__list">
                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category1.png" alt="">

                            <div class="categories-modal__text">
                                Легковые авто
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category2.png" alt="">

                            <div class="categories-modal__text">
                                Запчасти и аксессуары
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category3.png" alt="">

                            <div class="categories-modal__text">
                                Мото
                            </div>
                        </a>
                    </li>

                    <li class="categories-modal__elem">
                        <a href="#" class="categories-modal__link">
                            <img class="categories-modal__img" src="images/data-category5.png" alt="">

                            <div class="categories-modal__text">
                                Водный транспорт
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script>
        ymaps.ready(function () {
            myMapRest = new ymaps.Map('map', {
                center: [<?= $arUslugi['0']['UF_ADRES_CODE'] ?>],
                zoom: 10,
                controls: [],
                behaviors: ['default', 'scrollZoom']
            });
            myMapRest.controls.add('zoomControl');
            // Создаем собственный макет с информацией о выбранном геообъекте.
            customBalloonContentLayout = ymaps.templateLayoutFactory.createClass([
                '<ul class=list>',
                // Выводим в цикле список всех геообъектов.
                '{% for geoObject in properties.geoObjects %}',
                '<li><a href=# data-placemarkid="{{ geoObject.properties.placemarkId }}" class="list_item">{{ geoObject.properties.balloonContentBody|raw }}</a></li>',
                '{% endfor %}',
                '</ul>'
            ].join(''));

            myCollection = new ymaps.Clusterer({
                clusterOpenBalloonOnClick: true,
                clusterBalloonPanelMaxMapArea: 0,
                clusterBalloonMaxHeight: 200,
                clusterBalloonContentLayout: customBalloonContentLayout
            });

            // Заполняем кластер геообъектами
            var placemarks = [];

            <?foreach ($arUslugi as $item) {
            if($item['UF_ADRES_CODE']){ ?>
            <?foreach($arTypes as $arUrlMap):?>
            <?if($item['UF_TYPE_USLUGI'] == $arUrlMap['ID']):
            $urlmap = $arUrlMap['UF_SESSION_CODE'];
        endif;?>
            <?endforeach?>

            myPlacemark = new ymaps.Placemark([<?=$item['UF_ADRES_CODE']?>],
                { balloonContentBody: '<div class="map-block-item">' +
                        '<a href="/uslugi/<?= $urlmap;?>/<?= $item['UF_SESSION_CODE'];?>"><div class="map-block-item-cont">' +
                        '<div class="map-block-item-cont-text">' +
                        '<ul><li><?=$item["UF_NAME"]?></li>' +
                        '<li><?= $item['UF_PRICE'].' ₽'?></li>' +
                        '</ul></div></div> </a>' +
                        '</div>'},
                {   hintContent: "<?= $item['UF_NAME'] ?>" ,
                    iconLayout: 'default#image',
                    iconImageHref: '<?= SITE_TEMPLATE_PATH ?>/images/map-marker.svg',
                    iconImageSize: [27, 27],
                    iconImageOffset: [-25, -25]
                }
            );

            placemarks.push(myPlacemark);

            <? } } ?>


            myCollection.add(placemarks);
            myMapRest.geoObjects.add(myCollection);
        });



    </script>

    <form class="map-filter">
        <div class="map-filter__inner">
            <a href="#" class="map-filter__close">

            </a>

            <div class="map-filter__title">
                Еще фильтры
            </div>

            <ul class="map-filter__items">
                <li class="map-filter__item">
                    <div class="map-filter__subtitle">
                        Тип сделки
                    </div>

                    <label class="map-filter__label">
                        <input class="map-filter__checkbox" type="checkbox">

                        <span class="map-filter__checkbox-text">
              От собственника
            </span>
                    </label>
                </li>

                <li class="map-filter__item">
                    <div class="map-filter__subtitle">
                        Вид объекта
                    </div>

                    <ul class="map-filter__list">
                        <li class="map-filter__elem">
                            <label class="map-filter__label">
                                <input class="map-filter__radio" name="kind" type="radio">

                                <span class="map-filter__radio-text">
                  Все
                </span>
                            </label>
                        </li>

                        <li class="map-filter__elem">
                            <label class="map-filter__label">
                                <input class="map-filter__radio" name="kind" type="radio" checked>

                                <span class="map-filter__radio-text">
                  Вторичка
                </span>
                            </label>
                        </li>

                        <li class="map-filter__elem">
                            <label class="map-filter__label">
                                <input class="map-filter__radio" name="kind" type="radio">

                                <span class="map-filter__radio-text">
                  Новостройка
                </span>
                            </label>
                        </li>
                    </ul>
                </li>

                <li class="map-filter__item">
                    <div class="map-filter__subtitle">
                        Этаж
                    </div>

                    <input class="map-filter__number map-filter__number-min" placeholder="от" type="number">

                    <input class="map-filter__number map-filter__number--max" placeholder="до" type="number">

                    <label class="map-filter__label">
                        <input class="map-filter__checkbox" type="checkbox">

                        <span class="map-filter__checkbox-text">
              не первый
            </span>
                    </label>

                    <label class="map-filter__label">
                        <input class="map-filter__checkbox" type="checkbox">

                        <span class="map-filter__checkbox-text">
              не последний
            </span>
                    </label>
                </li>

                <li class="map-filter__item">
                    <div class="map-filter__subtitle">
                        Тип дома
                    </div>

                    <div class="map-filter__wrapper">
                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" type="checkbox">

                            <span class="map-filter__checkbox-text">
                Кирпичный
              </span>
                        </label>

                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" type="checkbox">

                            <span class="map-filter__checkbox-text">
                Панельный
              </span>
                        </label>

                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" type="checkbox">

                            <span class="map-filter__checkbox-text">
                Блочный
              </span>
                        </label>

                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" type="checkbox">

                            <span class="map-filter__checkbox-text">
                Монолитный
              </span>
                        </label>

                        <label class="map-filter__label">
                            <input class="map-filter__checkbox" type="checkbox">

                            <span class="map-filter__checkbox-text">
                Блочный
              </span>
                        </label>
                    </div>
                </li>
            </ul>

            <div class="map-filter__bottom">
                <input class="map-filter__submit" value="Показать объекты" type="submit">

                <input class="map-filter__reset" value="Сбросить фильтры" type="reset">
            </div>
        </div>
    </form>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>