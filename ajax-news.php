<?php

define('STOP_STATISTICS', true);
define('NO_KEEP_STATISTIC', 'Y');
define('NO_AGENT_STATISTIC','Y');
define('DisableEventsCheck', true);
define('BX_SECURITY_SHOW_MESSAGE', true);
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php"); ?>
<?php 
CModule::IncludeModule("iblock");
$res=CIBlockElement::GetList(
  Array("SORT"=>"ASC"),
  Array("IBLOCK_ID"=>3,array('<ID'=>$_REQUEST['id'])),
  false,
  array('iNumPage'=>$_REQUEST['page'],'nPageSize'=>5),
  Array("IBLOCK_ID",'ID',"NAME","ACTIVE_FROM","PROPERTY_ACTION")
);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $data[]=array(
        'id'=>$arFields['ID'],
        'name'=>$arFields['NAME'],
        'active_from'=> d($arFields['ACTIVE_FROM']),
        'action' => $arFields['PROPERTY_ACTION_VALUE'] ? true : false
    );
}
function d($date)
{
    return preg_replace_callback('/^\d{2}(\.\d{2}\.)/', 'r', substr($date,0,10));
}
function r($d) 
{
    $u=$d[1];
    switch($d[1]){
        case '.01.':
            $d[1]= ' Января ';
            break;
        case '.02.':
            $d[1]= ' Февраля ';
            break;
        case '.03.':
            $d[1]= ' Марта ';
            break;
        case '.04.':
            $d[1]= ' Апреля ';
            break;
        case '.05.':
            $d[1]= ' Мая ';
            break;
        case '.06.':
            $d[1]= ' Июня ';
            break;
        case '.07.':
            $d[1]= ' Июля ';
            break;
        case '.08.':
            $d[1]= ' Августа ';
            break;
        case '.09.':
            $d[1]= ' Сентября ';
            break;
        case '.10.':
            $d[1]= ' Октября ';
            break;
        case '.11.':
            $d[1]= ' Ноября ';
            break; 
        case '.12.':
            $d[1]= ' Декабря ';
            break;
    }
    return str_replace($u, $d[1], $d[0]);
}
echo json_encode($data);
?>