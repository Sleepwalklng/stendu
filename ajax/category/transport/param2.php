<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

$id_model = $_REQUEST['model'];
$id_car_modification = $_REQUEST['mod'];

$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/car_equipment.csv', 'r');

$fields = fgetcsv($file);
while (($row = fgetcsv($file)) !== false) {
    if ($row[0] == $id_car_modification) {
    $equipment[] = array_combine($fields, $row);
  }
}
fclose($file);

?>


<? if(!empty($equipment)) { ?>


                    <div class="brand-ad update-block auto-equipment">
                        <div class="new-ad__form-item">
                            <h2 class="new-ad__item-title">Выберите комплектацию</h2>
                            <div class="new-ad__item-content">
                                <div class="new-ad__flex-full">

                                                                        
                                    <label class="new-ad__input-box">
                                        <select id="auto-model" name="equipment">
                                            <option value="none" selected>
                                            <? foreach ($equipment as $item) { ?>
                                            <option value="<?= $item['id_car_equipment'] ?>"><?= $item['name'].' '.$item['year'] ?></option>
                                            <? } ?>
                                        </select>
                                    </label>
                                                                        


                                </div>
                            </div>

                        </div>
                    </div>

<script>
          // выбор кузова и переход к серии
        $(document).ready(function () {
        $('select[name=equipment]').change(function () {
            var equipment = $(this).val();
            var model = '<?= $id_model ?>';

            var newDiv = $("<div>").addClass("parameters-ad new-ad__form-item update-block param2-1-wrap");
            
    
            $.ajax({
                type: 'post',
                url: '/ajax/category/transport/param2-1.php',
                data: { equipment: equipment, model: model },
                dataType: 'html',
                success: function (e) {
                    $('.param2-1-wrap').remove();
                    $(".new-ad__form").append(newDiv);

                    $('.param2-1-wrap').empty().append(e);
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

 <? } else { ?>

<script>

        $(document).ready(function () {
            var model = '<?= $id_model ?>';


            $.ajax({
                type: 'post',
                url: '/ajax/category/transport/param3.php',
                data: { model: model },
                dataType: 'html',
                success: function (e) {
                    $(".new-ad__form").append(e);
                    console.log(e);

                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
</script>


<? } ?>