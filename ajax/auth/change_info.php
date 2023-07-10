<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
CModule::IncludeModule('main');
CModule::IncludeModule('subscribe');

use Bitrix\Main\UserTable;
$USER = new CUser;
$name = trim(strip_tags(htmlspecialchars($_POST['NAME'])));
$country = trim(strip_tags(htmlspecialchars($_POST['COUNTRY'])));
$telephone = trim(strip_tags(htmlspecialchars($_POST['TELEPHONE'])));
$email = trim(strip_tags(htmlspecialchars($_POST['EMAIL'])));
if (!empty($name) && !empty($country) && !empty($telephone) && !empty($email)){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $fields = Array(
            "NAME"              => $name,
            "EMAIL"             => $email,
            "LOGIN"             => $email,
            "PERSONAL_PHONE"    => $telephone,
            "UF_CITY"       => $country
        );
      $update =  $USER->Update($USER->GetID(), $fields);

      if ($update){
          echo "Ваши данные были изменены";
      }
    }else{
        echo 'Почта введена неверно';
    }
}else{
    echo "Заполните все поля!";
}