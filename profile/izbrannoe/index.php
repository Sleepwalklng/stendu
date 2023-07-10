<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

global $USER;
$ID_user = $USER->GetID();
$filter = array(
    'ID' => $ID_user
);
$arParameters = array(
    'FIELDS' => array('ID', 'NAME', 'LAST_NAME', 'SECOND_NAME', 'EMAIL', 'PERSONAL_PHONE')
);
$rsUsers = CUser::GetList(($by = "ID"), ($order = "ASC"), $filter, $arParameters);
while ($arUser = $rsUsers->Fetch()) {
    $arUserID[] = $arUser;
}

// избранное
if ($USER->IsAuthorized()) {

    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();

    $arElements = $arUser['UF_FAVOR'];
    foreach ($arElements as $item) {
        $el = explode("-", $item);
        if ($el['0'] == '1') {
            $resultFav[3][] = $el['1'];
        }
        if ($el['0'] == '2') {
            $resultFav[2][] = $el['1'];
        }
        if ($el['0'] == '3') {
            $resultFav[11][] = $el['1'];
        }
        if ($el['0'] == '4') {
            $resultFav[1][] = $el['1'];
        }
        if ($el['0'] == '5') {
            $resultFav[13][] = $el['1'];
        }
    }
}

foreach ($resultFav as $key => $value):
    $entity_data_class_lich = GetEntityDataClass($key);
    $rsUslugi = $entity_data_class_lich::getList(array(
        "select" => array("*"),
        "order" => array("ID" => "DESC"),
        "filter" => array("ID" => $value) //Фильтрация выборки
    ));
    while ($usl = $rsUslugi->fetch()) {
        $usl['SECTION_ID'] = $key;
        $arLichnue[] = $usl;
    };
endforeach;


// Личные вещи
const MY_HL_BLOCK_ID_LICH = 13;
// Получение услуг
const MY_HL_BLOCK_ID_USLUGI = 1;
// недвижимость
const MY_HL_BLOCK_ID_NEDVIZHIMOST = 2;
const MY_HL_BLOCK_ID_WORK = 11;
const MY_HL_BLOCK_ID_RESUME = 17;
function getListHL($userId, $status, $HLID): array
{
    $arr = [];
    $entity_data_class = GetEntityDataClass($HLID);
    $rs = $entity_data_class::getList(array(
        "select" => array("*"),
        "order" => array("ID" => "DESC"),
        "filter" => array("UF_USER_ID" => $userId, 'UF_STATUS' => $status)
    ));
    while ($el = $rs->fetch()) {
        $arr[] = $el;
    }
    return $arr;
}

function getUserAdvert($userId): array
{
    $arLichnue = getListHL($userId, 24, MY_HL_BLOCK_ID_LICH);
    $arUslugi = getListHL($userId, 29, MY_HL_BLOCK_ID_USLUGI);
    $arNedv = getListHL($userId, 84, MY_HL_BLOCK_ID_NEDVIZHIMOST);
    $arWorks = getListHL($userId, 34, MY_HL_BLOCK_ID_WORK);
    $arResume = getListHL($userId, 49, MY_HL_BLOCK_ID_RESUME);

    $arAdvert = array_merge($arLichnue, $arUslugi, $arNedv, $arWorks, $arResume);
    return $arAdvert;
}

?>


