<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';


$MY_HL_BLOCK_ID = 6;


$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
$rsData = $entity_data_class::getList(array(
   'select' => array('*'),
   'filter' => array('UF_ID_CAR' => $_REQUEST['data'])
));

while($el = $rsData->fetch()) {
	$mark[] = $el; 
}


$id_mark = "'{$_REQUEST['data']}'";

$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/model.getAll.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
	if ($row[1] == $id_mark) {
    $model[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);
?>




                    <div class="brand-ad update-block">
                        <div class="new-ad__form-item">
                            <h2 class="new-ad__item-title">Выберите марку</h2>
                            <div class="new-ad__item-content">
                                <div class="new-ad__flex-full">
                                    <label class="new-ad__input-box">
                                        <input placeholder="Название марки" type="text" name="NAME" value="<?= $mark['0']['UF_TRANSPORT_MARK_NAME'] ?>" readonly>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="brand-ad__content block-vse-marki">
                            <ul class="brand-ad__list">


								<? foreach ($mark as $el) { ?>
    							<li class="brand-ad__item brand-ad__item-d">
                                    <label class="brand-ad__label">
                                        <input type="text" name="brand" value="<?= $el['UF_ID_CAR'] ?>">
                                        <span class="brand-ad__item-img-box desktop">
                                            <img src="<?= CFile::GetPath($el['UF_TRANSPORT_MARK_LOGO']) ?>" alt="">
                                        </span>
                                        <span class="brand-ad__item-name"><?= $el['UF_TRANSPORT_MARK_NAME'] ?></span>
                                        <span class="brand-ad__item-number mobile"></span>
                                    </label>
                                </li>
								<? } ?>
                                

                                <li class="brand-ad__item">
                                     <a class="brand-ad__btn vse-marki">
                                        <span>Все марки</span>
                                        <span class="brand-ad__btn-icon">
                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.999999 1L7 7L1 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>



                    <!--<div class="brand-ad update-block">
                        <div class="new-ad__form-item">
                            <h2 class="new-ad__item-title">Выберите модель</h2>
                            <div class="new-ad__item-content">
                                <div class="new-ad__flex-full">

																		
                                    <label class="new-ad__input-box">
                                        <select id="auto-model" name="MODEL">
                                            <option value="none" selected>
                                        	<? foreach ($model as $item) { ?>
                                            <option value="<?= $item['id_car_model'] ?>"><?= $item['name'] ?></option>
                                            <? } ?>
                                        </select>
                                    </label>
																		


                                </div>
                            </div>

                        </div>
                    </div>-->


                    <section class="announcement update-block zero update4">
                        <div class="announcement-content__block announcement-content__car-parameters zero">
                            <div class="announcement-content__block-wrap grid">


                            <div class="col_100">
                                <div class="label">
                                    <div class="announcement-label__title">Выберите модель</div>
                                    <select id="auto-model" name="MODEL">
                                            <option value="none" selected>
                                            <? foreach ($model as $item) { ?>
                                            <option value="<?= $item['id_car_model'] ?>"><?= $item['name'] ?></option>
                                            <? } ?>
                                    </select>
                                </div>
                            </div>
                    





                            </div>
                        </div>

                    </section>


                    <section class="announcement update-block auto-pokolenie update4 zero">
                        
                    </section>




<script>
    if ($(`select`)) {
    $(`select`).niceSelect()
    }

		// выбор модели и переход к году
		$(document).ready(function () {
        $('#auto-model').change(function () {
            var data = $(this).val();

            console.log(data);
            
    
            $.ajax({
                type: 'post',
                url: '/ajax/category/transport/pokolenie.php',
                data: { data: data },
                dataType: 'html',
                success: function (e) {
                	$('.auto-pokolenie').empty().append(e);
                    $('.update1').remove();

                    console.log(e);

                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });


    // все марки
    $(document).ready(function () {
        $('.vse-marki').click(function () {
            var data = $(this).val();
            console.log(data);
            
    
            $.ajax({
                type: 'post',
                url: '/ajax/category/transport/vse-marki.php',
                data: { data: data },
                dataType: 'html',
                success: function (e) {
                    $('input[name=NAME]').val('');
                    $('.update1').remove(); $('.update4').remove();
                    $('.block-vse-marki').empty().append(e);
                    console.log(e);
                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });


</script>