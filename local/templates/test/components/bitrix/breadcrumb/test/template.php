<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

$strReturn .= '<ul class="list list-flex breadcrumbs">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);


	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '<li class="list-item"><a class="list-link" href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url">'.$title.'</a></li>';
	}
	else
	{
		$strReturn .= '<li class="list-item"><span class="list-current">'.$title.'</span></li>';
	}
}

$strReturn .= '</ul>';

return $strReturn;