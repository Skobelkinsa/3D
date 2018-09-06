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

$CHELUST = "<ul>";
foreach ($_POST["area"] as $item)
    $CHELUST .= "<li>".$item."</li>";
$CHELUST .= "</ul>";

$TOMOGRAPH = "<ul>";
foreach ($_POST["tomograf"] as $item)
    $TOMOGRAPH .= "<li>".$item."</li>";
$TOMOGRAPH .= "</ul>";

$RENGEN = "<ul>";
foreach ($_POST["rengen"] as $item)
    $RENGEN .= "<li>".$item."</li>";
$RENGEN .= "</ul>";

$ADD = "<ul>";
foreach ($_POST["add"] as $item)
    $ADD .= "<li>".$item."</li>";
$ADD .= "</ul>";

$arEventFields = array( // Свойства
    "NAME"   => $_POST['name'],
    "DOCTOR"   => $_POST['doctor'],
    "DOCTOR_PHONE"   => $_POST['doctor_phone'],
    "ADRESS_CLINIC"   => $_POST['adr'],
    "TOMOGRAPH"   => $TOMOGRAPH,
    "CHELUST"   => $CHELUST,
    "RENGEN"   => $RENGEN,
    "ADD"   => $ADD
);
if($_POST["email"]=="on")
    $arEventFields["EMAILTO"] = $_POST["emailto"];


//printr($arEventFields);
CEvent::Send("direction", "3d", $arEventFields, 20);
echo "Сообщение отправлено!";

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
