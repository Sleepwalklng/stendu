<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<section class="categories">
    <div class="container">
        <div class="categories__wrapper">
            <div class="categories__prev">
                <img class="categories__arrow" src="<?= SITE_TEMPLATE_PATH ?>/images/arrow-black.svg" alt="предыдущая категория">
            </div>

            <div class="categories__inner swiper-container">
                <ul class="categories__list swiper-wrapper">
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <li class="categories__item swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <a href="<?=$arItem['PREVIEW_TEXT']?>" class="categories__link">
                            <img class="categories__img" src="<?= CFile::GetPath($arItem['~PREVIEW_PICTURE']) ?>" alt="Вакансии">

                            <span class="categories__text">
                    <?=$arItem['NAME']?>
                  </span>
                        </a>
                    </li>
                    <? endforeach;?>
                </ul>
            </div>

            <div class="categories__next">
                <img class="categories__arrow" src="<?= SITE_TEMPLATE_PATH ?>/images/arrow-black.svg" alt="следующая категория">
            </div>

            <!--          <a href="#" class="categories__all link">-->
            <!--            <div class="link__text">-->
            <!--              Все категории-->
            <!--            </div>-->
            <!---->
            <!--            <div class="link__btn">-->
            <!---->
            <!--            </div>-->
            <!--          </a>-->
        </div>
    </div>
</section>



