<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
CModule::IncludeModule('main');

use Bitrix\Main\UserTable;

$USER = new CUser;
$email = trim(strip_tags(htmlspecialchars($_REQUEST['EMAIL'])));
if (!empty($email)) {
    $rsUser = CUser::GetByLogin($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Почта введена некорректно!';
    }elseif ($arUser = $rsUser->Fetch()){
        $arResult = $USER->SendPassword($email, $email);
        if($arResult["TYPE"] == "OK") echo "1";
    }else{
        echo "Введенный логин (email) не найден!";
    }
} else {
    echo 'Заполните поле для почты';
}