<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
global $USER;
if (!$USER->IsAuthorized()) {
  $auth = 0;
}else{
    $auth =1;
}
// Услуги
const MY_HL_BLOCK_ID7 = 7;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID7);
$rsData = $entity_data_class::getList(array(
   'select' => array('*')
));
while($el = $rsData->fetch()){
   $arrayUslugi[] = $el;
}

// Личные вещи
//const MY_HL_BLOCK_ID16 = 15;
const MY_HL_BLOCK_ID16 = 14;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID16);
$rsData = $entity_data_class::getList(array(
   'select' => array('*')
));
while($el = $rsData->fetch()){
   $arrayLichnye[] = $el;
}

// Транспорт
const MY_HL_BLOCK_ID5 = 5;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID5);
$rsData = $entity_data_class::getList(array(
   'select' => array('*')
));
while($el = $rsData->fetch()){
   $arrayTransport[] = $el;
}

// Работа
const MY_HL_BLOCK_ID10 = 10;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID10);
$rsData = $entity_data_class::getList(array(
   'select' => array('*')
));
while($el = $rsData->fetch()){
   $arrayRabota[] = $el;
}

// Недвижимость
//const MY_HL_BLOCK_ID18 = 18;
//CModule::IncludeModule('highloadblock');
//$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID18);
//$rsData = $entity_data_class::getList(array(
//   'select' => array('*')
//));
//while($el = $rsData->fetch()){
//   $arrayNedvizhimost[] = $el;
//}

?>

