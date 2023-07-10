<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

$item = $arResult['ITEM'];
$sku = $arResult['SKU'];
$APPLICATION->SetTitle($item['NAME']);
$itemsCount = count($items);

if(!$item['NAME']) header('Location: /404.php');

$idUser = $USER->GetID();
$rsUser = CUser::GetByID($idUser);
$arUser = $rsUser->Fetch();
$arElements = $arUser['UF_FAVOURITES'];
foreach ($arElements as $val) {
    $favorBtn[$val] = $val;
}

$basket = \Bitrix\Sale\Basket::loadItemsForFUser(\Bitrix\Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
$price = $basket->getPrice();
$countProduct = array_sum($basket->getQuantityList());

foreach ($basket as $basketItem) {
    $productsAr[] = ['POS_ID' => $basketItem->getField('ID'), 'ID' => $basketItem->getField('PRODUCT_ID'), 'QUANTITY' => ceil($basketItem->getField('QUANTITY')), 'PRICE' => $basketItem->getField('PRICE')];
}

$currentSku = $sku['SKU_BASE_ID'];

?>


<main>
    <section class="crumbs">
        <div class="container">
            <div class="crumbs__wrapper">
                <ul class="crumbs__navigation">
                    <li><a href="/">Главная</a></li>
                    <li><a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $item['NAME'] ?></a></li>
                </ul>
            </div>
            <!-- wrapper -->
        </div>
    </section>
    <!-- /.crumbs -->
    <section class="perfume">
        <div class="container">
            <div class="perfume__wrapper">
                <div class="perfume__left">
                    <div class="perfume__images">
                        <div class="perfume__images-global">
                            <?php if($sku[$currentSku]): ?>
                                <img src="<?= CFile::GetPath($sku['IMAGES'][0]) ?>" alt="духи">
                            <?php else:?>
                                <img src="<?= CFile::GetPath($item['IMAGES'][0]) ?>" alt="духи">
                            <?php endif;?>
                        </div>
                        <div class="perfume__images-inner">
                            <?php if($sku[$currentSku]): ?>
                                <?php foreach ($sku['IMAGES'] as $val): ?>
                                    <div class="perfume__images-image">
                                        <img src="<?= CFile::GetPath($val) ?>" alt="духи">
                                    </div>
                                <?php endforeach; ?>
                            <?php else:?>
                                <?php for ($i = 0; $i < count($item['IMAGES']); $i++): ?>
                                    <div class="perfume__images-image">
                                        <img src="<?= CFile::GetPath($item['IMAGES'][$i]) ?>" alt="духи">
                                    </div>
                                <?php endfor; ?>
                            <?php endif;?>

                            <!--                        <div class="perfume__images-image">-->
                            <!--                            <img src="-->
                            <? //=SITE_TEMPLATE_PATH?><!--/img/perfums/product4.png" alt="духи">-->
                            <!--                            <div class="perfume__images-play">-->
                            <!--                                <img src="-->
                            <? //=SITE_TEMPLATE_PATH?><!--/img/icon/polygon.svg" alt="play">-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                        </div>
                    </div>
                </div>
                <div class="perfume__right">
                    <div class="perfume__product">
                        <div class="perfume__product-category">
                            <?= $item['SECTION_NAME'] ?>
                        </div>
                        <!-- /.perfume__product-category -->
                        <div class="perfume__product-title">
                            <?= $item['NAME'] ?>
                        </div>
                        <div class="perfume__product-article">
                            <span>Артикул:</span>
                            <span class="perfume__product-article-number"><?= $item['PROPERTY_ARTNUMBER_VALUE'] ?></span>
                        </div>
                        <ul class="perfume__product-lists">
                            <li class="perfume__product-item perfume__product-item-js">описание</li>
                            <li class="perfume__product-item perfume__product-item-js">свойства</li>
                            <li class="perfume__product-item perfume__product-item-js">преимущества</li>
                            <li class="perfume__product-item perfume__product-item-js">дополнительно</li>
                        </ul>
                        <!-- ul -->
                        <div class="perfume__product-text perfume__product-text-js">
                            <?= $item['PREVIEW_TEXT'] ?>
                        </div>
                        <div class="perfume__product-text perfume__product-text-js">
                            <?= $item['~PROPERTY_PROPS_VALUE']['TEXT'] ?>
                        </div>
                        <div class="perfume__product-text perfume__product-text-js">
                            <?= $item['~PROPERTY_ADVANTAGES_VALUE']['TEXT'] ?>
                        </div>
                        <div class="perfume__product-text perfume__product-text-js">
                            <?= $item['~PROPERTY_ADDITIONAL_VALUE']['TEXT'] ?>
                        </div>
                        <?php if ($sku[$currentSku]): ?>
                            <div class="perfume__leather-block">

                                <div class="perfume__leather-title">
                                    <?= $sku['MAIN']['NAME'] ?>
                                </div>

                                <div class="perfume__leather-wrapper">

                                    <?php foreach ($sku as $key => $val):?>
                                        <?php if ($val['ID'] && is_numeric($key)):?>
                                            <div class="perfume__leather-inner property-select <?php if ($val['QUANTITY'] == 0) echo 'perfume__leather-inner--not'; ?>">
<!--                                                --><?php //if($val['ID'] == $currentSku) echo $currentSku?>
                                                <div item-id="<?= $val['ID'] ?>"
                                                     class="perfume__leather select-property-ajax <?php if($val['ID'] == $currentSku) echo 'perfume-item'?> <?php if ($val['QUANTITY'] > 0) echo 'perfume__leather-js'; ?>">
                                                </div>
                                                <strong><?= $val[$sku['MAIN']['PROPERTY'] . '_VALUE'] ?></strong>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
<!--                                    --><?php //for ($i = 0; $i < count($sku); $i++): ?>
<!--                                        --><?php //if ($sku[$i]): ?>
<!--                                            <div class="perfume__leather-inner property-select --><?php //if ($sku[$i]['QUANTITY'] == 0) echo 'perfume__leather-inner--not'; ?><!--">-->
<!--                                                <div item-id="--><?//= $sku[$i]['ID'] ?><!--"-->
<!--                                                     class="perfume__leather select-property-ajax --><?php //if ($sku[$i]['QUANTITY'] > 0) echo 'perfume__leather-js'; ?><!--">-->
<!--                                                </div>-->
<!--                                                <strong>--><?//= $sku[$i][$sku['MAIN']['PROPERTY'] . '_VALUE'] ?><!--</strong>-->
<!--                                            </div>-->
<!--                                        --><?php //endif; ?>
<!--                                    --><?php //endfor; ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- leather -->
                        <div class="perfume__date">
                            <div class="perfume__price">
                                <strong>цена:</strong>
                                <?php if ($sku[$currentSku]): ?>
                                    <div class="perfume__price-number">
                                        <div class="price-<?= $sku[$currentSku]['ID'] ?>">
                                            <?= ceil($sku[$currentSku]['CATALOG_PRICE_1']) ?> ₽
                                        </div>

                                    </div>
                                <?php else: ?>
                                    <div class="perfume__price-number">
                                        <div class="price-<?= $item['ID'] ?>">
                                            <?= ceil($item['CATALOG_PRICE_1']) ?> ₽
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <!-- price -->
                            <div class="perfume__amount">
                                <strong>цена:</strong>
                                <?php if ($sku[$currentSku]): ?>
                                    <div class="number quantity quantity-ajax quant-<?= $sku[$currentSku]['ID'] ?>"
                                         data-address="catalog" data-pos="<?= $productsAr[$i]['POS_ID'] ?>">
                                        <span class="minus minus-ajax" data-quant="<?= $sku[$currentSku]['ID'] ?>" type="button"
                                              title="-">-</span>
                                        <input class="text quant-data quantity-data-<?= $sku[$currentSku]['ID'] ?>"
                                               max-quantity="<?= $sku[$currentSku]['QUANTITY'] ?>"
                                               data-firstquant="<?= $productsAr[$i]['QUANTITY'] ?>"
                                               data-quant="<?= $sku[$currentSku]['ID'] ?>" type="number" value="1">
                                        <span class="plus plus-ajax" onclick="" data-quant="<?= $sku[$currentSku]['ID'] ?>"
                                              type="button" title="+">+</span>
                                    </div>
                                <?php else: ?>
                                    <div class="number quantity quantity-ajax quant-<?= $item['ID'] ?>"
                                         data-address="catalog" data-pos="<?= $productsAr[$i]['POS_ID'] ?>">
                                        <span class="minus minus-ajax" data-quant="<?= $item['ID'] ?>" type="button"
                                              title="-">-</span>
                                        <input class="text quant-data quantity-data-<?= $item['ID'] ?>"
                                               max-quantity="<?= $item['QUANTITY'] ?>"
                                               data-firstquant="<?= $productsAr[$i]['QUANTITY'] ?>"
                                               data-quant="<?= $item['ID'] ?>" type="number" value="1">
                                        <span class="plus plus-ajax" onclick="" data-quant="<?= $item['ID'] ?>"
                                              type="button" title="+">+</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- price -->

                        </div>
                        <div class="perfume__btns">
                            <?php if ($sku[$currentSku]): ?>
                                <a href="" class="all-btn add-cart-ajax" data-cart="<?= $sku[$currentSku]['ID'] ?>">
                                    <span>добавить в корзину</span>
                                </a>
                            <?php else: ?>
                                <a href="" class="all-btn add-cart-ajax" data-cart="<?= $item['ID'] ?>">
                                    <span>добавить в корзину</span>
                                </a>
                            <?php endif; ?>
                            <?php if (CUser::IsAuthorized()): ?>
                                <button class="perfume__btns-heart add-to-fav <?php if ($favorBtn[$item['ID']]) echo 'active' ?>"
                                        data-item="<?= $item['ID'] ?>">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/icon/blueheart.svg" alt="heart">
                                </button>
                            <?php else: ?>
                                <button class="perfume__btns-heart add-to-fav <?php if ($_SESSION['favourites'][$item['ID']]) echo 'active' ?>"
                                        data-item="<?= $item['ID'] ?>">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/icon/blueheart.svg" alt="heart">
                                </button>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.perfume__wrapper -->
        </div>
    </section>
    <!-- /.perfume -->
    <section class="similar">

        <div class="container">
            <div class="title">Похожие товары</div>
            <div class="similar__wrapper">
                <div class="best-two__wrapper">
                    <div class="swiper best-two__swiper">
                        <div class="swiper-wrapper best-two__swiper-wrapper">
                            <?php $bestSellers = CIBlockElement::GetList(array('RAND' => 'ASC'), Array('IBLOCK_ID' => 2, 'ACTIVE' => 'Y', 'IBLOCK_SECTION_ID' => $item['SECTION_ID'], '!ID' => $item['ID']), false, array(),
                                array('ID', 'NAME', 'IBLOCK_SECTION_ID', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL', 'CATALOG_GROUP_1'));
                            while($sell = $bestSellers->GetNext()):?>
                                <div class="swiper-slide best-two__slide">
                                    <article class="product">

                                        <div class="product__image">

                                            <a href="<?=$sell['DETAIL_PAGE_URL']?>">
                                                <img src="<?=CFile::GetPath($sell['PREVIEW_PICTURE'])?>" alt="<?=$sell['NAME']?>">
                                            </a>
                                            <?php if(CUser::IsAuthorized()):?>
                                                <button class="product__heart add-to-fav <?php if($favorBtn[$sell['ID']]) echo 'active'?>" data-item="<?=$sell['ID']?>">
                                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/icon/heart.svg" alt="heart">
                                                </button>
                                            <?php else:?>
                                                <button class="product__heart add-to-fav <?php if($_SESSION['favourites'][$sell['ID']]) echo 'active'?>" data-item="<?=$sell['ID']?>">
                                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/icon/heart.svg" alt="heart">
                                                </button>
                                            <?php endif;?>

                                        </div>
                                        <div class="product__title">
                                            <a href="<?=$sell['DETAIL_PAGE_URL']?>">
                                                <?=$sell['NAME']?>
                                            </a>
                                        </div>
                                        <div class="product__category">
                                            <?php
                                            $sections = CIBlockSection::GetList(array(), Array('IBLOCK_ID' => 2, 'ACTIVE' => 'Y', 'ID' => $sell['IBLOCK_SECTION_ID']), false, array('NAME'),
                                                false);
                                            $section = $sections->GetNext();
                                            echo $section['NAME'];
                                            ?>

                                        </div>
                                        <div class="product__price">
                                            <?=ceil($sell['CATALOG_PRICE_1'])?> ₽
                                        </div>

                                        <?php if (isSku(2, $sell['ID'])== 1):?>
                                            <button class="product__basket">
                                                <a href="<?=$sell['DETAIL_PAGE_URL']?>"><img src="<?=SITE_TEMPLATE_PATH?>/img/icon/bag2.svg" alt=""></a>
                                            </button>
                                        <?php else:?>
                                            <button class="product__basket add-cart-ajax" data-cart="<?=$sell['ID']?>" >
                                                <img src="<?=SITE_TEMPLATE_PATH?>/img/icon/bag2.svg" alt="">
                                            </button>
                                        <?php endif;?>

                                    </article>
                                </div>
                            <?php endwhile;?>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/catalog" class="all-btn"><span>перейти в каталог</span></a>
        </div>
    </section>
    <!-- /.similar -->
</main>