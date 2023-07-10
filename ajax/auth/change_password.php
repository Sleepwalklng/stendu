<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
CModule::IncludeModule('main');

use Bitrix\Main\UserTable;

$USER = new CUser;
$old_password = trim(strip_tags(htmlspecialchars($_POST['OLD_PASSWORD'])));
$new_password1 = trim(strip_tags(htmlspecialchars($_POST['PASSWORD'])));
$new_password2 = trim(strip_tags(htmlspecialchars($_POST['PASSWORD_CONFIRM'])));
if (!empty($old_password) && !empty($new_password1) && !empty($new_password2)) {
    if ($new_password1 == $new_password2) {
        if (mb_strlen($new_password1) < 6){
            echo 'Пароль должен состоять минимум из 6 символов';
        }elseif (!preg_match("/([0-9]+[a-z]+)|([a-z]+[0-9]+)/i", $new_password1)){
            echo 'Пароль должен состоять из латинских букв и цифр';
        }
        else {
            $rsUser = CUser::GetByLogin($USER->GetEmail());
            $arUser = $rsUser->Fetch();
            if (\Bitrix\Main\Security\Password::equals($arUser['PASSWORD'], $old_password)) {
                $fields = array(
                    "PASSWORD" => $new_password1,
                    "CONFIRM_PASSWORD" => $new_password2,
                );
                $password_update = $USER->Update($USER->GetID(), $fields);
                echo $password_update;
            }else{
                echo 'Старый пароль неверный.';

            }
        }
    } else {
        echo 'Пароли не совпадают.';
    }
} else {
    echo 'Заполните все поля!';
}