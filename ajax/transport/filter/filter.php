<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';


if (empty($_REQUEST['idMark'])) { $_REQUEST['idMark'] = '%'; }
if (empty($_REQUEST['model_id'])) { $_REQUEST['model_id'] = '%'; }
if (empty($_REQUEST['pokolenie'])) { $_REQUEST['pokolenie'] = '%'; }
if (empty($_REQUEST['KOROBKA'])) { $_REQUEST['KOROBKA'] = '%'; }
if (empty($_REQUEST['PRIVOD'])) { $_REQUEST['PRIVOD'] = '%'; }
if (empty($_REQUEST['DVIGATEL'])) { $_REQUEST['DVIGATEL'] = '%'; }
if (empty($_REQUEST['PRICE_OT'])) { $_REQUEST['PRICE_OT'] = 0; }
if (empty($_REQUEST['PRICE_DO'])) { $_REQUEST['PRICE_DO'] = 99999999999; }
if (empty($_REQUEST['YEAR_OT'])) { $_REQUEST['YEAR_OT'] = 0; }
if (empty($_REQUEST['YEAR_DO'])) { $_REQUEST['YEAR_DO'] = 99999999999; }
if (empty($_REQUEST['PROBEG_OT'])) { $_REQUEST['PROBEG_OT'] = 0; }
if (empty($_REQUEST['PROBEG_DO'])) { $_REQUEST['PROBEG_DO'] = 99999999999; }

