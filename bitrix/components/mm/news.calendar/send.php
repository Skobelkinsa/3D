<?php
/**
 * Created by PhpStorm.
 * User: semen
 * Date: 05.09.18
 * Time: 17:57
 */
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
header('Content-Type: application/json; charset=utf-8');
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$arEventFields = array( // Свойства
    "NAME"   => $_POST['NAME'],
    "PHONE"   => $_POST['PHONE'],
    "DATE"   => $_POST['DATE']
);

CEvent::Send("calendar", "3d", $arEventFields, 21);
echo "Сообщение отправлено!";

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
