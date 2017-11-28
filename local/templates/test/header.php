<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?$APPLICATION->ShowHead()?>
    <!-- JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo SITE_TEMPLATE_PATH?>/js/bundle.min.js"></script>
<script src="<?php echo SITE_TEMPLATE_PATH?>/js/common.min.js"></script>
    <title><?$APPLICATION->ShowTitle()?></title>
    <link rel="stylesheet" href="<?php echo SITE_TEMPLATE_PATH?>/css/general.min.css">
</head>
<body id="body">
<?$APPLICATION->ShowPanel();?>    
<div class="wrapper">
    <main class="main">
        <aside class="aside">
            <div class="aside-holder">
                <div class="aside-header">
                    <div class="aside-logotype"><a class="logotype" href="#">Павлино</a></div>
                    <div class="aside-selector"><a class="js-fx-button-slideup button button-secondary" href="#">Выбрать
                        по параметрам</a></div>
                    <div class="aside-phone"><a class="phone js-popup" href="#callback"></a></div>
                    <div class="aside-toggler">
                        <button class="menu-toggler"><span></span></button>
                    </div>
                </div>
                <div class="aside-body">
                            <?$APPLICATION->IncludeComponent("bitrix:menu", "left", Array(
	"ROOT_MENU_TYPE"	=>	"left",
	"MAX_LEVEL"	=>	"1",
	"CHILD_MENU_TYPE"	=>	"left",
	"USE_EXT"	=>	"Y",
	"MENU_CACHE_TYPE" => "A",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
		0 => "SECTION_ID",
		1 => "page",
	),
	)
);?>
                    <!-- navigation-->
                    <div class="aside-footer">
                        <div class="aside-callback">
                            <div class="callback">
                                        <?php $APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("include/phone.php"),
			Array(),
			Array("MODE"=>"html")
		);?>
                                <div class="callback-link"><a class="js-popup" href="#callback">заказать звонок</a>
                                </div>
                            </div>
                            <!-- callback-->
                        </div>
                        <div class="aside-selector">
                            <div class="selector">
                                <div class="selector-item"><a
                                        class="js-fx-button-slideup button button-primary selector-link" href="#">Выбрать
                                    на 3D-плане</a></div>
                                <div class="selector-item"><a
                                        class="js-fx-button-slideup button button-secondary selector-link" href="#">Выбрать
                                    по параметрам</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- aside-->
        <section class="section">
            <div class="section-inner">