if (empty($_REQUEST['UF_VLADELCEV'])) { $_REQUEST['UF_VLADELCEV'] = '%'; }
if (empty($_REQUEST['UF_SOSTOYANIE'])) { $_REQUEST['UF_SOSTOYANIE'] = '%'; }
if (empty($_REQUEST['UF_GARANTIYA'])) { $_REQUEST['UF_GARANTIYA'] = '%'; }
if (empty($_REQUEST['UF_PODUSHKI'])) { $_REQUEST['UF_PODUSHKI'] = '%'; }
if (empty($_REQUEST['UF_VSPOMOGATELNYE'])) { $_REQUEST['UF_VSPOMOGATELNYE'] = '%'; }
if (empty($_REQUEST['UF_ISOFIX'])) { $_REQUEST['UF_ISOFIX'] = '%'; }
if (empty($_REQUEST['UF_DATCHIK_DAVLENIYA_V_SHINAH'])) { $_REQUEST['UF_DATCHIK_DAVLENIYA_V_SHINAH'] = '%'; }
if (empty($_REQUEST['UF_ESP'])) { $_REQUEST['UF_ESP'] = '%'; }
if (empty($_REQUEST['UF_ABS'])) { $_REQUEST['UF_ABS'] = '%'; }
if (empty($_REQUEST['UF_BLOKIROVKA_ZAMKOV'])) { $_REQUEST['UF_BLOKIROVKA_ZAMKOV'] = '%'; }
if (empty($_REQUEST['UF_BRONIROV_KUZOV'])) { $_REQUEST['UF_BRONIROV_KUZOV'] = '%'; }
if (empty($_REQUEST['UF_FARY'])) { $_REQUEST['UF_FARY'] = '%'; }
if (empty($_REQUEST['UF_ELECTROOBOGREV'])) { $_REQUEST['UF_ELECTROOBOGREV'] = '%'; }
if (empty($_REQUEST['UF_PROTIVOTUMANKI'])) { $_REQUEST['UF_PROTIVOTUMANKI'] = '%'; }
if (empty($_REQUEST['UF_DATCHIK_SVETA'])) { $_REQUEST['UF_DATCHIK_SVETA'] = '%'; }
if (empty($_REQUEST['UF_DATCHIK_DOZHDYA'])) { $_REQUEST['UF_DATCHIK_DOZHDYA'] = '%'; }
if (empty($_REQUEST['UF_AVTO_DALNIY_SVET'])) { $_REQUEST['UF_AVTO_DALNIY_SVET'] = '%'; }
if (empty($_REQUEST['UF_ADAPTIV_OSVESH'])) { $_REQUEST['UF_ADAPTIV_OSVESH'] = '%'; }
if (empty($_REQUEST['UF_AVTO_KORRECTOR_FAR'])) { $_REQUEST['UF_AVTO_KORRECTOR_FAR'] = '%'; }
if (empty($_REQUEST['UF_OMYVATEL_FAR'])) { $_REQUEST['UF_OMYVATEL_FAR'] = '%'; }
if (empty($_REQUEST['UF_PODVESKA'])) { $_REQUEST['UF_PODVESKA'] = '%'; }
if (empty($_REQUEST['UF_FARKOP'])) { $_REQUEST['UF_FARKOP'] = '%'; }
if (empty($_REQUEST['UF_ZASHCHITA_KARTERA'])) { $_REQUEST['UF_ZASHCHITA_KARTERA'] = '%'; }
if (empty($_REQUEST['UF_KONDEY'])) { $_REQUEST['UF_KONDEY'] = '%'; }
if (empty($_REQUEST['UF_KAMERA_VYBOR'])) { $_REQUEST['UF_KAMERA_VYBOR'] = '%'; }
if (empty($_REQUEST['UF_ELECTROPODEMNIKI'])) { $_REQUEST['UF_ELECTROPODEMNIKI'] = '%'; }
if (empty($_REQUEST['UF_REGULIROVKA_RULYA'])) { $_REQUEST['UF_REGULIROVKA_RULYA'] = '%'; }
if (empty($_REQUEST['UF_USILITEL_RULYA'])) { $_REQUEST['UF_USILITEL_RULYA'] = '%'; }
if (empty($_REQUEST['UF_PROEKCIONNYI_DISPLEY'])) { $_REQUEST['UF_PROEKCIONNYI_DISPLEY'] = '%'; }
if (empty($_REQUEST['UF_ELECTRONNAYA_PRIBORKA'])) { $_REQUEST['UF_ELECTRONNAYA_PRIBORKA'] = '%'; }
if (empty($_REQUEST['UF_ELECTROSKLADYVANIE_ZERKAL'])) { $_REQUEST['UF_ELECTROSKLADYVANIE_ZERKAL'] = '%'; }
if (empty($_REQUEST['UF_SISTEMA_VYBORA_DVIZHENIYA'])) { $_REQUEST['UF_SISTEMA_VYBORA_DVIZHENIYA'] = '%'; }
if (empty($_REQUEST['UF_SISTEMA_DOSTUPA_BEZ_KEY'])) { $_REQUEST['UF_SISTEMA_DOSTUPA_BEZ_KEY'] = '%'; }
if (empty($_REQUEST['UF_PODRULEVYE_LEPESTKI'])) { $_REQUEST['UF_PODRULEVYE_LEPESTKI'] = '%'; }
if (empty($_REQUEST['UF_DISTANCIONNYI_ZAPUSK'])) { $_REQUEST['UF_DISTANCIONNYI_ZAPUSK'] = '%'; }
if (empty($_REQUEST['UF_ZAPUSK_S_KNOPKI'])) { $_REQUEST['UF_ZAPUSK_S_KNOPKI'] = '%'; }
if (empty($_REQUEST['UF_REGULIRUEMYI_PEDALNYI_UZEL'])) { $_REQUEST['UF_REGULIRUEMYI_PEDALNYI_UZEL'] = '%'; }
if (empty($_REQUEST['UF_BAGAZHNIK_BEZ_RUK'])) { $_REQUEST['UF_BAGAZHNIK_BEZ_RUK'] = '%'; }
if (empty($_REQUEST['UF_PREDPUSKOVOI_OTOPITEL'])) { $_REQUEST['UF_PREDPUSKOVOI_OTOPITEL'] = '%'; }
if (empty($_REQUEST['UF_START_STOP'])) { $_REQUEST['UF_START_STOP'] = '%'; }
if (empty($_REQUEST['UF_MULTIFUNC_RULEVOR_KOLESO'])) { $_REQUEST['UF_MULTIFUNC_RULEVOR_KOLESO'] = '%'; }
if (empty($_REQUEST['UF_BORTOVOI_COMP'])) { $_REQUEST['UF_BORTOVOI_COMP'] = '%'; }
if (empty($_REQUEST['UF_ELECTROPRIVOD_BAGAZHNIKA'])) { $_REQUEST['UF_ELECTROPRIVOD_BAGAZHNIKA'] = '%'; }
if (empty($_REQUEST['UF_KLIMAT_KONTROL'])) { $_REQUEST['UF_KLIMAT_KONTROL'] = '%'; }
if (empty($_REQUEST['UF_AUDIO_NA_RULE'])) { $_REQUEST['UF_AUDIO_NA_RULE'] = '%'; }
if (empty($_REQUEST['UF_ELECTROPRIVOD_BOKOVYH_ZERKAL'])) { $_REQUEST['UF_ELECTROPRIVOD_BOKOVYH_ZERKAL'] = '%'; }
if (empty($_REQUEST['UF_ELECTROPRIVOD_ZADNIH_STEKOL'])) { $_REQUEST['UF_ELECTROPRIVOD_ZADNIH_STEKOL'] = '%'; }
if (empty($_REQUEST['UF_TIP_DISKOV'])) { $_REQUEST['UF_TIP_DISKOV'] = '%'; }
if (empty($_REQUEST['UF_RAZMER_DISKOV'])) { $_REQUEST['UF_RAZMER_DISKOV'] = '%'; }
if (empty($_REQUEST['UF_OBVES_KUZOVA'])) { $_REQUEST['UF_OBVES_KUZOVA'] = '%'; }
if (empty($_REQUEST['UF_REILINGI_NA_KRYSHE'])) { $_REQUEST['UF_REILINGI_NA_KRYSHE'] = '%'; }
if (empty($_REQUEST['UF_COLOR'])) { $_REQUEST['UF_COLOR'] = '%'; }


