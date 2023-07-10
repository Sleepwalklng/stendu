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

<? if(!empty($arResult['ITEMS'])): ?>
	<div class="data__wrapper">
        <div class="categories__prev">
          <img class="categories__arrow" src="<?= SITE_TEMPLATE_PATH ?>/images/arrow-black.svg" alt="предыдущая категория">
        </div>

        <div class="data__inner">
          <ul class="data__categories swiper-wrapper">

				<?foreach($arResult["ITEMS"] as $arItem):?>

					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>

					<? if(!empty($arItem['NAME'])): ?>
						
						<li class="data__categories-item swiper-slide">
						<a href="#" class="data__categories-label data__categories-label--active">
							<img class="data__categories-img" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="Одежда, обувь, аксессуары">
					
							<input class="data__radio" type="radio" name="categories" checked>
					
							<div class="data__text"><?= $arItem['NAME'] ?></div>
						</a>
						</li>
                    <?endif?>

				<?endforeach?>
			</ul>
        </div>

        <div class="categories__next">
          <img class="categories__arrow" src="<?= SITE_TEMPLATE_PATH ?>/images/arrow-black.svg" alt="следующая категория">
        </div>
      </div>
				
<?endif?>
