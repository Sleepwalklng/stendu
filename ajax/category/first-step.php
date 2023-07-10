<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';



$MY_HL_BLOCK_ID = $_REQUEST['category'];
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
$rsData = $entity_data_class::getList(array(
   'select' => array('*'),
   'filter' => array('UF_ACTIVE' => '1')
));
while($el = $rsData->fetch()){
   $array[] = $el;
}

function categoty($id) {
    if($id == '29') {
        $result = 'Работа';
    } elseif ($id == '7') {
        $result = 'Услуги';
    } elseif ($id == '14') {
        $result = 'Личные вещи';
    } elseif ($id == '5') {
        $result = 'Транспорт';
    } elseif ($id == '18') {
        $result = 'Недвижимость';
    }
    return $result;
}

?>

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
                                        <span><?= categoty($_REQUEST['category']) ?></span>
                                    </h3>
                                    <p class="new-ad__category-sub-title">
                                    </p>
                                </div>
                                <button type="button" class="new-ad__category-reset-btn desktop other-category">Другая категория</button>
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

                                        <? foreach ($array as $item) { ?>
                                        <form class="category-lichnye">
                                        <label class="new-ad__subcategory-label">

                                            <input class="subcategory" type="radio" name="subcategory" value="<?= $item['UF_NAME'] ?>">
                                            <input class="subcategory1" type="hidden" name="subcategory1" value="<?= $item['UF_NAME'] ?>">
                                            <input class="subcategoryNum1" type="hidden" name="subcategoryNum1" value="<?= $item['ID'] ?>">
                                            <input class="category" type="hidden" name="category" value="<?= categoty($_REQUEST['category']) ?>">
                                            <input class="steps" type="hidden" name="steps" value="1">
                                            <span><?= $item['UF_NAME'] ?></span>
                                        </label>
                                        </form>
                                        <? } ?>

                                    </div>
                                </div>
                            </div>
                        </div>


<script>

var categoryNum = '<?= $_REQUEST['category'] ?>';
var steps = '<?= 1 ?>';


if (categoryNum == 14 && steps > 0) {
// выбор категории three
$(document).ready(function () {
    $('.category-lichnye').click(function () {
        var data = $(this).serialize();

        $.ajax({
            type: 'post',
            url: '/ajax/category/lichnye/steps.php',
            data: data,
            dataType: 'html',
            success: function (e) {
                $('.new-ad__subcategory-list').empty().append(e);
            },
            error: function (e) {
                console.log(false);
            }
        });
        return false;
    })
});

} else {

// выбор категории three
$(document).ready(function () {
    $('.subcategory').click(function () {
        var category = $('input[name=category]').val();
        var subcategory = $(this).val();
        var subcategoryID = $(this).closest('.new-ad__subcategory-label').find('input[name=subcategoryNum1]').val();

        $.ajax({
            type: 'post',
            url: '/ajax/category/three-step.php',
            data: { category: category, subcategory: subcategory,subcategoryID:subcategoryID },
            dataType: 'html',
            success: function (e) {
                $('.category-select').empty().append(e);

            },
            error: function (e) {
                console.log(false);
            }
        });
        return false;
    })
});

}
    

    
// Другая категория
    $(document).ready(function () {
        $('.other-category').click(function () {
            var data = $(this).serialize();
    
            $.ajax({
                type: 'post',
                url: '/ajax/category/other.php',
                data: data,
                dataType: 'html',
                success: function (e) {
                    $('.category-select').empty().append(e);
                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });
</script>