$MY_HL_BLOCK_ID = 3;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);

$arFilter = array('UF_TRANSPORT_MARK' => $_REQUEST['idMark'], 'UF_TRANSPORT_MODEL' => $_REQUEST['model_id'], 'UF_TRANSPORT_GENERATION' => $_REQUEST['pokolenie'], 'UF_TRANSPORT_TRANSMISSION' => $_REQUEST['KOROBKA'], "UF_TRANSPORT_DRIVING"=> $_REQUEST['PRIVOD'], "UF_TRANSPORT_ENGINE" => $_REQUEST['DVIGATEL'], '>=UF_TRANSPORT_PRICE' => $_REQUEST['PRICE_OT'], '<=UF_TRANSPORT_PRICE' => $_REQUEST['PRICE_DO'], '>=UF_TRANSPORT_YEAR' => $_REQUEST['YEAR_OT'], '<=UF_TRANSPORT_YEAR' => $_REQUEST['YEAR_DO'], '>=UF_TRANSPORT_MILEAGE' => $_REQUEST['PROBEG_OT'], '<=UF_TRANSPORT_MILEAGE' => $_REQUEST['PROBEG_DO'],

    'UF_VLADELCEV' => $_REQUEST['VLADELCEV'],
    'UF_SOSTOYANIE' => $_REQUEST['SOSTOYANIE'],
    'UF_GARANTIYA' => $_REQUEST['GARANTIYA'],
    'UF_OBMEN' => $_REQUEST['OBMEN'],
    'UF_PODUSHKI' => $_REQUEST['PODUSHKI'],
    'UF_VSPOMOGATELNYE' => $_REQUEST['VSPOMOGATELNYE'],
    'UF_ISOFIX' => $_REQUEST['ISOFIX'],
    'UF_DATCHIK_DAVLENIYA_V_SHINAH' => $_REQUEST['DATCHIK_DAVLENIYA_V_SHINAH'],
    'UF_ESP' => $_REQUEST['ESP'],
    'UF_ABS' => $_REQUEST['ABS'],
    'UF_BLOKIROVKA_ZAMKOV' => $_REQUEST['BLOKIROVKA_ZAMKOV'],
    'UF_BRONIROV_KUZOV' => $_REQUEST['BRONIROV_KUZOV'],
    'UF_FARY' => $_REQUEST['FARY'],
    'UF_ELECTROOBOGREV' => $_REQUEST['ELECTROOBOGREV'],
    'UF_PROTIVOTUMANKI' => $_REQUEST['PROTIVOTUMANKI'],
    'UF_DATCHIK_SVETA' => $_REQUEST['DATCHIK_SVETA'],
    'UF_DATCHIK_DOZHDYA' => $_REQUEST['DATCHIK_DOZHDYA'],
    'UF_AVTO_DALNIY_SVET' => $_REQUEST['AVTO_DALNIY_SVET'],
    'UF_ADAPTIV_OSVESH' => $_REQUEST['ADAPTIV_OSVESH'],
    'UF_AVTO_KORRECTOR_FAR' => $_REQUEST['AVTO_KORRECTOR_FAR'],
    'UF_OMYVATEL_FAR' => $_REQUEST['OMYVATEL_FAR'],
    'UF_PODVESKA' => $_REQUEST['PODVESKA'],
    'UF_FARKOP' => $_REQUEST['FARKOP'],
    'UF_ZASHCHITA_KARTERA' => $_REQUEST['ZASHCHITA_KARTERA'],
    'UF_KONDEY' => $_REQUEST['KONDEY'],
    'UF_KAMERA_VYBOR' => $_REQUEST['KAMERA_VYBOR'],
    'UF_ELECTROPODEMNIKI' => $_REQUEST['ELECTROPODEMNIKI'],
    'UF_REGULIROVKA_RULYA' => $_REQUEST['REGULIROVKA_RULYA'],
    'UF_USILITEL_RULYA' => $_REQUEST['USILITEL_RULYA'],
    'UF_PROEKCIONNYI_DISPLEY' => $_REQUEST['PROEKCIONNYI_DISPLEY'],
    'UF_ELECTRONNAYA_PRIBORKA' => $_REQUEST['ELECTRONNAYA_PRIBORKA'],
    'UF_ELECTROSKLADYVANIE_ZERKAL' => $_REQUEST['ELECTROSKLADYVANIE_ZERKAL'],
    'UF_SISTEMA_VYBORA_DVIZHENIYA' => $_REQUEST['SISTEMA_VYBORA_DVIZHENIYA'],
    'UF_SISTEMA_DOSTUPA_BEZ_KEY' => $_REQUEST['SISTEMA_DOSTUPA_BEZ_KEY'],
    'UF_PODRULEVYE_LEPESTKI' => $_REQUEST['PODRULEVYE_LEPESTKI'],
    'UF_DISTANCIONNYI_ZAPUSK' => $_REQUEST['DISTANCIONNYI_ZAPUSK'],
    'UF_ZAPUSK_S_KNOPKI' => $_REQUEST['ZAPUSK_S_KNOPKI'],
    'UF_REGULIRUEMYI_PEDALNYI_UZEL' => $_REQUEST['REGULIRUEMYI_PEDALNYI_UZEL'],
    'UF_BAGAZHNIK_BEZ_RUK' => $_REQUEST['BAGAZHNIK_BEZ_RUK'],
    'UF_PREDPUSKOVOI_OTOPITEL' => $_REQUEST['PREDPUSKOVOI_OTOPITEL'],
    'UF_START_STOP' => $_REQUEST['START_STOP'],
    'UF_MULTIFUNC_RULEVOR_KOLESO' => $_REQUEST['MULTIFUNC_RULEVOR_KOLESO'],
    'UF_BORTOVOI_COMP' => $_REQUEST['BORTOVOI_COMP'],
    'UF_ELECTROPRIVOD_BAGAZHNIKA' => $_REQUEST['ELECTROPRIVOD_BAGAZHNIKA'],
    'UF_KLIMAT_KONTROL' => $_REQUEST['KLIMAT_KONTROL'],
    'UF_AUDIO_NA_RULE' => $_REQUEST['AUDIO_NA_RULE'],
    'UF_ELECTROPRIVOD_BOKOVYH_ZERKAL' => $_REQUEST['ELECTROPRIVOD_BOKOVYH_ZERKAL'],
    'UF_ELECTROPRIVOD_ZADNIH_STEKOL ' => $_REQUEST['ELECTROPRIVOD_ZADNIH_STEKOL'],
    'UF_TIP_DISKOV' => $_REQUEST['TIP_DISKOV'],
    'UF_RAZMER_DISKOV' => $_REQUEST['RAZMER_DISKOV'],
    'UF_OBVES_KUZOVA' => $_REQUEST['OBVES_KUZOVA'],
    'UF_REILINGI_NA_KRYSHE' => $_REQUEST['REILINGI_NA_KRYSHE'],
    'UF_COLOR' => $_REQUEST['COLOR']

    


     );


