<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

global $USER;

$loginToAuth = $_REQUEST["EMAIL"];
$passwordToAuth = $_REQUEST["PASSWORD"];

$arAuthResult = $USER->Login($loginToAuth, $passwordToAuth, "Y");
$APPLICATION->arAuthResult = $arAuthResult;

if (!$USER->IsAuthorized()) {

     echo json_encode('Неверный логин/пароль');
       
 } else {

      /*$data = array("username" =>  $_REQUEST["EMAIL"], "password" => $_REQUEST["PASSWORD"], "token" => "6ef23769-092b-4d4d-8c0f-b67b1ad26bd8");
     $data_string = json_encode ($data, JSON_UNESCAPED_UNICODE);
     $curl = curl_init('https://chatdev.mayabiorobotics.ru/api/signin');
     curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
     curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
     $result = curl_exec($curl);
     curl_close($curl);*/

     $rsUser = CUser::GetByID($USER->GetID());
     $arUser = $rsUser->Fetch();

         //  Авторизация
     $data = array("userId" =>  /*$loginToAuth*/$arUser['UF_CHAT']);
     $data_string = json_encode ($data, JSON_UNESCAPED_UNICODE);
     $curl = curl_init('https://chatdev.mayabiorobotics.ru/server/api/signin');
     curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
     curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer 434bc88f-f388-498a-8309-df2adab91809', 'Content-Length: ' . strlen($data_string)));
     $result = curl_exec($curl);
     /////// curl_close

     $result = json_decode($result, true);
     $res['jwtToken'] = $result['jwtToken'];
     $res['exchangeName'] = $result['exchangeName'];

   // Получение ID
     $curl2 = curl_init('https://chatdev.mayabiorobotics.ru/api/user/auth');
     curl_setopt($curl2, CURLOPT_CUSTOMREQUEST, "GET");
     curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl2, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer '.$res['jwtToken'].''));
     $resultID = curl_exec($curl2);
     curl_close($curl2);  /////// curl_close

     $result2 = json_decode($resultID, true);

     $res['userID'] = $result2['userId'];

     echo json_encode($res);
     
 } 




?>