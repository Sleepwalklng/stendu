<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");



$id_car_equipment = '4674';

$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/car_option_value.csv', 'r');

$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
	if ($row[1] == $id_car_equipment) {
    $car_option[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);

foreach ($car_option as $id) {
	$id_car_option[] = $id['id_car_option'];
}


$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/car_option.csv', 'r');

$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
	if (in_array($row[0], $id_car_option)) {
    $option[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);

/*$id_mod = '200471';

// 12 - двигатель
$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/param1.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
  if ($row[0] == $id_mod && $row[1] == 12) {
    $dvigatel[] = str_replace("'", "", array_combine($fields, $row));
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

// 27 - привод
$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/param1.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
  if ($row[0] == $id_mod && $row[1] == 27) {
    $privod[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);*/
?>
<pre>
    <?print_r($option)?>
</pre>



<pre>
    <?print_r($dvigatel)?>
</pre>
<pre>
    <?print_r($korobka)?>
</pre>
<pre>
    <?print_r($privod)?>
</pre>