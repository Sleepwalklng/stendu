<?
if (!empty($_REQUEST['NAME']) && !empty($_REQUEST['EMAIL']) && !empty($_REQUEST['TEXT'])) {

    $message = 'STENDU: обратная связь.' . "\r\n"
        . 'Имя: ' . $_REQUEST['NAME'] . "\r\n"
        . 'Почта: ' . $_REQUEST['EMAIL'] . "\r\n"
        . 'Вопрос: ' . $_REQUEST['TEXT'];

    $to = 'andrew7re@gmail.com';

    $subject = 'STENDU: обратная связь';

    mail($to, $subject, $message);

    echo json_encode(1);
} else {
    $res_json = [];
    if (empty($_REQUEST['NAME'])) {
        $res_json['NAME'] = 'Укажите имя';
    }
    if (empty($_REQUEST['EMAIL'])) {
        $res_json['EMAIL'] = 'Укажите email';
    }
    if (empty($_REQUEST['TEXT'])) {
        $res_json['TEXT'] = 'Напишите сообщение';
    }
    echo json_encode($res_json);
}

die();

?>