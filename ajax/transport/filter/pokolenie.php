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

									<div class="info__select pok1">
                    <input class="info__select-input" readonly placeholder="Поколение" type="text" name="pokolenie">

                    <ul class="info__list pok2">

											<? foreach ($pokolenie as $item) { ?>
                      <li class="info__box">
                        <button data-id="<?= $item['id_car_generation'] ?>" class="info__elem auto-pokolenie" type="button"><?= $item['name']. ' ('. $item['year_begin'].'-'.$item['year_end'] .')' ?></button>
                      </li>
                      <? } ?>

                    </ul>
                  </div>

<script>
var model = <?= $id_model ?>;

$('.pok1').on('click', function () {
  if (!$(this).hasClass('info__select--active')) {
    $(this).find('.info__list').slideToggle();
  } 
});

$('.pok2').on('click', '.info__elem',function () {
  $(this).closest('.info__select').find('.info__select-input').val($(this).text());
});


$(document).ready(function () {
$('.auto-pokolenie').click(function () {
        var data =$(this).attr('data-id');

        console.log(data); console.log(model);

        $.ajax({
            type: 'post',
            url: '/ajax/transport/filter/year.php',
            data: { data: data, model: model },
            dataType: 'html',
            success: function (e) {
            		$('.year-kuzov').empty();
      					$('.year-kuzov').append(e);
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