<?
$items = $arResult['ITEMS'];

/*$MY_HL_BLOCK_ID = 6;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
$rsData = $entity_data_class::getList(array(
   'select' => array('ID'),
   'order' => array('UF_TRANSPORT_MARK_NAME' => 'ASC'),
   'filter' => array('UF_TRANSPORT_MARK_CODE' => $_REQUEST['SECTION_CODE'])
));
while($el = $rsData->fetch()){
    $resListModelID[] = $el['ID'];
}

use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
$MY_HL_BLOCK_ID = 3;
CModule::IncludeModule('highloadblock');

$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
$rsData = $entity_data_class::getList(array(
   'select' => array('*'),
   'filter' => array('UF_TRANSPORT_MARK' => $resListModelID)
));
while($el = $rsData->fetch()) {
    $mark[] = $el; 
}*/

// id марки
$MY_HL_BLOCK_ID = 6;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
$rsData = $entity_data_class::getList(array(
   'select' => array('UF_TRANSPORT_MARK_NAME', 'UF_ID_CAR'),
   'order' => array('UF_TRANSPORT_MARK_NAME' => 'ASC'),
   'filter' => array('UF_TRANSPORT_MARK_CODE' => $_REQUEST['SECTION_CODE'])
));
while($el = $rsData->fetch()){
    $resList[] = $el;
}

// модели
$id_mark = "'{$resList['0']['UF_ID_CAR']}'";

$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/model.getAll.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
  if ($row[1] == $id_mark) {
    $model[] = str_replace("'", "", array_combine($fields, $row));
  }
}
fclose($file);

// кузов
$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/serie.getAll.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
    //$serie[] = $row[3];
    $serie[] = str_replace("'", "", $row[3]);
}
fclose($file);

$serie = array_unique($serie);

// 12 - двигатель
$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/param1.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
  if ($row[1] == 12) {
    $dvigatel[] = str_replace("'", "", $row[2]);
  }
}
fclose($file);
$dvigatel = array_unique($dvigatel);


// 27 - привод
$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/param1.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
  if ($row[1] == 27) {
    $privod[] = str_replace("'", "", $row[2]);
  }
}
fclose($file);
$privod = array_unique($privod);

// 24 - коробка
$file = fopen($_SERVER["DOCUMENT_ROOT"].'/csv/param1.csv', 'r');
$fields = str_replace("'", "", fgetcsv($file));
while (($row = fgetcsv($file)) !== false) {
  if ($row[1] == 24) {
    $korobka[] = str_replace("'", "", $row[2]);
  }
}
fclose($file);
$korobka = array_unique($korobka);

// годы
function print_years($start_year, $end_year) {
    for ($i = $start_year; $i <= $end_year; $i++) {
        $result[] = $i;
    }
    return $result;
}

$years[] = array_reverse(print_years('1990', date("Y")));
?>



