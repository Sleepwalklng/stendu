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


              <div class="info__item info__item--short par1">
                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="Двигатель" type="text" name="dvigatel">

                    <ul class="info__list par2">
                      
                       <? foreach ($dvigatel as $item) { ?>
                       <li class="info__box">
                        <button data-id="<?= $item['value'] ?>" class="info__elem" type="button"><?= $item['value'] ?></button>
                       </li>
                       <? } ?>

                    </ul>
                  </div>
                </div>

                <div class="info__item info__item--short par1">
                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="Привод" type="text" name="privod">

                    <ul class="info__list par2">
                      <? foreach ($privod as $item) { ?>
                       <li class="info__box">
                        <button data-id="<?= $item['value'] ?>" class="info__elem" type="button"><?= $item['value'] ?></button>
                       </li>
                       <? } ?>
                    </ul>
                  </div>
                </div>

                <div class="info__item info__item--short par1"  style="margin-left: 1rem">
                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="Коробка" type="text" name="korobka">

                    <ul class="info__list par2">
                      <? foreach ($korobka as $item) { ?>
                       <li class="info__box">
                        <button data-id="<?= $item['value'] ?>" class="info__elem" type="button"><?= $item['value'] ?></button>
                       </li>
                       <? } ?>
                    </ul>
                  </div>
                </div>

<script>
$('.par1').on('click', function () {
  if (!$(this).hasClass('info__select--active')) {
    $(this).find('.info__list').slideToggle();
  } 
});

$('.par2').on('click', '.info__elem',function () {
  $(this).closest('.info__select').find('.info__select-input').val($(this).text());
});

</script>