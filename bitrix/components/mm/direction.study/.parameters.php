<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arCurrentValues */

/*
 * PARAMETERS VER
 *
 *  "TYPE" => "LIST",
	"VALUES" => $arList,
	"DEFAULT" => "default text",
	"REFRESH" => "Y",
    "MULTIPLE" => "Y",
    "ADDITIONAL_VALUES" => "Y",

    "TYPE" => "STRING",
	"DEFAULT" => "text",

    "TYPE" => "CHECKBOX",
    "DEFAULT" => "Y",

 */
$arComponentParameters = array(
	"PARAMETERS" => array(
        "TITLE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("TITLE"),
            "TYPE" => "STRING",
            "DEFAULT" => GetMessage("TITLE_DEF"),
        ),
        "INPUT_NAME" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("INPUT_NAME"),
            "TYPE" => "STRING",
            "DEFAULT" => GetMessage("INPUT_NAME_DEF"),
        ),
        "INPUT_ADR" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("ADR_TITLE"),
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "DEFAULT" => "",
        ),
        "INPUT_DOCTOR" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("INPUT_DOCTOR"),
            "TYPE" => "STRING",
            "DEFAULT" => GetMessage("INPUT_DOCTOR_DEF"),
        ),
        "INPUT_DOCTOR_PHONE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("INPUT_DOCTOR_PHONE"),
            "TYPE" => "STRING",
            "DEFAULT" => GetMessage("INPUT_DOCTOR_PHONE_DEF"),
        ),
        "INPUT_AREA" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("INPUT_AREA"),
            "MULTIPLE" => "Y",
            "TYPE" => "STRING",
        ),
        "INPUT_TOMOGRAPHY" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("INPUT_TOMOGRAPHY"),
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "DEFAULT" => "",
        ),
        "INPUT_RADIOGRAPHY" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("INPUT_RADIOGRAPHY"),
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "DEFAULT" => array(GetMessage("INPUT_RADIOGRAPHY_DEF")),
        ),
        "RADIOGRAPHY_INFO" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("RADIOGRAPHY_INFO"),
            "TYPE" => "STRING",
            "DEFAULT" => GetMessage("RADIOGRAPHY_INFO_DEF"),
        ),
        "INPUT_ADD" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("INPUT_ADD"),
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "DEFAULT" => "",
        ),
        "INPUT_DOCTOR_COMMENTS" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("INPUT_DOCTOR_COMMENTS"),
            "TYPE" => "STRING",
            "DEFAULT" => GetMessage("INPUT_DOCTOR_COMMENTS_DEF"),
        ),
        "POLY" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("POLY"),
            "TYPE" => "STRING",
            "DEFAULT" => GetMessage("POLY_DEF"),
        ),
        "PATH" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("PATH"),
            "TYPE" => "STRING",
            "DEFAULT" => GetMessage("PATH_DEF"),
        ),

	),
);