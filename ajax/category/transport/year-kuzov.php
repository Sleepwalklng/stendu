<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

$id_model = $_REQUEST['model'];
$id_model2 = "'{$_REQUEST['model']}'";
$id_pokolenie = "'{$_REQUEST['data']}'";

$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/generation.getAll.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
    if ($row[0] == $id_pokolenie) {
    $pokolenie[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);


function print_years($start_year, $end_year) {
    for ($i = $start_year; $i <= $end_year; $i++) {
        $result[] = $i;
    }
    return $result;
}


$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/serie.getAll.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
    if ($row[1] == $id_model2 && $row[2] == $id_pokolenie) {
    $serie[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);

?>

                        <div class="announcement-content__block announcement-content__car-parameters zero">
                            <div class="announcement-content__block-wrap grid">


                            <div class="col_50">
                                <div class="label">
                                    <div class="announcement-label__title">Выберите год</div>
                                    <select name="YEAR">
                                       <option value="none" selected>
                                       <? foreach (print_years($pokolenie['0']['year_begin'], $pokolenie['0']['year_end']) as $item) { ?>
                                       <option value="<?= $item ?>"><?= $item ?></option>
                                        <? } ?>
                                   </select>
                                </div>
                            </div>

                            <div class="col_50">
                                <div class="label">
                                    <div class="announcement-label__title">Выберите кузов</div>
                                    <select name="KUZOV">
                                         <option value="none" selected>
                                         <? foreach ($serie as $item) { ?>
                                         <option value="<?= $item['id_car_serie'] ?>"><?= $item['name'] ?></option>
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


          // выбор кузова и переход к серии
        $(document).ready(function () {
        $('select[name=KUZOV]').change(function () {
            var kuzov = $(this).val();
            var model = '<?= $id_model ?>';

            var newDiv = $("<section>").addClass("announcement zero update-block update1 update2 auto-serie");
            
    
            $.ajax({
                type: 'post',
                url: '/ajax/category/transport/serie.php',
                data: { kuzov: kuzov, model: model },
                dataType: 'html',
                success: function (e) {
                    $('.auto-serie').remove();
                    $(".new-ad__form").append(newDiv);

                    $('.auto-serie').empty().append(e);
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