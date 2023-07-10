<?php
$eventManager = \Bitrix\Main\EventManager::getInstance();

$eventManager->addEventHandler('', 'UslugiOnAfterAdd', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'UslugiOnBeforeUpdate', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'UslugiOnBeforeDelete', 'OnAfterAddUpdateDelete');

$eventManager->addEventHandler('', 'ResumeOnAfterAdd', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'ResumeOnBeforeUpdate', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'ResumeOnBeforeDelete', 'OnAfterAddUpdateDelete');

$eventManager->addEventHandler('', 'NedvizhimostOnAfterAdd', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'NedvizhimostOnBeforeUpdate', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'NedvizhimostOnBeforeDelete', 'OnAfterAddUpdateDelete');

$eventManager->addEventHandler('', 'TransportOnAfterAdd', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'TransportOnBeforeUpdate', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'TransportOnBeforeDelete', 'OnAfterAddUpdateDelete');

$eventManager->addEventHandler('', 'WorkOnAfterAdd', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'WorkOnBeforeUpdate', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'WorkOnBeforeDelete', 'OnAfterAddUpdateDelete');

$eventManager->addEventHandler('', 'PersonalItemsOnAfterAdd', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'PersonalItemsOnBeforeUpdate', 'OnAfterAddUpdateDelete');
$eventManager->addEventHandler('', 'PersonalItemsOnBeforeDelete', 'OnAfterAddUpdateDelete');


