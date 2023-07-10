<?
$categories = $arResult['CATEGORIES'];
$marksAr = $arResult['MARKS'];
?>

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
