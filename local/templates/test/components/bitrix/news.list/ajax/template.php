<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["ITEMS"])>0):?>
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
<?endif?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

