<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';



// если выбран 1 уровень вложенности
if (!empty($_REQUEST['subcategoryNum1']) && empty($_REQUEST['subcategoryNum2']) && empty($_REQUEST['subcategoryNum3'])) {
    $MY_HL_BLOCK_ID14 = '14';
    $entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID14);
    $rsData = $entity_data_class::getList(array(
        'select' => array('*'),
        'filter' => array('ID' => $_REQUEST['subcategoryNum1'])
    ));
    while ($el = $rsData->fetch()) {
        $array14[] = $el;
    }

    if (count($array14['0']['UF_CATEGORIES']) > 0) {
        $steps = 2;

        $MY_HL_BLOCK_ID15 = '15';
        $entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID15);
        $rsData = $entity_data_class::getList(array(
            'select' => array('*'),
            'filter' => array('ID' => $array14['0']['UF_CATEGORIES'])
        ));
        while ($el = $rsData->fetch()) {
            $array15[] = $el;
        }
        $array14 = array();

    } else {
        $steps = 0;
        $array14 = array();
    }

}

// если выбран 2 уровень вложенности
if (!empty($_REQUEST['subcategoryNum2']) && empty($_REQUEST['subcategoryNum1']) && empty($_REQUEST['subcategoryNum3'])) {

    $MY_HL_BLOCK_ID15 = '15';
    $entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID15);
    $rsData = $entity_data_class::getList(array(
        'select' => array('*'),
        'filter' => array('ID' => $_REQUEST['subcategoryNum2'])
    ));
    while ($el = $rsData->fetch()) {
        $array15[] = $el;
    }

    if (count($array15['0']['UF_CATEGORY_TYPE']) > 0) {
        $steps = 3;

        $MY_HL_BLOCK_ID16 = '16';
        $entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID16);
        $rsData = $entity_data_class::getList(array(
            'select' => array('*'),
            'filter' => array('ID' => $array15['0']['UF_CATEGORY_TYPE'])
        ));
        while ($el = $rsData->fetch()) {
            $array16[] = $el;
        }
        $array15 = array();

    } else {
        $array15 = array();
        $steps = 0;
    }

}

// если выбран 3 уровень вложенности
if (!empty($_REQUEST['subcategoryNum3']) && empty($_REQUEST['subcategoryNum1']) && empty($_REQUEST['subcategoryNum2'])) {

    $MY_HL_BLOCK_ID16 = '16';
    $entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID16);
    $rsData = $entity_data_class::getList(array(
        'select' => array('*'),
        'filter' => array('ID' => $_REQUEST['subcategoryNum3'])
    ));
    while ($el = $rsData->fetch()) {
        $array16[] = $el;
    }

    if (count($array16['0']['UF_SUBCATEGORIES']) > 0) {
        $steps = 4;

        $MY_HL_BLOCK_ID20 = '20';
        $entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID20);
        $rsData = $entity_data_class::getList(array(
            'select' => array('*'),
            'filter' => array('ID' => $array16['0']['UF_SUBCATEGORIES'])
        ));
        while ($el = $rsData->fetch()) {
            $array20[] = $el;
        }
        $array16 = array();

    } else {
        $array16 = array();
        $steps = 0;
    }

}

?>



<? foreach ($array15 as $item) { ?>
    <form class="category-lichnye category15">
        <label class="new-ad__subcategory-label">

            <input class="category" type="hidden" name="category" value="<?= $_REQUEST['category'] ?>">
            <input class="subcategory1" type="hidden" name="subcategory1" value="<?= $_REQUEST['subcategory1'] ?>">
            <input class="steps" type="hidden" name="steps" value="<? if (count($item['UF_CATEGORY_TYPE']) > 0) {
                echo "2";
            } else {
                echo "0";
            } ?>">
            <input class="subcategoryNum11" type="hidden" name="subcategoryNum11" value="<?= $_REQUEST['subcategoryNum1'] ?>">
            <input class="subcategoryNum22" type="hidden" name="subcategoryNum22" value="<?= $item['ID'] ?>">
            <input class="subcategoryNum2" type="hidden" name="subcategoryNum2" value="<?= $item['ID'] ?>">
            <input class="subcategory2" type="radio" name="subcategory2" value="<?= $item['UF_NAME'] ?>">
            <input class="subcategory2" type="hidden" name="subcategory2" value="<?= $item['UF_NAME'] ?>">
            <span><?= $item['UF_NAME'] ?></span>
        </label>
    </form>
