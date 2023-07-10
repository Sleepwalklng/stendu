<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
global $USER;

if ($USER->IsAuthorized()) {
    if (!empty($_REQUEST['userId'])) {
        $idUser = $USER->GetID();
        $rsUser = CUser::GetByID($idUser);
        $arUser = $rsUser->Fetch();
        $arElements = $arUser['UF_SUBSCRIPTION'];

        $rsSeller = CUser::GetByID($_REQUEST['userId']);
        $arSeller = $rsSeller->Fetch();
        $arSubs = $arSeller['UF_SUBSCRIBERS'];

        if ($_REQUEST['oper'] == 'unsubscribe') {
            $key = array_search($_REQUEST['userId'], $arElements);
            $keyS = array_search($idUser, $arSubs);
            unset($arElements[$key]);
            unset($arSubs[$keyS]);
            $result = 4;
        } else {
            if (in_array($_REQUEST['userId'], $arElements)) {
                $result = 0;
            } elseif ($_REQUEST['userId'] == $idUser) {
                $result = 2;
            } else {
                $arElements[] = $_REQUEST['userId'];
                $arSubs[] = $idUser;
                $result = 1;
            }
        }
        $USER->Update($idUser, array("UF_SUBSCRIPTION" => $arElements));
        $USER->Update($_REQUEST['userId'], array("UF_SUBSCRIBERS" => $arSubs));
    } else {
        $result = 'error';
    }
} else {
    $result = 3;
}
echo json_encode($result);