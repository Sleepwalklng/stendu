<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;
$filter = $arResult['FILTER'];
$items = $arResult['ITEMS'];
$itemsCount = count($items);

$idUser = $USER->GetID();
$rsUser = CUser::GetByID($idUser);
$arUser = $rsUser->Fetch();
$arElements = $arUser['UF_FAVOURITES'];

foreach ($arElements as $val) {$favorBtn[$val] = $val;}


if($itemsCount <= 0)
{
    echo '<div id="empty-favor">Ничего не найдено. Сбросьте фильтры.</div>'; die;
}

//NAVIGATION
$countExactly = 0;
$count = count($items);
$elementsCount = 9;
$itemsCount = floor($count / $elementsCount);
$radius = 3;
if($_REQUEST['type'] == 'filter') $_REQUEST['PAGE_ID'] = 0;
$currentPage = (!$_REQUEST['PAGE_ID']) ? 1 : $_REQUEST['PAGE_ID'];
$pagin = (!$_REQUEST['PAGE_ID']) ? 0 : $_REQUEST['PAGE_ID'] ;
//NAVIGATION
for ( $i = 0; $i < ($elementsCount * $pagin) + $elementsCount; $i++ )
{
    if($items[$i]) $countExactly++;
}

?>

        <div class="catalog__right">
            <div class="catalog__right-products">

                <?php for ( $i = $elementsCount * $pagin; $i < ($elementsCount * $pagin) + $elementsCount; $i++ ):?>
                    <?php if($items[$i]):?>

                        <article href="" class="product">

                            <div class="product__image">
                                <a href="<?=$items[$i]['DETAIL_PAGE_URL']?>">
                                    <img src="<?=CFile::GetPath($items[$i]['PREVIEW_PICTURE'])?>" alt="продукт">
                                </a>
                                <?php if(CUser::IsAuthorized()):?>
                                    <button class="product__heart add-to-fav <?php if($favorBtn[$items[$i]['ID']]) echo 'active'?>" data-item="<?=$items[$i]['ID']?>">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/img/icon/heart.svg" alt="heart">
                                    </button>
                                <?php else:?>
                                    <button class="product__heart add-to-fav <?php if($_SESSION['favourites'][$items[$i]['ID']]) echo 'active'?>" data-item="<?=$items[$i]['ID']?>">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/img/icon/heart.svg" alt="heart">
                                    </button>
                                <?php endif;?>


                            </div>
                            <div class="product__title">
                                <a href="<?=$items[$i]['DETAIL_PAGE_URL']?>">
                                    <?=$items[$i]['NAME']?>
                                </a>
                            </div>
                            <div class="product__category">
                                <?=$items[$i]['SECTION_CODE']?>
                            </div>
                            <div class="product__price">
                                <?=ceil($items[$i]['CATALOG_PRICE_1'])?> ₽
                            </div>
                            <?php if($items[$i]['SKU'] == 1):?>
                                <button class="product__basket">
                                    <a href="<?=$items[$i]['DETAIL_PAGE_URL']?>"><img src="<?=SITE_TEMPLATE_PATH?>/img/icon/bag2.svg" alt=""></a>
                                </button>
                            <?php else:?>
                                <button class="product__basket add-cart-ajax" data-cart="<?=$items[$i]['ID']?>" >
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/icon/bag2.svg" alt="">
                                </button>
                            <?php endif;?>


                        </article>

                    <?php endif;?>
                <?php endfor;?>
            </div>
            <!-- /.catalog__right-products -->
            <?php

            //echo $itemsCount;
            //echo '<br>';
            //echo $elementsCount;
            ?>
            <?php if($count > $elementsCount):?>
                <div class="catalog__right-pagination" data-current="<?=$pagin?>">
                    <div class="catalog__right-pagination-prev <?php if ($pagin > 0) echo 'pagination-items-ajax'; ?> <?php if (!$pagin || $pagin == 0) echo 'disabled-btn'; ?>" data-current="<?= $pagin-1?>"></div>

                    <div class="catalog__right-pagination-numbers">
                        <?php if ($pagin >= 3): ?> <!--Вывод остальных страниц-->
                            <span class="pagination-items-ajax " data-current="0">1</span>
                            <span>...</span>
                        <?php endif; ?>

                        <?php for ($i = 0; $i <= $itemsCount; $i++):
                            if(($i == $itemsCount && $count % 9 == 0)  ) {$i--; break;}
                            ?>

                            <?php if (($i > $pagin - $radius && $i < $pagin + $radius)): ?> <!--Вывод первой страницы-->
                            <span data-current="<?= $i ?>" class="pagination-items-ajax <?php if ($pagin == $i) echo 'order__pagination-number--active'; ?>"><?= $i+1 ?></span>
                        <?php elseif ($pagin == 0 && $i < 3): ?> <!--Вывод остальных страниц-->
                            <span data-current="<?= $i ?>" class="pagination-items-ajax <?php if ($pagin == $i) echo 'order__pagination-number--active'; ?>"><?= $i+1 ?></span>
                        <?php endif; ?>

                        <?php endfor; ?>

                        <?php if ($pagin < $i - 3 && $i > 2 && $itemsCount >= 3 && ($i != $itemsCount && $count % 4 != 0) ): ?> <!--Вывод троеточия в случае, если дальше ещё есть страницы-->
                            <span>...</span>
                        <?php endif; ?>

                        <?php if ($pagin <= $itemsCount - 3 && $itemsCount >= 3  && ($i != $itemsCount && $count % 4 != 0) ): ?> <!--Вывод остальных страниц-->
                            <span class="pagination-items-ajax" data-current="<?= $itemsCount?>"><span><?= $itemsCount+1?></span></span>
                        <?php endif; ?>

                    </div>

                    <div class="catalog__right-pagination-next <?php if ( $countExactly >= $count ) echo 'disabled-btn'; ?> <?php if ( $countExactly < $count ) echo 'pagination-items-ajax'; ?>" data-current="<?= $pagin+1?>"></div>
                </div>
            <?php endif;?>

        </div>
