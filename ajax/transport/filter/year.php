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



          <div class="info__item info__item--range filter-year">
                  <div class="info__item-text">Год</div>

                  <div class="info__select year1">
                    <input class="info__select-input" readonly placeholder="от" type="number" name="ot">

                    <ul class="info__list year2">

                      <? foreach (print_years($pokolenie['0']['year_begin'], $pokolenie['0']['year_end']) as $item) { ?>
                      <li class="info__box">
                        <button data-id="<?= $item ?>" class="info__elem" type="button"><?= $item ?></button>
                      </li>
                      <? } ?>

                    </ul>
                  </div>

                  <div class="info__select year1">
                    <input class="info__select-input" readonly placeholder="до" type="number" name="do">

                    <ul class="info__list year2">
                      <? foreach (print_years($pokolenie['0']['year_begin'], $pokolenie['0']['year_end']) as $item) { ?>
                      <li class="info__box">
                        <button data-id="<?= $item ?>" class="info__elem" type="button"><?= $item ?></button>
                      </li>
                      <? } ?>
                    </ul>
                  </div>
                </div>

                <div class="info__item info__item--short" style="margin-left: 1rem">
                  <div class="info__select year1">
                    <input class="info__select-input" readonly placeholder="Кузов" type="text" value="<?/*= $serie['0']['name']*/ ?>" name="serie">

                    <ul class="info__list year2">

                      <? foreach ($serie as $item) { ?>
                      <li class="info__box">
                        <button class="info__elem auto-mod" data-id="<?= $item['id_car_serie'] ?>" type="button"><?= $item['name'] ?></button>
                      </li>
                      <? } ?>

                    </ul>
                  </div>
                </div>

<script>
var model = <?= $id_model ?>;

  $('.year1').on('click', function () {
  if (!$(this).hasClass('info__select--active')) {
    //$('.info__select').removeClass('info__select--active').find('.info__list').css('display', 'none');
    //$(this).toggleClass('info__select--active');
    $(this).find('.info__list').slideToggle();
  } 
});

$('.year2').on('click', '.info__elem',function () {
  $(this).closest('.info__select').find('.info__select-input').val($(this).text());
});

$(document).ready(function () {
$('.auto-mod').click(function () {
        var data =$(this).attr('data-id');

        console.log(data); console.log(model);

        $.ajax({
            type: 'post',
            url: '/ajax/transport/filter/mod.php',
            data: { kuzov: data, model: model },
            dataType: 'html',
            success: function (e) {
                $('.filter-mod').empty();
                $('.filter-mod').append(e);
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