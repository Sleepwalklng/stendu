<?php

namespace lib;

use \Bitrix\Main\Loader;
use Bitrix\Main\UserTable as CUser;



class GetUserData
{
    public static function getUser($id):array
    {
        $rsUser = CUser::GetByID($id);
        $rsUsers = $rsUser->Fetch();

        $rsUsers['NAME'] = $rsUsers['NAME'] || $rsUsers['LAST_NAME'] ? $rsUsers['NAME'] . " " . $rsUsers['LAST_NAME'] : 'Имя не указано';

        return $rsUsers;
    }
}