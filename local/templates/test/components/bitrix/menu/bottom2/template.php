<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="list navigation-secondary">
<?foreach($arResult as $arItem):?>
	<?if ($arItem["PERMISSION"] > "D"):?>
		<?if ($arItem["SELECTED"]):?>
			<li class="list-item"><a class="list-link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?else:?>
                        <li class="list-item"><a class="list-link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?endif?>
	<?endif?>
<?endforeach?>
</ul>
<?endif?>