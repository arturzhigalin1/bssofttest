<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["ITEMS"])>0):?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"test",
				Array(
					"START_FROM" => "0", 
					"PATH" => "", 
					"SITE_ID" => "" 
				)
			);?>
			<h1><?$APPLICATION->ShowTitle(true)?></h1>
<script type="text/javascript">
    $().ready(function(){
        var page =0;
        var id= <?php echo $arResult["ITEMS"][count($arResult["ITEMS"])-1]['ID']?>;
        $('#show-more-news').click(function(e){
           e.preventDefault();
           e.stopPropagation();
           $("#loader-news").show();
            $("#show-more-news").hide();
            page++;
        BX.ajax.post('/ajax-news.php',{mode:'ajax',page:page,id:id,iblock_id:<?php echo $arResult["ITEMS"][0]['IBLOCK_ID'] ?>},function(r){
                var html='';
                r=eval(r);
                var count=0;
                for (var f in r) {
                    id=r[f]['id'];
                    count++;
                    html+='<li class="list-item">';
                    html+='<div class="event">';
                    html+='<div class="event-header">';
                    html+='<div class="date event-date">'+r[f]['active_from']+'</div>';
                    if (r[f]['action']) {
                        html+='<div class="event-label">Акция</div>';
                    }
                    html+='</div>';
                    html+='<h6 class="event-title">'+'<'+'a'+' href="/novosti.php?ELEMENT_ID='+r[f]['id']+'">'+r[f]['name']+'</a></h6>';
                    html+="</div></li>";
                } 
                $("#news-list").append(html);
                $("#loader-news").hide();
                if(count==5){
                    $("#show-more-news").show();
                }
            });
        });
    });
</script>
	<div class="news-list">
		<ul class="list layout-events" id="news-list">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<li class="list-item">
                            <div class="event">
                                <div class="event-header">
                                    <div class="date event-date"><?php echo $arItem['DISPLAY_ACTIVE_FROM'] ?></div>
                                    <?php if ($arItem['PROPERTIES']['ACTION']['VALUE']): ?>
                                    <div class="event-label">Акция</div>
                                    <?php endif; ?>
                                </div>
                                <h6 class="event-title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h6>
                            </div>
                        </li>
		<?endforeach;?>
		</ul>
                <a class="button button-primary button-more" id="show-more-news" href="#">Показать еще</a>
                <div class="loader" style='display: none;' id='loader-news'>
                    <div class="loader-progress"></div>
                </div>
	</div>
<?endif?>