function OnAfterAddUpdateDelete(\Bitrix\Main\Entity\Event $event)
{
    global $USER;
    $id = $event->getParameter("id");
    $arFields = $event->getParameter("fields");
    $userFieldsId = $arFields['UF_USER_ID'];
    if (is_array($id))
        $id = $id["ID"];
    if (!$id)
        return;
    $eventType = $event->getEventType();
    if ($eventType == 'UslugiOnAfterAdd' || $eventType == 'ResumeOnAfterAdd' || $eventType == 'NedvizhimostOnAfterAdd' || $eventType == 'TransportOnAfterAdd' || $eventType == 'WorkOnAfterAdd' || $eventType == 'PersonalItemsOnAfterAdd') {
        $str = 'добавил';
    } elseif ($eventType == 'UslugiOnBeforeDelete' || $eventType == 'ResumeOnBeforeDelete' || $eventType == 'NedvizhimostOnBeforeDelete' || $eventType == 'TransportOnBeforeDelete' || $eventType == 'WorkOnBeforeDelete' || $eventType == 'PersonalItemsOnBeforeDelete') {
        if ($eventType == 'UslugiOnBeforeDelete') {
            $highloadBlockId = 1;
            $section = 4;
        } elseif ($eventType == 'ResumeOnBeforeDelete') {
            $highloadBlockId = 17;
            $section = 6;
        } elseif ($eventType == 'NedvizhimostOnBeforeDelete') {
            $highloadBlockId = 2;
            $section = 2;
        } elseif ($eventType == 'TransportOnBeforeDelete') {
            $highloadBlockId = 3;
            $section = 1;
        } elseif ($eventType == 'WorkOnBeforeDelete') {
            $highloadBlockId = 11;
            $section = 3;
        } elseif ($eventType == 'PersonalItemsOnBeforeDelete') {
            $highloadBlockId = 13;
            $section = 5;
        }
        $previousValues = getPreviousFieldValues($id, $highloadBlockId);
        $userFieldsId = $previousValues['UF_USER_ID'];
        $str = 'удалил объявление ' . $previousValues['UF_NAME'];
        $rsUsers = CUser::GetList(array('sort' => 'asc'), 'sort');
        while ($user = $rsUsers->GetNext()) {
            $rUser = CUser::GetByID($user['ID']);
            $arrUser = $rUser->Fetch();
            if (in_array($section . '-' . $id, $arrUser['UF_FAVOR'])) {
                $key = array_search($section . '-' . $id, $arrUser['UF_FAVOR']); // Находим элемент, который нужно удалить из избранного
                unset($arrUser['UF_FAVOR'][$key]);
                $arNotice = $arrUser['UF_NOTICE'];
                $arNotice[] = 'Добавленное в избранное объявление удалено ' . '<product>'.$previousValues['UF_NAME'];
                $USER->Update($user['ID'], array("UF_NOTICE" => $arNotice));
            }
        }
    } else {
        $str = 'изменил';
        $strPrice = ' объявление ';
        if ($eventType == 'UslugiOnBeforeUpdate') {
            $highloadBlockId = 1;
            $section = 4;
        } elseif ($eventType == 'ResumeOnBeforeUpdate') {
            $highloadBlockId = 17;
            $section = 6;
        } elseif ($eventType == 'NedvizhimostOnBeforeUpdate') {
            $highloadBlockId = 2;
            $section = 2;
        } elseif ($eventType == 'TransportOnBeforeUpdate') {
            $highloadBlockId = 3;
            $section = 1;
        } elseif ($eventType == 'WorkOnBeforeUpdate') {
            $highloadBlockId = 11;
            $section = 3;
        } elseif ($eventType == 'PersonalItemsOnBeforeUpdate') {
            $highloadBlockId = 13;
            $section = 5;
        }
        $previousValues = getPreviousFieldValues($id, $highloadBlockId);
        if ($arFields['UF_STATUS'] != $previousValues['UF_STATUS']) {
            $statuses = [84, 29, 24, 49, 34];
            if (in_array($previousValues['UF_STATUS'], $statuses)) {
                $publish = 'off';
            } elseif (in_array($arFields['UF_STATUS'], $statuses)) {
                $publish = 'on';
            }
        } else if ($arFields['UF_PRICE'] != $previousValues['UF_PRICE']) {
            $strPrice = ' цену в объявлении ' . $previousValues['UF_PRICE'] . '€ -> ' . $arFields['UF_PRICE'] . '€';
        }
        $rsUsers = CUser::GetList(array('sort' => 'asc'), 'sort');
        while ($user = $rsUsers->GetNext()) {
            $rUser = CUser::GetByID($user['ID']);
            $arrUser = $rUser->Fetch();
            if (in_array($section . '-' . $id, $arrUser['UF_FAVOR'])) {
                $previousValues = getPreviousFieldValues($id, $highloadBlockId);
                $arNotice = $arrUser['UF_NOTICE'];
                if ($arFields['UF_STATUS'] != $previousValues['UF_STATUS']) {
                    $statuses = [84, 29, 24, 49, 34];
                    if (in_array($previousValues['UF_STATUS'], $statuses)) {
                        $arNotice[] = 'Добавленное в избранное объявление снято с публикации ' . '<product>'.$arFields['UF_NAME'];
                    } elseif (in_array($arFields['UF_STATUS'], $statuses)) {
                        $arNotice[] = 'Добавленное в избранное объявление опубликовано ' . '<product>'.$arFields['UF_NAME'];
                    }
                } else if ($arFields['UF_PRICE'] != $previousValues['UF_PRICE']) {
                    $arNotice[] = 'Добавленное в избранное объявление изменилась цена ' . $previousValues['UF_PRICE'] . '€ -> ' . $arFields['UF_PRICE'] . '€'.'<product>'.$arFields['UF_NAME'];
                } else {
                    $arNotice[] = 'Добавленное в избранное объявление изменено ' . '<product>'.$arFields['UF_NAME'];
                }
                $USER->Update($user['ID'], array("UF_NOTICE" => $arNotice));
            }
        }
    }

    if ($userFieldsId) {
        $rsUser = CUser::GetByID($userFieldsId);
        $arUser = $rsUser->Fetch();
        $arSubs = $arUser['UF_SUBSCRIBERS'];
        if (!empty($arSubs)) {
            foreach ($arSubs as $idSub) {
                $rsSub = CUser::GetByID($idSub);
                $arUserSub = $rsSub->Fetch();
                $arNotice = $arUserSub['UF_NOTICE'];
                if ($publish == 'off') {
                    $arNotice[] = 'Продавец ' . ($arUser['NAME'] || $arUser['LAST_NAME'] ? $arUser['NAME'] . " " . $arUser['LAST_NAME'] : 'Имя не указано') . ' снял с публикации объявление ' . '<product>'.$arFields['UF_NAME'];
                } else if ($publish == 'on') {
                    $arNotice[] = 'Продавец ' . ($arUser['NAME'] || $arUser['LAST_NAME'] ? $arUser['NAME'] . " " . $arUser['LAST_NAME'] : 'Имя не указано') . ' опубликовал объявление ' . '<product>'.$arFields['UF_NAME'];
                } else {
                    $arNotice[] = 'Продавец ' . ($arUser['NAME'] || $arUser['LAST_NAME'] ? $arUser['NAME'] . " " . $arUser['LAST_NAME'] : 'Имя не указано') . ' ' . $str . $strPrice . ' ' . '<product>'.$arFields['UF_NAME'];
                }
                $USER->Update($idSub, array("UF_NOTICE" => $arNotice));
            }
        }
    }
}