<div class="container">
    <div class="info__title">
        <img src="<?=CFile::GetPath($items['MARK_BANNER'])?>" alt="" class="info__title-img">

        Купить <span class="info__title-text"><?=$items['MARK_NAME']?></span>
    </div>

    <div class="info__inner">
        <form class="info__form auto-filter">
            <div class="info__case">
                <label class="info__label info__label--short info__label--active">
                    <input class="info__radio" name="vse" type="radio">
                    Все
                </label>

                <label class="info__label">
                    <input class="info__radio" name="new" checked type="radio">
                    Новые
                </label>

                <label class="info__label">
                    <input class="info__radio" name="sprobegom" type="radio">

                    С пробегом
                </label>
            </div>

            <!--<label class="info__credit">
                <input class="info__checkbox" type="checkbox">

                <span class="info__credit-text">В кредит</span>
            </label>-->

            <!--<a href="#" class="info__favorite">
                Сохранить поиск
            </a>-->

            <div class="info__items">
                <div class="info__item">
                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="Марка" type="text" name="nameMark" value="<?=$items['MARK_NAME']?>">
                    <input type="hidden" name="idMark" value="<?=$items['MARK_ID']?>">
                    <ul class="info__list">
                      <li class="info__box">
                        <button class="info__elem" type="button"><?=$items['MARK_NAME']?></button>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="info__item info__item--mob ">
                  <div class="info__select">
                    <input class="info__select-input " readonly placeholder="Модель" name="model_id" type="text">

                    <ul class="info__list">

                      <? foreach ($model as $item) { ?>
                      <li class="info__box">
                        <!--<input type="hidden" name="model_id" value="<?= $item['name'] ?>">-->
                        <button class="info__elem auto-model" data-id="<?= $item['id_car_model'] ?>" type="button"><?= $item['name'] ?></button>
                      </li>
                      <? } ?>

                    </ul>
                  </div>
                </div>

                <div class="info__item info__item--last filter-pokolenie">
                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="Поколение" type="text">

                    <ul class="info__list">

                      <li class="info__box">
                        <button class="info__elem" type="button">Сначала выберите модель</button>
                      </li>

                    </ul>
                  </div>
                </div>


								<div class="year-kuzov" style="display: flex">
                <div class="info__item info__item--range filter-year">
                  <div class="info__item-text">Год</div>

                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="от" name="YEAR_OT" type="number" />

                    <ul class="info__list">
                      <? foreach ($years['0'] as $item) { ?>
                      <li class="info__box">
                        <button data-id="<?= $item ?>" class="info__elem" type="button"><?= $item ?></button>
                      </li>
                      <? } ?>
                    </ul>
                  </div>

                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="до" name="YEAR_DO" type="number" />

                    <ul class="info__list">
                      <? foreach ($years['0'] as $item) { ?>
                      <li class="info__box">
                        <button data-id="<?= $item ?>" class="info__elem" type="button"><?= $item ?></button>
                      </li>
                      <? } ?>
                    </ul>
                  </div>
                </div>

                <div class="info__item info__item--short" style="margin-left: 1rem">
                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="Кузов" name=KUZOV type="text" />

                    <ul class="info__list">

											<? foreach ($serie as $item) { ?>
                      <li class="info__box">
                        <button class="info__elem" type="button"><?= $item ?></button>
                      </li>
                     <? } ?>

                    </ul>
                  </div>
                </div>
                </div>

                <!--<div class="info__item info__item--mob">

                </div>-->

                <!--<div class="info__item info__item--mob filter-mod">
                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="Модификация" type="text">

                    <ul class="info__list">

                      <li class="info__box">
                        <button class="info__elem" type="button">Сначала выберите поколение</button>
                      </li>

                    </ul>
                  </div>
                </div>-->

								<!--<div class="filter-param1" style="display: flex">-->
                <div class="info__item info__item--short">
                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="Двигатель" name="DVIGATEL" type="text">

                    <ul class="info__list">

                      <? foreach ($dvigatel as $item) { ?>
                      <li class="info__box">
                        <button class="info__elem" type="button"><?= $item ?></button>
                      </li>
                      <? } ?>

                    </ul>
                  </div>
                </div>

                <div class="info__item info__item--short">
                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="Привод" name="PRIVOD" type="text" />

                    <ul class="info__list">

                      <? foreach ($privod as $item) { ?>
                      <li class="info__box">
                        <button class="info__elem" type="button"><?= $item ?></button>
                      </li>
                      <? } ?>

                    </ul>
                  </div>
                </div>

                <div class="info__item info__item--short"  style="margin-left: 1rem">
                  <div class="info__select">
                    <input class="info__select-input" readonly placeholder="Коробка" name="KOROBKA" type="text" />

                    <ul class="info__list">

                      <? foreach ($korobka as $item) { ?>
                      <li class="info__box">
                        <button class="info__elem" type="button"><?= $item ?></button>
                      </li>
                      <? } ?>

                    </ul>
                  </div>
                </div>
              <!--</div>-->

              <div class="info__item info__item--range">
                  <div class="info__item-text">Объем, л</div>

                  <div class="info__select without_arrow">
                    <input class="info__select-input" placeholder="от" name="OBJEM_OT" type="number" />
                  </div>

                  <div class="info__select without_arrow">
                    <input class="info__select-input" placeholder="до" name="OBJEM_DO" type="number" />
                  </div>
                </div>

                <div class="info__item info__item--range">
                  <div class="info__item-text">Пробег, км</div>

                  <div class="info__select without_arrow">
                    <input class="info__select-input" placeholder="от" name="PROBEG_OT" type="number" />
                  </div>

                  <div class="info__select without_arrow">
                    <input class="info__select-input" placeholder="до" name="PROBEG_DO" type="number" />
                  </div>
                </div>

                <div class="info__item info__item--range">
                  <div class="info__item-text">Цена, ₽</div>

                  <div class="info__select without_arrow">
                    <input class="info__select-input" placeholder="от" name="PRICE_OT" type="number" />
                  </div>

                  <div class="info__select without_arrow">
                    <input class="info__select-input" placeholder="до" name="PRICE_DO" type="number" />
                  </div>
                </div>

                <div class="info__additional">
                  <div class="info__additional-title">История эксплуатации и состояние</div>

                  <div class="info__additional_grid">
                    <div class="info__select-wraper">
                      <div class="info__select-text">Владельцев по ПТС</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="VLADELCEV"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">1</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">2</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">3</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">4</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="info__additional-switch">
                      <div class="info__additional-label__title">Состояние</div>
                      <div class="info__additional-switch__wrap">
                        <label class="info__additional-switch__item">
                          <input type="radio" name="SOSTOYANIE" checked="" />
                          <span>Битый</span>
                        </label>
                        <label class="info__additional-switch__item">
                          <input type="radio" name="SOSTOYANIE" />
                          <span>Не битый</span>
                        </label>
                        <label class="info__additional-switch__item">
                          <input type="radio" name="SOSTOYANIE" />
                          <span>Не на ходу</span>
                        </label>
                      </div>
                    </div>

                    <label class="label-checkbox">
                      <input type="checkbox" name="GARANTIYA" class="visually-hidden" />
                      <span></span>
                      <div>На гарантии</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="OBMEN" class="visually-hidden" />
                      <span></span>
                      <div>Обмен</div>
                    </label>
                  </div>
                  <div class="info__additional-title">Безопасность</div>

                  <div class="info__additional_grid">
                    <div class="info__select-wraper">
                      <div class="info__select-text">Подушки безопасности</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="PODUSHKI"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Водителя</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Пассажира</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Боковые передние</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Боковые задние</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Оконные (шторки)</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Коленей водителя</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="info__select-wraper">
                      <div class="info__select-text">Вспомогательные системы</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="VSPOMOGATELNYE"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Предотвращения столкновения</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Контроль за полосой движения</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Датчик усталости водителя</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Распознавания дорожных знаков</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Антипробуксовочная (ASR)</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Стабилизации рулевого управления (VSM)</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Распределения тормозных усилий (BAS, EBD)</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Помощи при старте в гору</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Помощи при спуске</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Контроля слепых зон</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">Ночного видения</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="info__select-wraper">
                      <div class="info__select-text">Система крепления Isofix</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="ISOFIX"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Задний ряд</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Передний ряд</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <label class="label-checkbox">
                      <input type="checkbox" name="DATCHIK_DAVLENIYA_V_SHINAH" class="visually-hidden" />
                      <span></span>
                      <div>Датчик давления в шинах</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="ESP" class="visually-hidden" />
                      <span></span>
                      <div>Система стабилизации (ESP)</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="ABS" class="visually-hidden" />
                      <span></span>
                      <div>Антиблокировочная система (ABS)</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="BLOKIROVKA_ZAMKOV" class="visually-hidden" />
                      <span></span>
                      <div>Блокировка замков задних дверей</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="BRONIROV_KUZOV" class="visually-hidden" />
                      <span></span>
                      <div>Бронированный кузов</div>
                    </label>
                  </div>
                  <div class="info__additional-title">Обзор</div>

                  <div class="info__additional_grid">
                    <div class="info__select-wraper">
                      <div class="info__select-text">Фары</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="FARY"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Ксеноновые</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Биксеноновые</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="info__select-wraper">
                      <div class="info__select-text">Электрообогрев</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="ELECTROOBOGREV"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Зоны стеклоочиститей</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Лобового зеркала</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Боковых зеркал</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Форсунок стеклоомывателей</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <label class="label-checkbox">
                      <input type="checkbox" name="PROTIVOTUMANKI" class="visually-hidden" />
                      <span></span>
                      <div>Противотуманные фары</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="DATCHIK_SVETA" class="visually-hidden" />
                      <span></span>
                      <div>Датчик света</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="DATCHIK_DOZHDYA" class="visually-hidden" />
                      <span></span>
                      <div>Датчик дождя</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="AVTO_DALNIY_SVET" class="visually-hidden" />
                      <span></span>
                      <div>Автоматический дальний свет</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="ADAPTIV_OSVESH" class="visually-hidden" />
                      <span></span>
                      <div>Адаптивное освещение</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="AVTO_KORRECTOR_FAR" class="visually-hidden" />
                      <span></span>
                      <div>Автоматический корректор фар</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="OMYVATEL_FAR" class="visually-hidden" />
                      <span></span>
                      <div>Омыватель фар</div>
                    </label>
                  </div>

                  <div class="info__additional-title">Прочее</div>

                  <div class="info__additional_grid">
                    <div class="info__select-wraper">
                      <div class="info__select-text">Подвеска</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="PODVESKA"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Активная</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Спортивная</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Пневмоподвеска</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Фаркоп</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Защита картера</div>
                    </label>
                  </div>
                  <div class="info__additional-title">Комфорт</div>

                  <div class="info__additional_grid">
                    <div class="info__select-wraper">
                      <div class="info__select-text">Кондиционер</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="KONDEY"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Климат-контроль 1-зонный</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Климат-контроль 2-зонный</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Климат-контроль многозонный</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Кондиционер</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="info__select-wraper">
                      <div class="info__select-text">Камера выбор</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="KAMERA_VYBOR"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">360*</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Передняя</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Задняя</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="info__select-wraper">
                      <div class="info__select-text">Электростеклоподъёмники выбор</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="ELECTROPODEMNIKI"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Передние</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Задние</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="info__select-wraper">
                      <div class="info__select-text">Регулировка руля</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="REGULIROVKA_RULYA"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">По высоте</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">По вылету</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Электрорегулировка</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">С памятью положения</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="info__select-wraper">
                      <div class="info__select-text">Усилитель руля</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                          name="USILITEL_RULYA"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">По высоте</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">По вылету</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Электрорегулировка</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">С памятью положения</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <label class="label-checkbox">
                      <input type="checkbox" name="ELECTRONNAYA_PRIBORKA" class="visually-hidden" />
                      <span></span>
                      <div>Электронная приборная панель</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="ELECTROSKLADYVANIE_ZERKAL" class="visually-hidden" />
                      <span></span>
                      <div>Электроскладывание зеркал</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="PROEKCIONNYI_DISPLEY" class="visually-hidden" />
                      <span></span>
                      <div>Проекционный дисплей</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="SISTEMA_VYBORA_DVIZHENIYA" class="visually-hidden" />
                      <span></span>
                      <div>Система выбора режима движения</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="SISTEMA_DOSTUPA_BEZ_KEY" class="visually-hidden" />
                      <span></span>
                      <div>Система доступа без ключа</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="PODRULEVYE_LEPESTKI" class="visually-hidden" />
                      <span></span>
                      <div>Подрулевые лепестки переключения передач</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="DISTANCIONNYI_ZAPUSK" class="visually-hidden" />
                      <span></span>
                      <div>Дистанционный запуск двигателя</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="ZAPUSK_S_KNOPKI" class="visually-hidden" />
                      <span></span>
                      <div>Запуск двигателя с кнопки</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="REGULIRUEMYI_PEDALNYI_UZEL" class="visually-hidden" />
                      <span></span>
                      <div>Регулируемый педальный узел</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="BAGAZHNIK_BEZ_RUK" class="visually-hidden" />
                      <span></span>
                      <div>Открытие багажника без помощи рук</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="PREDPUSKOVOI_OTOPITEL" class="visually-hidden" />
                      <span></span>
                      <div>Программируемый предпусковой отопитель</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="START_STOP" class="visually-hidden" />
                      <span></span>
                      <div>Система старт-стоп</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="MULTIFUNC_RULEVOR_KOLESO" class="visually-hidden" />
                      <span></span>
                      <div>Мультифункциональное рулевое колесо</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="BORTOVOI_COMP" class="visually-hidden" />
                      <span></span>
                      <div>Бортовой компьютер</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="ELECTROPRIVOD_BAGAZHNIKA" class="visually-hidden" />
                      <span></span>
                      <div>Электропривод крышки багажника</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="KLIMAT_KONTROL" class="visually-hidden" />
                      <span></span>
                      <div>Климат контроль</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="AUDIO_NA_RULE" class="visually-hidden" />
                      <span></span>
                      <div>Управление аудиосистемой на руле</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="ELECTROPRIVOD_BOKOVYH_ZERKAL" class="visually-hidden" />
                      <span></span>
                      <div>Электропривод боковых зеркал</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" name="ELECTROPRIVOD_ZADNIH_STEKOL" class="visually-hidden" />
                      <span></span>
                      <div>Электропривод задних стекол</div>
                    </label>
                  </div>
                  <div class="info__additional-title">Элементы экстерьера</div>

                  <div class="info__additional_grid">
                    <div class="info__select-wraper">
                      <div class="info__select-text">Тип дисков</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Стальные</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Легкосплавные</button>
                          </li>

                        </ul>
                      </div>
                    </div>

                    <div class="info__select-wraper">
                      <div class="info__select-text">Размер дисков</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">12</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">13</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">14</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">15</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">16</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">17</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">18</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">19</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">20</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">21</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">22</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">23</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">24</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">25</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">26</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">27</button>
                          </li>
                          <li class="info__box">
                            <button class="info__elem" type="button">28</button>
                          </li>

                        </ul>
                      </div>
                    </div>
                    <div class="info__select-wraper">
                      <div class="info__select-text">Цвет</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Черный</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Белый</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Обвес кузова</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Рейлинги на крыше</div>
                    </label>
                  </div>
                  <div class="info__additional-title">Защита от угона</div>

                  <div class="info__additional_grid">
                    <div class="info__select-wraper">
                      <div class="info__select-text">Сигнализация</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Сигнализация с обратной связью</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Сигнализация</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Центральный замок</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Датчик проникновения в салон</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Иммобилайзер</div>
                    </label>
                  </div>

                  <div class="info__additional-title">Салон</div>

                  <div class="info__additional_grid">
                    <div class="info__select-wraper">
                      <div class="info__select-text">Цвет салона</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Светлый</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Темный</button>
                          </li>

                        </ul>
                      </div>
                    </div>

                    <div class="info__select-wraper">
                      <div class="info__select-text">Электрорегулировка сидений</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Сиденья водителя</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Передних сидений</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Задних сидений</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="info__select-wraper">
                      <div class="info__select-text">Вентиляция сидений</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Передних сидений</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Задних сидений</button>
                          </li>

                        </ul>
                      </div>
                    </div>

                    <div class="info__select-wraper">
                      <div class="info__select-text">Материал салона</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Велюр</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Комбинированный</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Искуственная кожа</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Алькантара</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Кожа</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Ткань</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="info__select-wraper">
                      <div class="info__select-text">Память положения сидений</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Сиденья водителя</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Передних сидений</button>
                          </li>

                        </ul>
                      </div>
                    </div>

                    <div class="info__select-wraper">
                      <div class="info__select-text">Количество мест</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">2</button>
                          </li>
                           <li class="info__box">
                            <button class="info__elem" type="button">3</button>
                          </li>
                           <li class="info__box">
                            <button class="info__elem" type="button">4</button>
                          </li>
                           <li class="info__box">
                            <button class="info__elem" type="button">5</button>
                          </li>
                           <li class="info__box">
                            <button class="info__elem" type="button">6</button>
                          </li>
                           <li class="info__box">
                            <button class="info__elem" type="button">7</button>
                          </li>
                           <li class="info__box">
                            <button class="info__elem" type="button">8</button>
                          </li>
                           <li class="info__box">
                            <button class="info__elem" type="button">9</button>
                          </li>


                        </ul>
                      </div>
                    </div>

                    <div class="info__select-wraper">
                      <div class="info__select-text">Регулировка сидений по высоте</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Сиденья водителя</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Передних сидений</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="info__select-wraper">
                      <div class="info__select-text">Подогрев сидений</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Передних сидений</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Задних сидений</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="info__select-wraper">
                      <div class="info__select-text">Память положения сидений</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Сиденья водителя</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Передних сидений</button>
                          </li>

                        </ul>
                      </div>
                    </div>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Спортивные передние сиденья</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Отделка кожей рулевого колеса</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Складывающееся заднее сиденье</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Люк</div>
                    </label>
                  </div>

                  <div class="info__additional-title">Мультимедиа</div>

                  <div class="info__additional_grid">
                    <div class="info__select-wraper">
                      <div class="info__select-text">Аудиосистема</div>
                      <div class="info__select info__select--grid">
                        <input
                          class="info__select-input"
                          readonly=""
                          placeholder="Выбрать"
                          type="text"
                        />

                        <ul class="info__list">
                          <li class="info__box">
                            <button class="info__elem" type="button">Премиальная</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Аудиосистема</button>
                          </li>

                          <li class="info__box">
                            <button class="info__elem" type="button">Аудиоподготовка</button>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Мультимедиа с ЖК-экраном</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Голосовое управление</div>
                    </label>
                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>AUX</div>
                    </label>
                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Мультимедиа для задних пассажиров</div>
                    </label>
                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Android Auto</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Bluetoth</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>USB</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>CarPlay</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Навигационная система</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Розетка 12V</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" />
                      <span></span>
                      <div>Розетка 220V</div>
                    </label>
                  </div>
                </div>
              </div>

            <a href="#" class="info__all-models">
                Все модели/все поколения
            </a>

            <div class="info__wrapper">
              <button type="button" class="info__parameters link">
                <span class="link__text show_text">Все параметры</span>
                <!--<span class="link__text hide_text">Скрыть</span>-->
                <div class="link__btn"></div>
              </button>

              <input class="info__reset" type="reset" value="Сбросить фильтры">

              <button type="submit" class="info__all">
                Показать предложения
              </button>
            </div>

            <a href="#" class="info__filter">
                <svg class="info__filter-img" width="4.8rem" height="4.8rem" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M22.75 17.5C22.75 17.91 22.41 18.25 22 18.25H15V18.5C15 20 14.1 20.5 13 20.5H7C5.9 20.5 5 20 5 18.5V18.25H2C1.59 18.25 1.25 17.91 1.25 17.5C1.25 17.09 1.59 16.75 2 16.75H5V16.5C5 15 5.9 14.5 7 14.5H13C14.1 14.5 15 15 15 16.5V16.75H22C22.41 16.75 22.75 17.09 22.75 17.5Z"
                            fill="#4067F0" />
                    <path
                            d="M22.75 6.5C22.75 6.91 22.41 7.25 22 7.25H19V7.5C19 9 18.1 9.5 17 9.5H11C9.9 9.5 9 9 9 7.5V7.25H2C1.59 7.25 1.25 6.91 1.25 6.5C1.25 6.09 1.59 5.75 2 5.75H9V5.5C9 4 9.9 3.5 11 3.5H17C18.1 3.5 19 4 19 5.5V5.75H22C22.41 5.75 22.75 6.09 22.75 6.5Z"
                            fill="#4067F0" />
                </svg>

                <span class="info__filter-text">Параметры</span>
            </a>
        </form>

        <div class="info__advertising advertising">
            <div class="advertising__our advertising-block">
                <div class="advertising__our-inner">
                    <div class="advertising__our-title">
                        Снижаем цены на приоритетные объявления
                    </div>

                    <div class="advertising__our-text">
                        Публиковать объявления теперь еще выгоднее! Показы чаще, продажи быстрее
                    </div>

                    <a class="advertising__our-link link link--white">
                        <span class="link__text">Подробнее</span>

                        <div class="link__btn"></div>
                    </a>
                </div>

                <img class="advertising__our-img" src="<?=SITE_TEMPLATE_PATH?>/images/advertising-star.png" alt="">
            </div>
        </div>
    </div>

    <ul class="info__models">

 <?
