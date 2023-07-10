<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
CModule::IncludeModule('main');

use Bitrix\Main\UserTable;

$USER = new CUser;
$login = trim(strip_tags(htmlspecialchars($_REQUEST['LOGIN'])));
$password1 = trim(strip_tags(htmlspecialchars($_REQUEST['PASSWORD'])));
$password2 = trim(strip_tags(htmlspecialchars($_REQUEST['PASSWORD_CONFIRM'])));
if (!empty($password1) && !empty($password2)) {
    $uppercase = preg_match('@[A-Z]@', $password1);
    $lowercase = preg_match('@[a-z]@', $password1);
    $number = preg_match('@[0-9]@', $password1);
    if (!$uppercase || !$lowercase || !$number || strlen($password1) < 8) {
        echo 'Пароль должен состоять не менее чем из 8 символов и содержать как минимум одну заглавную букву, одну цифру и один специальный символ.';
    } elseif ($password1 !== $password2) {
        echo 'Пароли не совпадают';
    } else {
        $arResult = $USER->ChangePassword($login, $_REQUEST['CHECKWORD'], $password1, $password2);
        if ($arResult["TYPE"] == "OK") {echo "1";}
        else{echo $arResult['MESSAGE'];}
    }
} else {
    echo 'Для смены пароля заполните все поля';
}