$resultArr = array();
$rsData = $entity_data_class::getList(array(
   'select' => array('*'),
   'filter' => $arFilter
));
while($el = $rsData->fetch()){
    $resultArr[] = $el;
}

?>
<!--<pre>
    <?print_r($resultArr)?>
</pre>

<pre>
    <?print_r($_REQUEST)?>
</pre>-->


<? foreach ($resultArr as $item) { ?>
<li class="announcements__item cart <?/* if (in_array($item['ID'], $resultFav)) {
            echo 'cart--favorite';
        } */?>">
            <div class="cart__top">
                <div class="cart__inner">
                    <ul class="cart__list">
                        <li class="cart__box">
                            <a href="/transport/<?=$item['UF_TRANSPORT_MARK']?>/<?=$item['UF_TRANSPORT_CODE']?>"> <img class="cart__img" src="<?=CFile::GetPath($item['UF_TRANSPORT_IMAGES'][0])?>" alt=""></a>
                        </li>
                    </ul>

                    <div class="cart__pagination"></div>
                </div>
            </div>

            <div class="cart__line"></div>

            <div class="cart__bottom">
                <div class="cart__wrapper">
                    <div class="cart__left">
                        <div class="cart__subtitle">
                            <a href="/transport/<?=$item['UF_TRANSPORT_MARK']?>/<?=$item['UF_TRANSPORT_CODE']?>"><?=$item['UF_TRANSPORT_NAME']?></a>
                        </div>

                        <div class="cart__cost">
                            <?=number_format($item['UF_TRANSPORT_PRICE'], 0, '', ' ')?>
                        </div>
                    </div>

                    <div class="cart__right">
                        <div class="cart__location">
                            <img class="cart__location-img" src="<?=SITE_TEMPLATE_PATH?>/images/location.svg" alt=" <?=$item['UF_TRANSPORT_ADDRESS']?>">
                            <?=$item['UF_TRANSPORT_ADDRESS']?>
                        </div>

                        <div class="cart__date">
                            <?/*=CIBlockFormatProperties::DateFormat('j F Y', MakeTimeStamp($item['UF_TRANSPORT_CREATED_DATE'], CSite::GetDateFormat()))*/?>
                        </div>
                    </div>
                </div>


                <div class="cart__info">
                    <div class="cart__text">
                        <?=$item['UF_TRANSPORT_DESC']?>
                    </div>

                    <a class="cart__message btn-blue" href="#">
                        <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                        Написать
                    </a>

                    <a class="cart__favorite" data-item="<?= $item['ID'] ?>" data-razdel="1">
                        <img class="cart__favorite-img" src="<?=SITE_TEMPLATE_PATH?>/images/favorite.svg" alt="добавить в избранное">
                        <img class="cart__favorite-img cart__favorite-img--active" src="<?=SITE_TEMPLATE_PATH?>/images/favorite-fill.svg  "
                             alt="добавить в избранное">
                    </a>
                </div>
            </div>

            <div class="cart__author">
                <div class="cart__name">
                    Александр Соколов
                </div>

                <div class="cart__reg-date">
                    На Stendū с 12 ноября 2021
                </div>

                <div class="cart__tel">
                    <img class="cart__tel-img" src="<?=SITE_TEMPLATE_PATH?>/images/phone.svg" alt="Позвонить">

                    <div class="cart__tel-wrapper">
                        <a class="cart__tel-show" href="#">
                            Показать телефон
                        </a>

                        <a class="cart__num" href="#">
                            +371 ··· ··· ·· ··
                        </a>
                    </div>
                </div>

                <a class="cart__message btn-blue" href="#">
                    <img class="cart__message-img" src="<?=SITE_TEMPLATE_PATH?>/images/message-white.svg" alt="Написать">

                    Написать
                </a>
            </div>
        </li>
     <? } ?>