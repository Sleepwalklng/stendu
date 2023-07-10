<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

$id_model = $_REQUEST['model'];
$id_model2 = "'{$_REQUEST['model']}'";
$id_serie = "'{$_REQUEST['kuzov']}'";


$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/modification.getAll.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
    if ($row[2] == $id_model2 && $row[1] == $id_serie) {
    $modif[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);

?>


              <div class="announcement-content__block announcement-content__car-parameters zero">
               <div class="announcement-content__block-wrap grid">


                   <div class="col_100">
                       <div class="label">
                           <div class="announcement-label__title">Выберите модификацию</div>
                           <select name="MOD" id="">
                               <option value="none" selected>
                               <? foreach ($modif as $item) { ?>
                               <option value="<?= $item['id_car_modification'] ?>"><?= $item['name'] ?></option>
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
        $('select[name=MOD]').change(function () {
            var mod = $(this).val();
            var model = '<?= $id_model ?>';

            var newDiv = $("<section>").addClass("announcement zero update-block update1 update2 param1-wrap");
            
    
            $.ajax({
                type: 'post',
                url: '/ajax/category/transport/param1.php',
                data: { mod: mod, model: model },
                dataType: 'html',
                success: function (e) {
                    $('.update3').remove();
                    $('.param1-wrap').remove();
                    $(".new-ad__form").append(newDiv);

                    $('.param1-wrap').empty().append(e);
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