<? if ($USER->IsAuthorized()) { ?>

    <div class="inner inner-none"></div>

    <!-- header -->
    <section class="admin-st">
        <div class="container">
            <div class="admin-st__wrapper">
                <div class="admin-st__left">
                    <div class="admin-st__sidebar">
                        <div class="admin-st__sidebar-top">
                            <div class="admin-st__sidebar-top-block">
                                <div class="admin-st__sidebar-top-image">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/admin-st/icon/avatar.svg" alt="avatar">
                                </div>
                                <!-- / image -->
                                <div class="admin-st__sidebar-top-icon">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/admin-st/icon/greenstar.svg" alt="star">
                                </div>
                                <!-- / icon -->
                            </div>
                            <!-- / block -->
                            <div class="admin-st__sidebar-top-name">
                                <?= $arUserID['0']['NAME'] ?>
                            </div>
                            <!-- /.admin-st__sidebar-top-name -->
                            <div class="admin-st__sidebar-top-reviews">
                                <div class="admin-st__sidebar-top-reviews-block">
                                    <div class="admin-st__sidebar-top-reviews-star">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/admin-st/icon/star.svg" alt="star">
                                    </div>
                                    <!-- star -->
                                    <div class="admin-st__sidebar-top-reviews-number">
                                        5.0
                                    </div>
                                    <!-- number -->
                                </div>
                                <!-- block -->
                                <div class="admin-st__sidebar-top-reviews-text">
                                    26 отзывов
                                </div>
                                <!-- text -->
                            </div>
                            <!-- reviews -->
                        </div>
                        <!-- top -->
                        <div class="admin-st__sidebar-bottom article__size js-open-size">
                            <div class="article__top">
                <span class="js-size">
                  <div class="key">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M22 8.52V3.98C22 2.57 21.36 2 19.77 2H15.73C14.14 2 13.5 2.57 13.5 3.98V8.51C13.5 9.93 14.14 10.49 15.73 10.49H19.77C21.36 10.5 22 9.93 22 8.52Z"/>
                      <path
                              d="M22 19.77V15.73C22 14.14 21.36 13.5 19.77 13.5H15.73C14.14 13.5 13.5 14.14 13.5 15.73V19.77C13.5 21.36 14.14 22 15.73 22H19.77C21.36 22 22 21.36 22 19.77Z"/>
                      <path
                              d="M10.5 8.52V3.98C10.5 2.57 9.86 2 8.27 2H4.23C2.64 2 2 2.57 2 3.98V8.51C2 9.93 2.64 10.49 4.23 10.49H8.27C9.86 10.5 10.5 9.93 10.5 8.52Z"/>
                      <path
                              d="M10.5 19.77V15.73C10.5 14.14 9.86 13.5 8.27 13.5H4.23C2.64 13.5 2 14.14 2 15.73V19.77C2 21.36 2.64 22 4.23 22H8.27C9.86 22 10.5 21.36 10.5 19.77Z"/>
                    </svg>
                  </div>
                  <div class="text">Мои объявления</div>
                </span>
                                <button>
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/arrowbrek.svg" alt="">
                                </button>
                            </div>
                            <ul class="admin-st__sidebar-list">
                                <div class="admin-st__sidebar-button-mob">

                                </div>
                                <li class="admin-st__sidebar-item"><!-- sidebar-item-js -->
                                    <a href="/profile" class="admin-st__link">
                                        <div class="key">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M22 8.52V3.98C22 2.57 21.36 2 19.77 2H15.73C14.14 2 13.5 2.57 13.5 3.98V8.51C13.5 9.93 14.14 10.49 15.73 10.49H19.77C21.36 10.5 22 9.93 22 8.52Z"/>
                                                <path
                                                        d="M22 19.77V15.73C22 14.14 21.36 13.5 19.77 13.5H15.73C14.14 13.5 13.5 14.14 13.5 15.73V19.77C13.5 21.36 14.14 22 15.73 22H19.77C21.36 22 22 21.36 22 19.77Z"/>
                                                <path
                                                        d="M10.5 8.52V3.98C10.5 2.57 9.86 2 8.27 2H4.23C2.64 2 2 2.57 2 3.98V8.51C2 9.93 2.64 10.49 4.23 10.49H8.27C9.86 10.5 10.5 9.93 10.5 8.52Z"/>
                                                <path
                                                        d="M10.5 19.77V15.73C10.5 14.14 9.86 13.5 8.27 13.5H4.23C2.64 13.5 2 14.14 2 15.73V19.77C2 21.36 2.64 22 4.23 22H8.27C9.86 22 10.5 21.36 10.5 19.77Z"/>
                                            </svg>
                                        </div>
                                        <div class="text">Мои объявления</div>
                                    </a>
                                </li>
                                <!-- /.admin-st__sidebar-item -->
                                <li class="admin-st__sidebar-item"><!-- sidebar-item-js -->
                                    <a href="/profile/otzyvy" class="admin-st__link">
                                        <div class="key">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M8.39062 18.4902V8.33022C8.39062 7.93022 8.51062 7.54022 8.73062 7.21022L11.4606 3.15022C11.8906 2.50022 12.9606 2.04022 13.8706 2.38022C14.8506 2.71022 15.5006 3.81022 15.2906 4.79022L14.7706 8.06022C14.7306 8.36022 14.8106 8.63022 14.9806 8.84022C15.1506 9.03022 15.4006 9.15022 15.6706 9.15022H19.7806C20.5706 9.15022 21.2506 9.47022 21.6506 10.0302C22.0306 10.5702 22.1006 11.2702 21.8506 11.9802L19.3906 19.4702C19.0806 20.7102 17.7306 21.7202 16.3906 21.7202H12.4906C11.8206 21.7202 10.8806 21.4902 10.4506 21.0602L9.17062 20.0702C8.68062 19.7002 8.39062 19.1102 8.39062 18.4902Z"/>
                                                <path
                                                        d="M5.21 6.37988H4.18C2.63 6.37988 2 6.97988 2 8.45988V18.5199C2 19.9999 2.63 20.5999 4.18 20.5999H5.21C6.76 20.5999 7.39 19.9999 7.39 18.5199V8.45988C7.39 6.97988 6.76 6.37988 5.21 6.37988Z"/>
                                            </svg>
                                        </div>
                                        <div class="text">Мои отзывы</div>
                                    </a>
                                </li>
                                <!-- /.admin-st__sidebar-item -->
                                <li class="admin-st__sidebar-item sidebar-item-js"><!-- sidebar-item-js -->
                                    <a href="/profile/izbrannoe" class="admin-st__link">
                                        <div class="key">
                                            <svg viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M10.62 17.909C10.28 18.0303 9.72 18.0303 9.38 17.909C6.48 16.9079 0 12.7315 0 5.65281C0 2.52809 2.49 0 5.56 0C7.38 0 8.99 0.889888 10 2.26517C11.01 0.889888 12.63 0 14.44 0C17.51 0 20 2.52809 20 5.65281C20 12.7315 13.52 16.9079 10.62 17.909Z"/>
                                            </svg>
                                        </div>
                                        <div class="text">Избранное</div>
                                    </a>
                                </li>
                                <!-- /.admin-st__sidebar-item -->
                                <li class="admin-st__sidebar-item"><!-- sidebar-item-js -->
                                    <a href="/profile/uvedomleniya" class="admin-st__link">
                                        <div class="key">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M19.3419 13.3992L18.3419 11.7392C18.1319 11.3692 17.9419 10.6692 17.9419 10.2592V7.72918C17.9419 5.37918 16.5619 3.34918 14.5719 2.39918C14.0519 1.47918 13.0919 0.90918 11.9919 0.90918C10.9019 0.90918 9.9219 1.49918 9.4019 2.42918C7.4519 3.39918 6.1019 5.40918 6.1019 7.72918V10.2592C6.1019 10.6692 5.9119 11.3692 5.7019 11.7292L4.6919 13.3992C4.2919 14.0692 4.2019 14.8092 4.4519 15.4892C4.6919 16.1592 5.2619 16.6792 6.0019 16.9292C7.9419 17.5892 9.9819 17.9092 12.0219 17.9092C14.0619 17.9092 16.1019 17.5892 18.0419 16.9392C18.7419 16.7092 19.2819 16.1792 19.5419 15.4892C19.8019 14.7992 19.7319 14.0392 19.3419 13.3992Z"/>
                                                <path
                                                        d="M14.8297 18.9192C14.4097 20.0792 13.2997 20.9092 11.9997 20.9092C11.2097 20.9092 10.4297 20.5892 9.87969 20.0192C9.55969 19.7192 9.31969 19.3192 9.17969 18.9092C9.30969 18.9292 9.43969 18.9392 9.57969 18.9592C9.80969 18.9892 10.0497 19.0192 10.2897 19.0392C10.8597 19.0892 11.4397 19.1192 12.0197 19.1192C12.5897 19.1192 13.1597 19.0892 13.7197 19.0392C13.9297 19.0192 14.1397 19.0092 14.3397 18.9792C14.4997 18.9592 14.6597 18.9392 14.8297 18.9192Z"/>
                                            </svg>
                                        </div>
                                        <div class="text">Уведомления</div>
                                    </a>
                                </li>
                                <!-- /.admin-st__sidebar-item -->
                                <li class="admin-st__sidebar-item"><!-- sidebar-item-js -->
                                    <a href="/profile/chat" class="admin-st__link">
                                        <div class="key">
                                            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M15 0H5C2.24 0 0 2.23112 0 4.98249V10.9655V11.966C0 14.7174 2.24 16.9485 5 16.9485H6.5C6.77 16.9485 7.13 17.1286 7.3 17.3487L8.8 19.3397C9.46 20.2201 10.54 20.2201 11.2 19.3397L12.7 17.3487C12.89 17.0986 13.19 16.9485 13.5 16.9485H15C17.76 16.9485 20 14.7174 20 11.966V4.98249C20 2.23112 17.76 0 15 0ZM6 10.005C5.44 10.005 5 9.55478 5 9.0045C5 8.45423 5.45 8.004 6 8.004C6.55 8.004 7 8.45423 7 9.0045C7 9.55478 6.56 10.005 6 10.005ZM10 10.005C9.44 10.005 9 9.55478 9 9.0045C9 8.45423 9.45 8.004 10 8.004C10.55 8.004 11 8.45423 11 9.0045C11 9.55478 10.56 10.005 10 10.005ZM14 10.005C13.44 10.005 13 9.55478 13 9.0045C13 8.45423 13.45 8.004 14 8.004C14.55 8.004 15 8.45423 15 9.0045C15 9.55478 14.56 10.005 14 10.005Z"/>
                                            </svg>

                                        </div>
                                        <div class="text">Сообщения</div>
                                    </a>
                                </li>
                                <!-- /.admin-st__sidebar-item -->
                                <li class="admin-st__sidebar-item"><!-- sidebar-item-js -->
                                    <a href="/profile/nastroyki" class="admin-st__link">
                                        <div class="key">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M20.1 8.21994C18.29 8.21994 17.55 6.93994 18.45 5.36994C18.97 4.45994 18.66 3.29994 17.75 2.77994L16.02 1.78994C15.23 1.31994 14.21 1.59994 13.74 2.38994L13.63 2.57994C12.73 4.14994 11.25 4.14994 10.34 2.57994L10.23 2.38994C9.78 1.59994 8.76 1.31994 7.97 1.78994L6.24 2.77994C5.33 3.29994 5.02 4.46994 5.54 5.37994C6.45 6.93994 5.71 8.21994 3.9 8.21994C2.86 8.21994 2 9.06994 2 10.1199V11.8799C2 12.9199 2.85 13.7799 3.9 13.7799C5.71 13.7799 6.45 15.0599 5.54 16.6299C5.02 17.5399 5.33 18.6999 6.24 19.2199L7.97 20.2099C8.76 20.6799 9.78 20.3999 10.25 19.6099L10.36 19.4199C11.26 17.8499 12.74 17.8499 13.65 19.4199L13.76 19.6099C14.23 20.3999 15.25 20.6799 16.04 20.2099L17.77 19.2199C18.68 18.6999 18.99 17.5299 18.47 16.6299C17.56 15.0599 18.3 13.7799 20.11 13.7799C21.15 13.7799 22.01 12.9299 22.01 11.8799V10.1199C22 9.07994 21.15 8.21994 20.1 8.21994ZM12 14.2499C10.21 14.2499 8.75 12.7899 8.75 10.9999C8.75 9.20994 10.21 7.74994 12 7.74994C13.79 7.74994 15.25 9.20994 15.25 10.9999C15.25 12.7899 13.79 14.2499 12 14.2499Z"/>
                                            </svg>
                                        </div>
                                        <div class="text">Настройки</div>
                                    </a>
                                </li>
                                <!-- /.admin-st__sidebar-item -->
                            </ul>
                            <!-- sidebar-list -->
                        </div>
                        <!-- bottom -->
                    </div>
                    <!-- /.admin-st__sidebar -->
                </div>
                <!-- /.admin-st__left -->
                <div class="admin-st__right">


                    <div class="admin-st__right-block global-block-js">
                        <div class="admin-st__fav">
                            <div class="admin-st__title">
                                Избранное
                            </div>
                            <!-- /.admin-st__favourites-title -->
                            <ul class="admin-st__fav-lists">
                                <li class="admin-st__fav-lists-item fav-tab-js">
                                    <span>Объявления</span>
                                </li>
                                <li class="admin-st__fav-lists-item fav-tab-js">
                                    <span>Продавцы</span>
                                </li>
                                <!--                                <li class="admin-st__fav-lists-item fav-tab-js">-->
                                <!--                                    <span>Поиски</span>-->
                                <!--                                </li>-->
                            </ul>
                            <!-- /.admin-st__favourites-lists -->
                            <div class="admin-st__fav-content fav-content-js">
                                <div class="admin-st__not-block admin-st__not-block--heart">
                                    <div class="admin-st__not-block-image">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/admin-st/pocket.svg" alt="щит">
                                    </div>
                                    <div class="admin-st__not-block-text">
                                        У вас нет объявлений в этой вкладке
                                    </div>
                                </div>
                                <!-- блок с пустыми значениями -->
                                <div class="favorites_list">

                                    <? foreach ($arLichnue as $item) {
                                        ?>
                                        <div class="admin-st__fav-inner">
                                            <div class="admin-st__card">
                                                <div class="admin-st__card-left">
                                                    <div class="admin-st__card-image">
                                                        <?php if ($item['SECTION_ID'] == 1) { ?>
                                                            <img src="<?= CFile::GetPath($item['UF_PHOTO']['0']) ?>"
                                                                 alt="">
                                                        <?php } elseif ($item['SECTION_ID'] == 3) { ?>
                                                            <img src="<?= CFile::GetPath($item['UF_TRANSPORT_IMAGES']['0']) ?>"
                                                                 alt="">
                                                        <?php } elseif ($item['SECTION_ID'] == 11) { ?>
                                                            <img src="<?= CFile::GetPath($item['UF_PHOTO']) ?>" alt="">
                                                        <?php } else { ?>
                                                            <img src="<?= CFile::GetPath($item['UF_PHOTOS']['0']) ?>"
                                                                 alt="">
                                                        <?php } ?>


                                                    </div>
                                                    <!--    article-image -->
                                                </div>
                                                <!-- article-left -->
                                                <div class="admin-st__card-right">
                                                    <div class="admin-st__card-info">
                                                        <div class="admin-st__card-info-title">
                                                            Информация
                                                        </div>
                                                        <!-- /.admin-st__card-info-title -->
                                                        <div class="admin-st__card-info-name">
                                                            <?php
                                                            if ($item['SECTION_ID'] == 3) {
                                                                echo $item['UF_TRANSPORT_NAME'];
                                                            } else {
                                                                echo $item['UF_NAME'];
                                                            }
                                                            ?>

                                                        </div>
                                                        <!-- name -->
                                                        <div class="admin-st__card-info-geo">
                                                            <div class="admin-st__card-info-geo-icon">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/admin-st/icon/geo.svg"
                                                                     alt="гео">
                                                            </div>
                                                            <!-- geo -->
                                                            <div class="admin-st__card-info-geo-text">
                                                                <?php if ($item['SECTION_ID'] == 3) { ?>
                                                                    <?= $item['UF_TRANSPORT_ADDRESS'] ?>
                                                                <?php } elseif ($item['SECTION_ID'] == 11) { ?>
                                                                    <?= $item['UF_ADRES'] ?>
                                                                <?php } else { ?>
                                                                    <?= $item['UF_ADDRESS'] ?>
                                                                <?php } ?>
                                                            </div>
                                                            <!-- /.admin-st__card-info-geo-text -->

                                                        </div>
                                                        <!-- /.admin-st__card-info-geo -->
                                                        <div class="admin-st__card-info-price">
                                                            <?php if ($item['SECTION_ID'] == 3) {
                                                                echo $item['UF_TRANSPORT_PRICE'];
                                                            } else {
                                                                echo $item['UF_PRICE'];
                                                            } ?><span>₽</span>
                                                        </div>
                                                        <!-- /.admin-st__card-info-price -->
                                                    </div>
                                                    <!-- /.admin-st__card-info -->
                                                    <div class="admin-st__card-date">
                                                        <span>3 дня назад</span>
                                                    </div>
                                                    <!-- /.admin-st__card-date -->
                                                    <button class="admin-st__fav-button-heart admin-st__fav-button-heart--mobile delete_izbrannoye"
                                                            data-section="<?= $item['SECTION_ID'] ?>"
                                                            data-id="<?= $item['ID'] ?>">
                                                        <div class="admin-st__fav-button-heart-icon ">
                                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/heardw.svg"
                                                                 alt="сердце">
                                                        </div>
                                                        <!-- /.admin-st__fav-button-heart-icon -->
                                                        <div class="admin-st__fav-button-heart-text">
                                                            <span>Удалить </span>
                                                        </div>
                                                        <!-- /.admin-st__fav-button-heart-text -->
                                                    </button>
                                                </div>
                                                <!-- article-right -->
                                            </div>
                                            <!-- /.admin-st__card -->
                                            <button class="admin-st__fav-button-heart delete_izbrannoye"
                                                    data-section="<?= $item['SECTION_ID'] ?>"
                                                    data-id="<?= $item['ID'] ?>">
                                                <div class="admin-st__fav-button-heart-icon ">
                                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/heardw.svg" alt="сердце">
                                                </div>
                                                <!-- /.admin-st__fav-button-heart-icon -->
                                                <div class="admin-st__fav-button-heart-text">
                                                    <span>Удалить </span>
                                                    <span>из избранного</span>
                                                </div>
                                                <!-- /.admin-st__fav-button-heart-text -->
                                            </button>
                                        </div>
                                    <? } ?>
                                </div>
                                <!-- /.admin-st__fav-inner -->
                            </div>
                            <!-- /.admin-st__favourites-content -->


                            <div class="admin-st__fav-content fav-content-js">

                                <? if (!empty($arUser['UF_SUBSCRIPTION'])):
                                    foreach ($arUser['UF_SUBSCRIPTION'] as $id):
                                        $rsUser = CUser::GetByID($id);
                                        $arUser = $rsUser->Fetch();
                                        $arAdvert = getUserAdvert($id); ?>
                                        <div class="admin-st__fav-seller" id="seller-<?= $id ?>">
                                            <div class="admin-st__fav-seller-block">
                                                <div class="admin-st__fav-seller-person">
                                                    <div class="admin-st__fav-seller-person-block">
                                                        <div class="admin-st__fav-seller-person-ava">
                                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/admin-st/icon/man1.png"
                                                                 alt="мужчина">
                                                        </div>
                                                        <!-- /.admin-st__fav-seller-person-ava -->
                                                        <div class="admin-st__fav-seller-person-block-inner">
                                                            <div class="admin-st__fav-seller-person-name">
                                                                <?= $arUser['NAME'] ?>
                                                            </div>
                                                            <!-- /.admin-st__fav-seller-person-name -->
                                                            <div class="admin-st__fav-seller-person-ads">
                                                                <?= count($arAdvert) ?> объявлений
                                                            </div>
                                                            <!-- /.admin-st__fav-seller-person-ads -->
                                                        </div>
                                                        <!-- /.admin-st__fav-seller-person-block-inner -->
                                                    </div>
                                                    <a class="admin-btn admin-btn--unsubscribe" id="unsubscribelk"
                                                       data-id="<?= $id ?>">
                                                        <span>Отписаться</span>
                                                    </a>
                                                </div>
                                                <!-- /.admin-st__fav-seller-person -->
                                                <div class="admin-st__fav-seller-block-arrow">
                                                    <div class="admin-st__fav-seller-arrow-prev"></div>
                                                    <div class="admin-st__fav-seller-arrow-next"></div>
                                                </div>
                                                <!-- /.admin-st__fav-seller-block-arrow -->
                                            </div>
                                            <!-- /.admin-st__fav-seller-block -->
                                            <div class="swiper admin-st__fav-swiper">
                                                <div class="swiper-wrapper admin-st__fav-swiper-wrapper">
                                                    <? foreach ($arAdvert as $item): ?>
                                                        <div class="swiper-slide admin-st__fav-slide">
                                                            <a href="#" class="recomendation__item cart">
                                                                <div class="cart__top">
                                                                    <div class="cart__inner">
                                                                        <ul class="cart__list swiper-wrapper">
                                                                            <li class="cart__box swiper-slide">
                                                                                <img class="cart__img"
                                                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper2.jpg"
                                                                                     alt="">
                                                                            </li>
                                                                            <li class="cart__box swiper-slide">
                                                                                <img class="cart__img"
                                                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper4.jpg"
                                                                                     alt="">
                                                                            </li>

                                                                            <li class="cart__box swiper-slide">
                                                                                <img class="cart__img"
                                                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper3.jpg"
                                                                                     alt="">
                                                                            </li>
                                                                            <li class="cart__box swiper-slide">
                                                                                <img class="cart__img"
                                                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/recomendation-swiper1.jpg"
                                                                                     alt="">
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
                                                                                <?= $item['UF_NAME'] ?>
                                                                            </div>

                                                                            <div class="cart__cost">
                                                                                <?= $item['UF_PRICE'] ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cart__right">
                                                                            <div class="cart__location">
                                                                                <img class="cart__location-img"
                                                                                     src="<?= SITE_TEMPLATE_PATH ?>/images/location.svg"
                                                                                     alt="местоположение"> Рига
                                                                            </div>

                                                                            <div class="cart__date">
                                                                                14 сентября 10:29
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                    <div class="cart__info">
                                                                        <div class="cart__text">
                                                                            Своевременное обслуживание. Пройдено ТО.
                                                                            Весь
                                                                            комплект
                                                                            ключей и документов. Птс
                                                                            оригинал..
                                                                        </div>

                                                                        <a class="cart__message btn-blue" href="#">
                                                                            <img class="cart__message-img"
                                                                                 src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                                                                                 alt="Написать"> Написать
                                                                        </a>

                                                                        <a class="cart__favorite" href="#">
                                                                            <img class="cart__favorite-img"
                                                                                 src="<?= SITE_TEMPLATE_PATH ?>/images/favorite.svg"
                                                                                 alt="добавить в избранное">
                                                                            <img class="cart__favorite-img cart__favorite-img--active"
                                                                                 src="<?= SITE_TEMPLATE_PATH ?>/images/favorite-fill.svg  "
                                                                                 alt="добавить в избранное">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <!-- recomendation__item cart -->
                                                        </div>
                                                        <!-- /.swiper-slide -->
                                                    <? endforeach; ?>
                                                    <div class="swiper-slide admin-st__fav-slide">
                                                        <div class="admin-st__fav-btn-plus">
                                                            <div class="admin-st__fav-btn-plus-number">
                                                                +70
                                                            </div>
                                                            <!-- /.admin-st__fav-btn-plus-number -->

                                                            <div class="admin-st__fav-btn-plus-text">
                                                                объявлений
                                                            </div>
                                                            <!-- /.admin-st__fav-btn-plus-text -->
                                                            <a class="admin-st__fav-btn-plus-link">
                                                                <span>Смотреть</span>
                                                            </a>
                                                            <!-- /.admin-st__fav-btn-plus-link -->
                                                        </div>
                                                        <!-- /.admin-st__fav-btn-plus -->
                                                    </div>
                                                    <!-- /.swiper-slide -->
                                                </div>
                                                <!-- /.swiper-wrapper admin-st__fav-swiper-wrapper -->
                                                <div class="admin-st__fav-swiper-pagination"></div>
                                            </div>
                                            <!-- /.swiper admin-st__fav-swiper -->

                                        </div>
                                        <!-- /.admin-st__fav-seller -->
                                    <? endforeach; ?>
                                <? endif; ?>
                            </div>
                            <!-- /.admin-st__favourites-content -->


                            <!-- /.admin-st__favourites-content -->

                        </div>
                        <!-- /.admin-st__wrapper -->
                    </div>

                    <!-- /.admin-st__right-block global-block-js -->
                </div>
                <!-- /.admin-st__right -->
            </div>
            <!-- /.admin-st__wrapper -->
        </div>
        <!-- /.container -->
    </section>
    <!-- section -->

    <script src="<?= SITE_TEMPLATE_PATH ?>/js/main-dm.js"></script>

<? } else { ?>
    <? header('Location: /'); ?>
<? } ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>