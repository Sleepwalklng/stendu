<?


$categories = $arResult['CATEGORIES'];
$countItems = $arResult['ITEMS_COUNT'];
$marksAr = $arResult['MARKS'];
//print_r($marksAr);
?>

    <section class="data">
        <div class="container nav-container-ajax">
            <div class="data__title data__title--transport title">
                Транспорт

                <img class="data__title-img" src="<?=SITE_TEMPLATE_PATH?>/images/date-title.png" alt="Транспорт">

                <span class="data__title-text">в Риге</span>
            </div>

            <div class="data__offers">
                <?=number_format($countItems, 0, '', ' ')?> предложений
            </div>

            <div class="data__wrapper data__wrapper--transport">
                <div class="get-nav-params-ajax">
                <ul class="data__categories">

                <?php foreach ($categories as $category):?>
                    <li class="data__categories-item navigation-params-ajax <?php if($_GET['category'] == $category['UF_TRANSPORT_CATEGORY_CODE'] && $_GET['category']) echo 'data__categories-item--active'?>" item-id="<?=$category['ID']?>">
                            <label>
                                <img class="data__categories-img" src="<?=CFile::GetPath($category['UF_TRANSPORT_CATEGORY_BANNER'])?>" alt="Легковые авто">
                                <input class="data__radio" type="radio" name="categories" value="<?=$category['UF_TRANSPORT_CATEGORY_CODE']?>">
                                <div class="data__text"><?=$category['UF_TRANSPORT_CATEGORY_NAME']?></div>
                            </label>
                    </li>
                <?php endforeach;?>
                </ul>

                <ul class="data__isuse">
                    <li class="data__isuse-item navigation-params-ajax <?php if($_GET['mileage'] == 'ALL' || !$_GET['mileage']) echo 'data__isuse-item--active'?>">
                        <label>
                            <input class="data__radio" type="radio" name="mileage" value="ALL">
                            <div class="data__text">Все</div>
                        </label>
                    </li>
                    <li class="data__isuse-item navigation-params-ajax <?php if($_GET['mileage'] == 'NEW') echo 'data__isuse-item--active'?>">
                        <label>
                            <input class="data__radio" type="radio" name="mileage" value="NEW">
                            <div class="data__text">Новые</div>
                        </label>
                    </li>
                    <li class="data__isuse-item navigation-params-ajax <?php if($_GET['mileage'] == 'WITH') echo 'data__isuse-item--active'?>">
                        <label>
                            <input class="data__radio" type="radio" name="mileage" value="WITH">
                            <div class="data__text">С пробегом</div>
                        </label>
                    </li>
                </ul>
                </div>
            </div>

            <ul class="data__items">
                <?php foreach ($marksAr as $marks):?>
                    <li class="data__box">
                        <ul class="data__list">
                            <?php foreach ($marks as $mark):?>
                                <li class="data__item">
                                    <div class="data__name">
                                        <a href="/transport/<?=$mark['UF_TRANSPORT_MARK_CODE']?>"><?=$mark['UF_TRANSPORT_MARK_NAME']?></a>
                                    </div>

                                    <div class="data__count">
                                        <?=$mark['COUNT']?>
                                    </div>
                                    <a href="/transport/<?=$mark['UF_TRANSPORT_MARK_CODE']?>"><img class="data__img" src="<?=CFile::GetPath($mark['UF_TRANSPORT_MARK_LOGO'])?>" alt="<?=$mark['UF_TRANSPORT_MARK_NAME']?>1"></a>

                                </li>
                            <?php endforeach;?>
                        </ul>
                    </li>
                <?php endforeach;?>


            </ul>

            <a class="data__more show-current-transports-ajax" href="#">Показать  <?=number_format($arResult['ITEMS_COUNT_SHOW'], 0, '', ' ')?> предложений</a>

<!--            <ul class="data__kinds">-->
<!--                <li class="data__kind">-->
<!--                    <label class="data__kind-label">-->
<!--                        <img class="data__kind-img" src="--><?//=SITE_TEMPLATE_PATH?><!--/images/data-kind1.jpg" alt="Внедорожник">-->
<!---->
<!--                        <input class="data__radio" type="radio" name="kind">-->
<!---->
<!--                        <div class="data__text">Внедорожник</div>-->
<!--                    </label>-->
<!--                </li>-->
<!---->
<!--                <li class="data__kind">-->
<!--                    <label class="data__kind-label">-->
<!--                        <img class="data__kind-img" src="--><?//=SITE_TEMPLATE_PATH?><!--/images/data-kind2.jpg" alt="Седан">-->
<!---->
<!--                        <input class="data__radio" type="radio" name="kind">-->
<!---->
<!--                        <div class="data__text">Седан</div>-->
<!--                    </label>-->
<!--                </li>-->
<!---->
<!--                <li class="data__kind">-->
<!--                    <label class="data__kind-label">-->
<!--                        <img class="data__kind-img" src="--><?//=SITE_TEMPLATE_PATH?><!--/images/data-kind3.jpg" alt="Хетчбек">-->
<!---->
<!--                        <input class="data__radio" type="radio" name="kind">-->
<!---->
<!--                        <div class="data__text">Хетчбек</div>-->
<!--                    </label>-->
<!--                </li>-->
<!---->
<!--                <li class="data__kind">-->
<!--                    <label class="data__kind-label">-->
<!--                        <img class="data__kind-img" src="--><?//=SITE_TEMPLATE_PATH?><!--/images/data-kind4.jpg" alt="Лифтбек">-->
<!---->
<!--                        <input class="data__radio" type="radio" name="kind">-->
<!---->
<!--                        <div class="data__text">Лифтбек</div>-->
<!--                    </label>-->
<!--                </li>-->
<!--            </ul>-->
        </div>
    </section>


