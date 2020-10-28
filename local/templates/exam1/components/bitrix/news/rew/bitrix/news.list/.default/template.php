<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

?>


<?foreach($arResult["ITEMS"] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	$curDate = getdate(strtotime($arItem['ACTIVE_FROM']));
	$str = $arItem["DISPLAY_ACTIVE_FROM"] . ' г.';//$curDate['mday'] . ' ' . $month[(int)$curDate['mon']] . ' ' . $curDate['year'] . ' г.';
	if ($arItem['PROPERTIES']['POSITION']['VALUE']) $str.= ', ' . $arItem['PROPERTIES']['POSITION']['VALUE'];
	if ($arItem['PROPERTIES']['COMPANY']['VALUE']) $str.= ', ' . $arItem['PROPERTIES']['COMPANY']['VALUE'];
	
	if(isset($arItem['PREVIEW_PICTURE']['SRC'])) {
		$src = $arItem['PREVIEW_PICTURE']['SRC'];
	}
	else {
		$src = SITE_TEMPLATE_PATH . '/img/no_photo.jpg';
	}
?>
<div class="review-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	<div class="review-text">
	
		<div class="review-block-title">
		<span class="review-block-name">
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
		</span>
		<span class="review-block-description"><?=$str ?></span>
		</div>
		
		<div class="review-text-cont">
			<?=$arItem['PREVIEW_TEXT']?>
		</div>
	</div>
	<div class="review-img-wrap"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><img src="<?=$src ?>" alt="img"></a></div>
</div>
	
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
