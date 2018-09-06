<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-calendar">
	<?if($arParams["SHOW_CURRENT_DATE"]):?>
		<p align="right" class="NewsCalMonthNav"><b><?=$arResult["TITLE"]?></b></p>
	<?endif?>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td class="NewsCalMonthNav" align="left">
				<?if($arResult["PREV_MONTH_URL"]):?>
					<a href="<?=$arResult["PREV_MONTH_URL"]?>" title="<?=$arResult["PREV_MONTH_URL_TITLE"]?>"><?=GetMessage("IBL_NEWS_CAL_PR_M")?></a>
				<?endif?>
				<?if($arResult["PREV_MONTH_URL"] && $arResult["NEXT_MONTH_URL"] && !$arParams["SHOW_MONTH_LIST"]):?>
					&nbsp;&nbsp;|&nbsp;&nbsp;
				<?endif?>
				<?if($arResult["SHOW_MONTH_LIST"]):?>
					&nbsp;&nbsp;<div class="col-xs-6 col-md-4">
					<select onChange="b_result()" name="MONTH_SELECT" id="month_sel" class="form-control">
						<?foreach($arResult["SHOW_MONTH_LIST"] as $month => $arOption):?>
							<option value="<?=$arOption["VALUE"]?>" <?if($arResult["currentMonth"] == $month) echo "selected";?>><?=$arOption["DISPLAY"]?></option>
						<?endforeach?>
					</select>
					&nbsp;&nbsp;</div>
					<script language="JavaScript" type="text/javascript">
					<!--
					function b_result()
					{
						var idx=document.getElementById("month_sel").selectedIndex;
						<?if($arParams["AJAX_ID"]):?>
							BX.ajax.insertToNode(document.getElementById("month_sel").options[idx].value, 'comp_<?echo CUtil::JSEscape($arParams['AJAX_ID'])?>', <?echo $arParams["AJAX_OPTION_SHADOW"]=="Y"? "true": "false"?>);
						<?else:?>
							window.document.location.href=document.getElementById("month_sel").options[idx].value;
						<?endif?>
					}
					-->
					</script>
				<?endif?>
				<?if($arResult["NEXT_MONTH_URL"]):?>
					<a href="<?=$arResult["NEXT_MONTH_URL"]?>" title="<?=$arResult["NEXT_MONTH_URL_TITLE"]?>"><?=GetMessage("IBL_NEWS_CAL_N_M")?></a>
				<?endif?>
			</td>
			<?if($arParams["SHOW_YEAR"]):?>
			<td class="NewsCalMonthNav" align="right">
				<?if($arResult["PREV_YEAR_URL"]):?>
					<a href="<?=$arResult["PREV_YEAR_URL"]?>" title="<?=$arResult["PREV_YEAR_URL_TITLE"]?>"><?=GetMessage("IBL_NEWS_CAL_PR_Y")?></a>
				<?endif?>
				<?if($arResult["PREV_YEAR_URL"] && $arResult["NEXT_YEAR_URL"]):?>
					&nbsp;&nbsp;|&nbsp;&nbsp;
				<?endif?>
				<?if($arResult["NEXT_YEAR_URL"]):?>
					<a href="<?=$arResult["NEXT_YEAR_URL"]?>" title="<?=$arResult["NEXT_YEAR_URL_TITLE"]?>"><?=GetMessage("IBL_NEWS_CAL_N_Y")?></a>
				<?endif?>
			</td>
			<?endif?>
		</tr>
	</table>

	<br />
    <div class="col-xs-12" style="overflow-y: hidden; overflow-x: auto">
	<table width='100%' border='0' cellspacing='1' cellpadding='4' class='NewsCalTable'>
	<tr>
	<?foreach($arResult["WEEK_DAYS"] as $WDay):?>
		<td class='NewsCalHeader'><?=$WDay["FULL"]?></td>
	<?endforeach?>
	</tr>
	<?foreach($arResult["MONTH"] as $arWeek):?>
	<tr>
		<?foreach($arWeek as $arDay):?>
		<td align="left" valign="top" class='<?=$arDay["td_class"]?>' width="14%">
			<span class="<?=$arDay["day_class"]?>"><?=$arDay["day"]?></span>
			<?foreach($arDay["events"] as $arEvent):?>
				<div class="NewsCalNews" style="padding-top:5px;cursor: pointer"
                    data-toggle="modal" data-target="#calendar_modal"
                    data-date="<?=date("d.m.Y", MakeTimeStamp($arEvent["DATE_ACTIVE_FROM"]))?>"
                    data-from="<?=date("H:i", MakeTimeStamp($arEvent["DATE_ACTIVE_FROM"]))?>"
                    data-to="<?=date("H:i", MakeTimeStamp($arEvent["DATE_ACTIVE_TO"]))?>"
                ><span title="<?=$arEvent["preview"]?>"><?=$arEvent["title"]?></span></div>
			<?endforeach?>
		</td>
		<?endforeach?>
	</tr >
	<?endforeach?>
	</table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="calendar_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-calendar-header">
                <span class="jqmClose top-close fa fa-close" data-dismiss="modal" aria-hidden="true"></span>
                <div class="modal-calendar-header-title">Запись онлайн</div>
                <div class="modal-calendar-header-description">Администратор клиники с радостью ответит на ваши вопросы и запишет к нужному специалисту.</div>
            </div>
            <form action="<?=$componentPath?>/send.php" method="post" class="modal-calendar-body">
                <input type="text" name="NAME" placeholder="Ф.И.О." class="form-control required" required aria-required="true">
                <input type="text" name="PHONE" placeholder="Телефон" class="form-control required phone" required value="" aria-required="true">
                <input type="text" name="DATE" placeholder="Желаемая дата" class="form-control required date" value="" aria-required="true">
                <br>
                <button type="submit" class="btn btn-default">Отправить</button>
                <br>
                <div class="modal-calendar-alert"></div>
            </form>
        </div>
    </div>
</div>
