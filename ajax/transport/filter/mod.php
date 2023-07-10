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

          <div class="info__select mod1">
                    <input class="info__select-input" readonly placeholder="Модификация" name="mod" type="text">
                    <ul class="info__list mod2">
                      <? foreach ($modif as $item) { ?>
                      <li class="info__box">
                        <button data-id="<?= $item['id_car_modification'] ?>" class="info__elem auto-param1" type="button"><?= $item['name'] ?></button>
                      </li>
                      <? } ?> 
              </ul>
            </div>

        
<script>
var model = <?= $id_model ?>;

  $('.mod1').on('click', function () {
  if (!$(this).hasClass('info__select--active')) {
    //$('.info__select').removeClass('info__select--active').find('.info__list').css('display', 'none');
    //$(this).toggleClass('info__select--active');
    $(this).find('.info__list').slideToggle();
  } 
});

$('.mod2').on('click', '.info__elem',function () {
  $(this).closest('.info__select').find('.info__select-input').val($(this).text());
});

$(document).ready(function () {
$('.auto-param1').click(function () {
        var data =$(this).attr('data-id');

        console.log(data); console.log(model);

        $.ajax({
            type: 'post',
            url: '/ajax/transport/filter/param1.php',
            data: { mod: data, model: model },
            dataType: 'html',
            success: function (e) {
                $('.filter-param1').empty();
                $('.filter-param1').append(e);
                console.log(e);

            },
            error: function (e) {
                console.log(false);
            }
        });
        //return false;
    })
});
</script>