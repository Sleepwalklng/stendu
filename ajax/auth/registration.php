<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('main');
CModule::IncludeModule('iblock');
CModule::IncludeModule('user');
CModule::IncludeModule("socialservices");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(strip_tags(trim($_REQUEST["NAME"])));
    $email = htmlspecialchars(strip_tags(trim($_REQUEST["EMAIL"])));
    $password = htmlspecialchars(strip_tags(trim($_REQUEST["PASSWORD"])));
    $password2 = htmlspecialchars(strip_tags(trim($_REQUEST["PASSWORD_CONFIRM"])));
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $number_name = preg_match('@[0-9]@', $name);
//    print_r($name);
    if (empty($name) || empty($email) || empty($password) || empty($password2)) {
        $errors = "Заполните все поля";
    } else if ($number_name) {
        $errors = "Поля ммя содержит недопустимые символы ";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = "Некорректный e-mail";
    } else if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        $errors = 'Пароль должен состоять не менее чем из 8 символов и содержать как минимум одну заглавную букву, одну цифру и один специальный символ.';
    } else if ($password != $password2) {
        $errors = "Пароли не совпадают";
    }

    if (empty($errors)) {

        $arFields = array(
            "NAME" => $name,
            "EMAIL" => $email,
            "LOGIN" => $email,
            "PASSWORD" => $password,
            "CONFIRM_PASSWORD" => $password,
            "ACTIVE" => "N",
            "GROUP_ID" => array(2), // ID группы зарегистрированных пользователей
        );

        $user = new CUser;
        $userId = $user->Add($arFields);

        if ($userId) {

            $confirmCode = randString(8);
            echo "Для завершения регистрации пройдите по ссылке отправленная вам на почту";
            CUser::SendUserInfo($userId, SITE_ID, "Вы зарегистрированы на сайте", true, "", "", $confirmCode);

            $arFields = array(
                "CONFIRM_CODE" => $confirmCode,
            );

            $user->Update($userId, $arFields);
        }

//        LocalRedirect("/registration-successful/");
        AddEventHandler("main", "OnBeforeUserAdd", "CheckEmailUniqueness");
        function CheckEmailUniqueness(&$arFields)
        {
            if (isset($arFields["EMAIL"]) && !empty($arFields["EMAIL"])) {
                $user = CUser::GetList($by = "ID", $order = "ASC", array("EMAIL" => $arFields["EMAIL"]));
                if ($user->SelectedRowsCount() > 0) {
                    global $APPLICATION;
                    $APPLICATION->ThrowException("Пользователь с таким e-mail уже зарегистрирован");
                    return false;
                }


            }
        }

        AddEventHandler("main", "OnBeforeUserUpdate", "CheckEmailConfirmation");
        function CheckEmailConfirmation(&$arFields)
        {
            if (isset($arFields["EMAIL"]) && !empty($arFields["EMAIL"])) {
                $user = CUser::GetList($by = "ID", $order = "ASC", array("EMAIL" => $arFields["EMAIL"]));
                if ($user->SelectedRowsCount() > 0) {
                    $arUser = $user->Fetch();

                    if ($arUser["ACTIVE"] == "N" && empty($arFields["CONFIRM_CODE"])) {
                        global $APPLICATION;
                        $APPLICATION->ThrowException("E-mail не подтвержден");
                        return false;
                    }
                }
            }
        }


    } else {
        echo $errors;
    }
}
?>