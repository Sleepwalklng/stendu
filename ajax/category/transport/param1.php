<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

$id_model = $_REQUEST['model'];
$id_mod = $_REQUEST['mod'];


// 12 - двигатель
$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/param1.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
  if ($row[0] == $id_mod && $row[1] == 12) {
    $dvigatel[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);

// 27 - привод
$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/param1.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
  if ($row[0] == $id_mod && $row[1] == 27) {
    $privod[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);

// 24 - коробка
$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/param1.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
  if ($row[0] == $id_mod && $row[1] == 24) {
    $korobka[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);

?>





           <div class="announcement-content__block announcement-content__car-parameters zero">
               <div class="announcement-content__block-wrap grid">


                   <div class="col_33">
                       <div class="label">
                           <div class="announcement-label__title">Двигатель</div>
                           <select name="DVIGATEL" id="">
                               <? foreach ($dvigatel as $item) { ?>
                               <option value="<?= $item['value'] ?>"><?= $item['value'] ?></option>
                               <? } ?>
                           </select>
                       </div>
                   </div>

                   <div class="col_33">
                       <div class="label">
                           <div class="announcement-label__title">Привод</div>
                           <select name="PRIVOD" id="">
                               <? foreach ($privod as $item) { ?>
                               <option value="<?= $item['value'] ?>"><?= $item['value'] ?></option>
                               <? } ?>
                           </select>
                       </div>
                   </div>

                   <div class="col_33">
                       <div class="label">
                           <div class="announcement-label__title">Коробка передач</div>
                           <select name="KOROBKA" id="">
                               <? foreach ($korobka as $item) { ?>
                               <option value="<?= $item['value'] ?>"><?= $item['value'] ?></option>
                               <? } ?>
                           </select>
                       </div>
                   </div>




               </div>
           </div>


<script>
        /*$(document).ready(function () {
            var model = '<?= $id_model ?>';
            var mod = '<?= $id_mod ?>';

            $.ajax({
                type: 'post',
                url: '/ajax/category/transport/param2.php',
                data: { model: model, mod: mod },
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
        })*/
        if ($(`select`)) {
            $(`select`).niceSelect()
        }
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