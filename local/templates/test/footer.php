<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?> 
</div>
        </section>
        <!-- section-->
    </main>
</div>
<!-- wrapper-->
<footer class="footer">
    <div class="footer-aside">
        <?php $APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("include/company_name.php"),
			Array(),
			Array("MODE"=>"html")
		);?>
    </div>
    <div class="footer-section">
        <div class="footer-row">
            <div class="footer-column">
                <div class="footer-title">О проекте</div>
                 <?$APPLICATION->IncludeComponent("bitrix:menu", "bottom1", Array(
	"ROOT_MENU_TYPE"	=>	"bottom1",
	"MAX_LEVEL"	=>	"1",
	"CHILD_MENU_TYPE"	=>	"bottom1",
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
            </div>
            <div class="footer-column">
                <div class="footer-title">Квартиры</div>
<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom2", Array(
	"ROOT_MENU_TYPE"	=>	"bottom2",
	"MAX_LEVEL"	=>	"1",
	"CHILD_MENU_TYPE"	=>	"bottom2",
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
            </div>
            <div class="footer-column">
                <div class="footer-title">МИЦ Ипотека</div>
<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom3", Array(
	"ROOT_MENU_TYPE"	=>	"bottom3",
	"MAX_LEVEL"	=>	"1",
	"CHILD_MENU_TYPE"	=>	"bottom3",
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
            </div>
            <div class="footer-column">
                <?php $APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("include/contacts.php"),
			Array(),
			Array("MODE"=>"html")
		);?>
            </div>
            <div class="footer-column">
                <?php $APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("include/social.php"),
			Array(),
			Array("MODE"=>"html")
		);?>
                <!-- social-->
            </div>
        </div>
    </div>
</footer>
<!-- footer-->
<div class="mfp-hide popup" id="callback">
    <h2>Заказать звонок</h2>
    <form class="form" action="#">
        <div class="form-group">
            <div class="form-item">
                <input class="form-field" type="text" name="" placeholder="Имя">
            </div>
        </div>
        <div class="form-group">
            <div class="form-item form-error">
                <input class="form-field" type="tel" name="" placeholder="+7 (___) ___-__-__">
            </div>
        </div>
        <div class="form-group">
            <div class="form-item form-text text-center">Нажимая на кнопку «Отправить», Вы даете согласие на обработку
                персональных данных.
            </div>
        </div>
        <div class="form-group">
            <div class="form-item text-center">
                <button class="button button-primary form-submit" type="submit">Отправить</button>
            </div>
        </div>
    </form>
</div>
<!-- popup-->
<div class="mfp-hide popup" id="callback-success">
    <h2>Заказать звонок</h2>
    <div class="form-message">Спасибо, Ваша заявка отправлена, в ближайшее время наши менеджеры свяжутся с Вами.</div>
    <div class="text-center"><a class="button button-primary form-submit" href="#"
                                onclick="$.magnificPopup.close(); return false;">ОК</a></div>
</div>
<!---->
</body>
</html>