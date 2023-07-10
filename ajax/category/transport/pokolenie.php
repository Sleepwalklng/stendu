<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';


$id_model = "'{$_REQUEST['data']}'";

$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/generation.getAll.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
    if ($row[1] == $id_model) {
    $pokolenie[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);


?>

                        <div class="announcement-content__block announcement-content__car-parameters zero">
                            <div class="announcement-content__block-wrap grid">


                            <div class="col_100">
                                <div class="label">
                                    <div class="announcement-label__title">Выберите поколение</div>
                                    <select name="POKOLENIE">
                                            <option value="none" selected>
                                            <? foreach ($pokolenie as $item) { ?>
                                            <option value="<?= $item['id_car_generation'] ?>"><?= $item['name']. ' ('. $item['year_begin'].'-'.$item['year_end'] .')' ?></option>
                                            <? } ?>
                                        </select>
                                </div>
                            </div>

                            </div>
                        </div>




<script>
        if ($(`select`)) {
            $(`select`).niceSelect()
        }

        // выбор поколения и переход к параметрам
        $(document).ready(function () {
        $('select[name=POKOLENIE]').change(function () {
            var data = $(this).val();
            var model = '<?= $_REQUEST['data'] ?>';

            console.log(data);
            console.log(model);

            var newDiv = $("<section>").addClass("announcement zero update-block update1 year-wrap");
            
    
            $.ajax({
                type: 'post',
                url: '/ajax/category/transport/year-kuzov.php',
                data: { data: data, model: model },
                dataType: 'html',
                success: function (e) {
                    $('.update2').remove();
                    $('.year-wrap').remove();
                    $(".new-ad__form").append(newDiv);
                    $('.year-wrap').empty().css('display', 'block').append(e);

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