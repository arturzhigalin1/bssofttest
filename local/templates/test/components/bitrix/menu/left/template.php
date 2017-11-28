<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="aside-navigation">
    <ul class="list navigation-primary">
<?foreach($arResult as $arItem):?>
	<?if($arItem["SELECTED"]):?>
            <li class="list-item"><a class="list-link selected" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
            <li class="list-item"><a class="list-link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>
    </ul>
</nav>
<?endif?>