$totalElements = count($model);
$elementsPerList = 4;
$numLists = ceil($totalElements / $elementsPerList);

for ($i = 0; $i < $numLists; $i++) {

    echo '<li class="info__models-item">';
    echo '<ul class="info__models-items">';
    
    $start = $i * $elementsPerList;
    $end = ($i + 1) * $elementsPerList;

    for ($j = $start; $j < $end; $j++) {
        if ($j >= $totalElements) {
            break;
        }
        echo '<li class="info__model">';
        echo '<a href="#" class="info__link">';
        echo '<div class="info__subtitle">' . $model[$j]['name'] . '</div><div class="info__count"></div>';
        echo '</a>';
        echo '</li>';
    }

    
    echo '</ul>';
    echo '</li>';
}


 ?>     



    </ul>

    <div class="info__btns">
        <a href="" class="info__btn info__btn--filter">
            <svg class="info__btn-img" width="5.8rem" height="5.8rem" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M22.75 17.5C22.75 17.91 22.41 18.25 22 18.25H15V18.5C15 20 14.1 20.5 13 20.5H7C5.9 20.5 5 20 5 18.5V18.25H2C1.59 18.25 1.25 17.91 1.25 17.5C1.25 17.09 1.59 16.75 2 16.75H5V16.5C5 15 5.9 14.5 7 14.5H13C14.1 14.5 15 15 15 16.5V16.75H22C22.41 16.75 22.75 17.09 22.75 17.5Z"
                        fill="#fff" />
                <path
                        d="M22.75 6.5C22.75 6.91 22.41 7.25 22 7.25H19V7.5C19 9 18.1 9.5 17 9.5H11C9.9 9.5 9 9 9 7.5V7.25H2C1.59 7.25 1.25 6.91 1.25 6.5C1.25 6.09 1.59 5.75 2 5.75H9V5.5C9 4 9.9 3.5 11 3.5H17C18.1 3.5 19 4 19 5.5V5.75H22C22.41 5.75 22.75 6.09 22.75 6.5Z"
                        fill="#fff" />
            </svg>
        </a>
        <a href="" class="info__btn info__btn--favorite">
            <svg class="info__btn-img" width="5rem" height="5rem" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M12.62 19.71C12.28 19.83 11.72 19.83 11.38 19.71C8.48 18.72 2 14.59 2 7.59C2 4.5 4.49 2 7.56 2C9.38 2 10.99 2.88 12 4.24C13.01 2.88 14.63 2 16.44 2C19.51 2 22 4.5 22 7.59C22 14.59 15.52 18.72 12.62 19.71Z"
                        stroke="white" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>
