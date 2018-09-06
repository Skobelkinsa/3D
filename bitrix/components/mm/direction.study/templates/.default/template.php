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
$this->addExternalCss($this->GetFolder()."/style.css");
?>
<div class="direction-study col-md-12" id="direction">
    <?if(strlen($arParams['TITLE'])):?>
        <div class="row"><h2 class="direction-study_title"><?=$arParams['TITLE']?></h2></div>
    <?endif;?>
    <form action="<?=$componentPath?>/direction_send.php" class="row" method="post">
        <div class="col-md-12 form-group">
            <div class="row">
                <div class="col-md-12"><input id="fio" type="text" name="name" required></div>
                <label class="col-md-12" for="fio"><?=$arParams['INPUT_NAME']?></label>
            </div>
        </div>
        <div class="col-md-12 form-group">
            <div class="row">
                <b class="form-group_title"><?=GetMessage('INPUT_ADR')?></b>
                <div class="col-xs-6">
                <?foreach ($arParams['INPUT_ADR'] as $k => $val):
                    if(strlen($val)>0):?>
                    <label for="adr<?=$k?>"><input type="radio" name="adr" id="adr<?=$k?>" value="<?=$val?>" <?=($k==0)?"checked":""?>> <?=$val?></label><br>
                <?endif;
                endforeach;?>
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-md-12"><input type="text" name="doctor" required></div>
                        <label class="col-md-12"><?=$arParams['INPUT_DOCTOR']?></label>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><input type="text" name="doctor_phone" required></div>
                        <label class="col-md-12"><?=$arParams['INPUT_DOCTOR_PHONE']?></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12 form-group">
            <div class="row">
                <b class="form-group_title"><?=GetMessage('AREA')?></b>
                <div class="direction-study_labels col-xs-12">
                <?
                if(count($arParams['INPUT_AREA'])>0):
                    foreach ($arParams['INPUT_AREA'] as $k => $val):?>
                        <div class="col-xs-6 area_<?=$k?>">
                            <?$arElem = explode(",", $val);
                            foreach($arElem as $item):
                                switch ($k) {
                                    case 0:
                                        $value = "Правый верхний";
                                        break;
                                    case 1:
                                        $value = "Левый верхний";
                                        break;
                                    case 2:
                                        $value = "Правый нижный";
                                        break;
                                    case 3:
                                        $value = "Левый нижный";
                                        break;

                                }
                                ?>
                                <input type="checkbox" name="area[]" value="<?=$value?>:<?=$item?>" id="area_<?=$k?>_<?=$item?>" class="hidden">
                                <label for="area_<?=$k?>_<?=$item?>">
                                    <?=$item?>
                                </label>
                            <?endforeach;?>
                        </div>
                    <?endforeach;
                endif;?>
                    <input type="hidden" name="CHELUST" value="">
                </div>
            </div>
            <div class="row">
                <b class="form-group_title"><?=GetMessage('TONOGRAF')?></b>
                <?foreach ($arParams['~INPUT_TOMOGRAPHY'] as $k => $val):
                    if(strlen($val)>0):?>
                        <div class="col-xs-1"><input type="checkbox" name="tomograf[]" id="tomograf<?=$k?>" value="<?=$val?>"></div>
                        <div class="col-xs-11"><label for="tomograf<?=$k?>"><?=$val?></label></div>
                    <?endif;?>
                <?endforeach;?>
                <b class="form-group_title"><?=GetMessage('RENGEN')?></b>
                <?foreach ($arParams['~INPUT_RADIOGRAPHY'] as $k => $val):
                    if(strlen($val)>0):?>
                        <div class="col-xs-1"><input type="checkbox" name="rengen[]" id="rengen<?=$k?>" value="<?=$val?>"></div>
                        <div class="col-xs-11"><label for="rengen<?=$k?>"><?=$val?></label></div>
                    <?endif;?>
                <?endforeach;?>
                <small>*<?=$arParams['RADIOGRAPHY_INFO']?></small>

            </div>
        </div>
        <div class="col-md-6 col-xs-12 form-group">
            <div class="row">
                <b class="form-group_title"><?=GetMessage('ADD')?></b>
                <?foreach ($arParams['~INPUT_ADD'] as $k => $val):
                    if(strlen($val)>0):?>
                        <div class="col-xs-1"><input type="checkbox" name="add[]" id="add<?=$k?>" value="<?=$val?>"></div>
                        <div class="col-xs-11"><label for="add<?=$k?>"><?=$val?></label></div>
                    <?endif;?>
                <?endforeach;?>
                <div class="col-xs-1"><input type="checkbox" name="email" id="emal"></div>
                <div class="col-xs-11"><label for="emal"><?=GetMessage('EMAIL_TO')?></label>
                    <input type="text" name="emailto" placeholder="E-mail"></div>
            </div>
        </div>

        <div style="clear: both"></div>
        <div class="col-md-12 form-group">
            <div class="row">
                <!--<div class="form-group_line"><input type="checkbox" class="js-styler" id="poly" name="poly" value="Y" checked><label for="poly"><?/*=htmlspecialcharsBack($arParams['POLY'])*/?></label></div>-->
                <button type="submit" class="btn btn-default"><?=GetMessage('BTN_SEND')?></button><div class="direction-study_alerts"></div>
                <?// animate-load?>
            </div>
        </div>
    </form>
</div>