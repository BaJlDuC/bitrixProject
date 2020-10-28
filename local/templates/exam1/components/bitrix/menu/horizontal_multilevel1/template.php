<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="menu popup-block">
<ul>
<?
$previousLevel = 0;

foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>
	
	<?if ($arItem["IS_PARENT"]):?>
		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<?if (isset($arItem['PARAMS']['IMG'])):?><li class="main-page"><?else:?><li><?endif?><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				<ul>
				<? $top_text = trim($APPLICATION->GetDirProperty('menu_top_text', $arItem['LINK']));
				if ($top_text):?>
				<div class="menu-text"><?=$top_text?></div>
				<?endif?>
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				<ul>
				<? $top_text = trim($APPLICATION->GetDirProperty('menu_top_text', $arItem['LINK']));
				if ($top_text):?>
				<div class="menu-text"><?=$top_text?></div>
				<?endif?>
		<?endif?>

	<?else:?>
		<?if ($arItem["PERMISSION"] > "D"):?>
			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<?if (isset($arItem['PARAMS']['IMG'])):?><li class="main-page"><?else:?><li><?endif?><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>
	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
</div>
<div class="menu-clear-left"></div>
<?endif?>