</div>


<!--<pre>
    <?print_r($items)?>
</pre>-->

<script>

var model = <?= $id_mark ?>;

	// фильтр авто
$('.auto-filter').submit(function () {
  let data = $(this).serialize();
  $.ajax({
    type: 'post',
    url: '/ajax/transport/filter/filter.php',
    data: data,
    dataType: 'html',
    success: function (e) {
      console.log(e);
      $('.announcements__items').empty();
      $('.announcements__items').append(e);
    },
    error: function (e) {
      console.log(e);
      console.log(false);
    },
  });
  return false;
});


$(document).ready(function () {
$('.auto-model').click(function () {
        var data =$(this).attr('data-id');
        //var data =$(this).val();

        //$('.info__list').css("display", "none");


    /*if (!$(this).hasClass('info__select--active')) {
    $('.info__select').removeClass('info__select--active').find('.info__list').css('display', 'none');
    $(this).toggleClass('info__select--active');
    $(this).find('.info__list').slideToggle();
  	} else {
    $(this).toggleClass('info__select--active');
    $(this).find('.info__list').slideToggle();
  	}

		$(this).closest('.info__select').find('.info__select-input').val($(this).text());*/


        console.log(data);
        console.log(model);

        $.ajax({
            type: 'post',
            url: '/ajax/transport/filter/pokolenie.php',
            data: { data: data, model: model },
            dataType: 'html',
            success: function (e) {
            		$('.filter-pokolenie').empty();
      					$('.filter-pokolenie').append(e);
                console.log(e);

            },
            error: function (e) {
                console.log(false);
            }
        });
        //return false;
    })
});




</script>