<? } ?>

<? foreach ($array16 as $item) { ?>
    <form class="category-lichnye category16">
        <label class="new-ad__subcategory-label">

            <input class="category" type="hidden" name="category" value="<?= $_REQUEST['category'] ?>">
            <input class="subcategory1" type="hidden" name="subcategory1" value="<?= $_REQUEST['subcategory1'] ?>">
            <input class="subcategory2" type="hidden" name="subcategory2" value="<?= $_REQUEST['subcategory2'] ?>">
            <input class="steps" type="hidden" name="steps" value="<? if (count($item['UF_SUBCATEGORIES']) > 0) {
                echo "3";
            } else {
                echo "0";
            } ?>">
            <input class="subcategoryNum11" type="hidden" name="subcategoryNum11" value="<?= $_REQUEST['subcategoryNum11'] ?>">
            <input class="subcategoryNum22" type="hidden" name="subcategoryNum22" value="<?= $_REQUEST['subcategoryNum2'] ?>">
            <input class="subcategoryNum3" type="hidden" name="subcategoryNum3" value="<?= $item['ID'] ?>">
            <input class="subcategoryNum33" type="hidden" name="subcategoryNum33" value="<?= $item['ID'] ?>">
            <input class="subcategory3" type="radio" name="subcategory3" value="<?= $item['UF_NAME'] ?>">
            <input class="subcategory3" type="hidden" name="subcategory3" value="<?= $item['UF_NAME'] ?>">
            <input class="subcategory3SecondName" type="hidden" name="subcategory3SecondName" value="<?= $item['UF_SECOND_NAME'] ?>">
            <span><?= $item['UF_NAME'] ?></span>
        </label>
    </form>
<? } ?>

<? foreach ($array20 as $item) { ?>
    <form class="category-lichnye category20">
        <label class="new-ad__subcategory-label">

            <input class="category" type="hidden" name="category" value="<?= $_REQUEST['category'] ?>">
            <input class="subcategory1" type="hidden" name="subcategory1" value="<?= $_REQUEST['subcategory1'] ?>">
            <input class="subcategory2" type="hidden" name="subcategory2" value="<?= $_REQUEST['subcategory2'] ?>">
            <input class="subcategory3" type="hidden" name="subcategory3" value="<?= $_REQUEST['subcategory3'] ?>">
            <input class="subcategory3SecondName" type="hidden" name="subcategory3SecondName" value="<?= $_REQUEST['subcategory3SecondName'] ?>">
            <input class="steps" type="hidden" name="steps" value="0">

            <input class="subcategoryNum11" type="hidden" name="subcategoryNum11" value="<?= $_REQUEST['subcategoryNum11'] ?>">
            <input class="subcategoryNum22" type="hidden" name="subcategoryNum22" value="<?= $_REQUEST['subcategoryNum22'] ?>">
            <input class="subcategoryNum33" type="hidden" name="subcategoryNum33" value="<?= $_REQUEST['subcategoryNum3'] ?>">
            <input class="subcategoryNum4" type="hidden" name="subcategoryNum4" value="<?= $item['ID'] ?>">
            <input class="subcategory4" type="radio" name="subcategory4" value="<?= $item['UF_NAME'] ?>">
            <input class="subcategory4" type="hidden" name="subcategory4" value="<?= $item['UF_NAME'] ?>">
            <span><?= $item['UF_NAME'] ?></span>
        </label>
    </form>
<? } ?>


<script>


    // выбор категории three
    $(document).ready(function () {
        $('.category-lichnye').click(function () {
            var data = $(this).serialize();
            var steps = $(this).find('input[name=steps]').val();

            if (steps > 0) {

                $.ajax({
                    type: 'post',
                    url: '/ajax/category/lichnye/steps.php',
                    data: data,
                    dataType: 'html',
                    success: function (e) {
                        $('.new-ad__subcategory-list').empty().append(e);
                        console.log(e);
                    },
                    error: function (e) {
                        console.log(false);
                    }
                });
                return false;

            } else {

                $.ajax({
                    type: 'post',
                    url: '/ajax/category/three-step.php',
                    data: data,
                    dataType: 'html',
                    success: function (e) {
                        $('.category-select').empty().append(e);
                        console.log(e);
                    },
                    error: function (e) {
                        console.log(false);
                    }
                });
                return false;

            }

        })
    });


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