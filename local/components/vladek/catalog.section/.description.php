<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("VLADEK_CATALOG_SECTION_COMPONENT_TEMPLATE_NAME"),
	"DESCRIPTION" => GetMessage("VLADEK_CATALOG_SECTION_COMPONENT_TEMPLATE_DESC"),
	"ICON" => "/images/vladek-author-avatar.jpg",
	"SORT" => 20,
//	"SCREENSHOT" => array(
//		"/images/post-77-1108567822.jpg",
//		"/images/post-1169930140.jpg",
//	),
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "catalog",
			"NAME" => GetMessage("VLADEK_CATALOG_SECTION_COMPONENT_NAME"),
			"SORT" => 10,
			"CHILD" => array(
				"ID" => "catalog_cmpx",
			),
		),
	),
);

?>

