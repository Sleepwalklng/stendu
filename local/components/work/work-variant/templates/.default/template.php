<ul class="data__items">
    <?$i = 0;?>
    <?foreach ($arResult['CATEGORIES'] as $arCategories){?>
        <? if ($i==0){?>
            <li class="data__box">
            <ul class="data__list">
        <?}?>
        <li class="data__item"><a href="" data-id="<?= $arCategories['UF_NAME'];?>" class="rabota_filter-category">
            <div class="data__name">
                <?= $arCategories['UF_NAME'];?>
            </div>
            <div class="data__count">
                <?= $arCategories['UF_COUNT'];?>
            </div>
            </a>
        </li>
        <?if($i==3) {?>

            </ul>
            </li>
            <? $i = 0;
        }else{
            $i++;
        }?>
    <?}?>

</ul>