<main class="main">
    <section class="new-ad">
        <div class="container">
            <h2 class="new-ad__title">Создание объявления</h2>
            <div class="new-ad__content">
                <form class="new-ad__form">
                    <div class="new-ad__category-box new-ad__form-item category-select">
                        <div class="new-ad__category-content">
                            <div class="new-ad__category-title-box">
                                <h3 class="new-ad__item-title">Категория</h3>
                                <button type="button" class="new-ad__category-reset-btn mobile">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 20H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="new-ad__category-edit">
                            <div class="new-ad__category-search-box">
                                <label class="new-ad__category-label-search active">
                                    <input placeholder="Начните вводить название" type="text">
                                </label>
                                <label class="new-ad__category-label-search">
                                    <input placeholder="Выберите подкатегорию" type="text">
                                </label>
                                <label class="new-ad__category-label-search">
                                    <input placeholder="Выберите подкатегорию" type="text">
                                </label>
                            </div>
                            <div class="new-ad__category-checkboxes">
                                <div class="new-ad__category-list">
                                    
                                        <label class="new-ad__category-label">
                                            <input type="radio" class="category" name="category" value="14" data-auth="<?=$auth?>">
                                            <span class="new-ad__category-icon">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/category-1.svg" alt="">
                                            </span>
                                            <span class="new-ad__category-label-name">Личные вещи</span>
                                            <svg class="new-ad__category-label-arrow" width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 15L7 8.5L2 2" stroke="#20242C" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </label>
                                    
                                    <label class="new-ad__category-label">
                                        <input type="radio" class="category" name="category" value="5" data-auth="<?=$auth?>">
                                        <span class="new-ad__category-icon">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/category-2.svg" alt="">
                                    </span>
                                        <span class="new-ad__category-label-name">Транспорт</span>
                                        <svg class="new-ad__category-label-arrow" width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 15L7 8.5L2 2" stroke="#20242C" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </label>
                                    <label class="new-ad__category-label">
                                        <input type="radio" class="category" name="category" value="2" data-auth="<?=$auth?>">
                                        <span class="new-ad__category-icon">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/category-3.svg" alt="">
                                    </span>
                                        <span class="new-ad__category-label-name">Недвижимость</span>
                                        <svg class="new-ad__category-label-arrow" width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 15L7 8.5L2 2" stroke="#20242C" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </label>
                                    <label class="new-ad__category-label">
                                        <input type="radio" class="category" name="category" value="7" data-auth="<?=$auth?>">
                                        <span class="new-ad__category-icon">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/category-4.svg" alt="">
                                    </span>
                                        <span class="new-ad__category-label-name">Услуги</span>
                                        <svg class="new-ad__category-label-arrow" width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 15L7 8.5L2 2" stroke="#20242C" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </label>
                                    <label class="new-ad__category-label">
                                        <input type="radio" class="category" name="category" value="29" data-auth="<?=$auth?>">
                                        <span class="new-ad__category-icon">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/category-5.svg" alt="">
                                    </span>
                                        <span class="new-ad__category-label-name">Работа</span>
                                        <svg class="new-ad__category-label-arrow" width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 15L7 8.5L2 2" stroke="#20242C" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--<div class="new-ad__category-box new-ad__form-item">
                        <div class="new-ad__category-content">
                            <div class="new-ad__category-title-box">
                                <h3 class="new-ad__item-title">Категория</h3>
                                <button type="button" class="new-ad__category-reset-btn mobile">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 20H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="new-ad__category">
                                <div class="new-ad__category-icon">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/category-icon1.svg" alt="">
                                </div>
                                <div class="new-ad__category-name-box">
                                    <h3 class="new-ad__category-title">
                                        <span>Личные вещи</span>
                                    </h3>
                                    <p class="new-ad__category-sub-title">
                                    </p>
                                </div>
                                <button type="button" class="new-ad__category-reset-btn desktop">Другая категория</button>
                            </div>
                        </div>
                        <div class="new-ad__category-edit">
                            <div class="new-ad__category-search-box">
                                <label class="new-ad__category-label-search">
                                    <input placeholder="Начните вводить название" type="text">
                                </label>
                                <label class="new-ad__category-label-search active">
                                    <input placeholder="Выберите подкатегорию" type="text">
                                </label>
                                <label class="new-ad__category-label-search">
                                    <input placeholder="Выберите подкатегорию" type="text">
                                </label>
                            </div>
                            <div class="new-ad__category-checkboxes">
                                <div class="new-ad__subcategory-list-box">
                                    <div class="new-ad__subcategory-list">

                                        <? foreach ($arrayUslugi as $item) { ?>
                                        <label class="new-ad__subcategory-label">
                                            <input type="radio" name="subcategory">
                                            <a href="/"><span><?= $item['UF_NAME'] ?></span></a>
                                        </label>
                                        <? } ?>

                          

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="new-ad__category-box new-ad__form-item">
                        <div class="new-ad__category-content">
                            <div class="new-ad__category-title-box">
                                <h3 class="new-ad__item-title">Категория</h3>
                                <button type="button" class="new-ad__category-reset-btn mobile">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 20H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="new-ad__category">
                                <div class="new-ad__category-icon">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/category-icon1.svg" alt="">
                                </div>
                                <div class="new-ad__category-name-box">
                                    <h3 class="new-ad__category-title">
                                        <span>Личные вещи</span>
                                        <span class="desktop">Аксессуары</span>
                                    </h3>
                                    <p class="new-ad__category-sub-title">
                                        <span class="mobile">Аксессуары</span>
                                    </p>
                                </div>
                                <button type="button" class="new-ad__category-reset-btn desktop">Другая категория</button>
                            </div>
                        </div>
                        <div class="new-ad__category-edit">
                            <div class="new-ad__category-search-box">
                                <label class="new-ad__category-label-search">
                                    <input placeholder="Начните вводить название" type="text">
                                </label>
                                <label class="new-ad__category-label-search">
                                    <input placeholder="Выберите подкатегорию" type="text">
                                </label>
                                <label class="new-ad__category-label-search active">
                                    <input placeholder="Выберите подкатегорию" type="text">
                                </label>
                            </div>
                            <div class="new-ad__category-checkboxes">
                                <div class="new-ad__subcategory-list-box">
                                    <button type="button" class="new-ad__subcategory-back-btn">
                                        <svg width="11" height="21" viewBox="0 0 11 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.85177 19.25L1.10938 10.5L9.85177 1.75" stroke="#E3E9FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    <div class="new-ad__subcategory-list">
                                        <label class="new-ad__subcategory-label">
                                            <input type="radio" name="sub-subcategory">
                                            <span>Часы</span>
                                        </label>
                                        <label class="new-ad__subcategory-label">
                                            <input type="radio" name="sub-subcategory">
                                            <span>Бижутерия</span>
                                        </label>
                                        <label class="new-ad__subcategory-label">
                                            <input type="radio" name="sub-subcategory">
                                            <span>Ювелирные изделия</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="new-ad__category-box new-ad__form-item">
                        <div class="new-ad__category-content">
                            <div class="new-ad__category-title-box">
                                <h3 class="new-ad__item-title">Категория</h3>
                                <button type="button" class="new-ad__category-reset-btn mobile">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 20H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="new-ad__category">
                                <div class="new-ad__category-icon">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/category-icon1.svg" alt="">
                                </div>
                                <div class="new-ad__category-name-box">
                                    <h3 class="new-ad__category-title">
                                        <span>Личные вещи</span>
                                        <span class="desktop">Аксессуары</span>
                                    </h3>
                                    <p class="new-ad__category-sub-title">
                                        <span class="mobile">Аксессуары</span>
                                        <span>Часы </span>
                                    </p>
                                </div>
                                <button type="button" class="new-ad__category-reset-btn desktop">Другая категория</button>
                            </div>
                        </div>
                    </div>-->


                </form>


                <div class="new-ad__status-box desktop">
                    <div class="new-ad__status-bg">
                        <img class="top" src="<?= SITE_TEMPLATE_PATH ?>/img/status-bg-top.svg" alt="">
                        <img class="bottom" src="<?= SITE_TEMPLATE_PATH ?>/img/status-bg-bottom.svg" alt="">
                    </div>
                    <div class="new-ad__status-header-icon">
                        <span></span>
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/new-ad-status-header-icon.svg" alt="">
                    </div>
                    <ul class="new-ad__status-list">
                        <li class="new-ad__status-item ">
                            <div class="new-ad__status-item-icon">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-1.svg" alt="">
                                <svg class="ok" width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 6.47713L6.44227 11L16 2" stroke="#4067F0" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <p class="new-ad__status-item-name">Категория</p>
                        </li>
                        <li class="new-ad__status-item">
                            <div class="new-ad__status-item-icon">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/new-ad-status-icon4.svg" alt="">
                                <svg class="ok" width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 6.47713L6.44227 11L16 2" stroke="#4067F0" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <p class="new-ad__status-item-name">Место сделки</p>
                        </li>
                        <li class="new-ad__status-item ">
                            <div class="new-ad__status-item-icon">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-2.svg" alt="">
                                <svg class="ok" width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 6.47713L6.44227 11L16 2" stroke="#4067F0" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <p class="new-ad__status-item-name">Об объекте</p>
                        </li>
                        <li class="new-ad__status-item ">
                            <div class="new-ad__status-item-icon">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-3.svg" alt="">
                                <svg class="ok" width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 6.47713L6.44227 11L16 2" stroke="#4067F0" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <p class="new-ad__status-item-name">Площадь</p>
                        </li>
                         <li class="new-ad__status-item ">
                            <div class="new-ad__status-item-icon">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-3.svg" alt="">
                                <svg class="ok" width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 6.47713L6.44227 11L16 2" stroke="#4067F0" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <p class="new-ad__status-item-name">Название</p>
                        </li>
                         <li class="new-ad__status-item ">
                            <div class="new-ad__status-item-icon">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/stage-3.svg" alt="">
                                <svg class="ok" width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 6.47713L6.44227 11L16 2" stroke="#4067F0" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <p class="new-ad__status-item-name">Цена</p>
                        </li>

                        <li class="new-ad__status-item">
                            <div class="new-ad__status-item-icon">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/new-ad-status-icon5.svg" alt="">
                                <svg class="ok" width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 6.47713L6.44227 11L16 2" stroke="#4067F0" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <p class="new-ad__status-item-name">Контакты</p>
                        </li>
                    </ul>
                    <a href="/pomoshch/" class="new-ad__status-footer">
                        <p class="new-ad__status-footer-text">
                            Столкнулись с проблемой?
                            <br><b>Задайте нам вопрос</b>
                        </p>
                        <div class="new-ad__status-footer-arrow">
                            <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.98138 1L7.32422 7L1.98138 13" stroke="#4067F0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>
                </div>
                

            </div>
        </div>
    </section>
</main>


<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>