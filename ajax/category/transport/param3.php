<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

if ($_REQUEST['region'] == 54) {
    $latLng = '56.97306259784141, 24.1009260120028';
} else if ($_REQUEST['region'] == 55) {
    $latLng = '54.752091655781335, 25.3141734869178';
} else if ($_REQUEST['region'] == 56) {
    $latLng = '59.43724772225245, 24.742763279376838';
} else {
	$latLng = '56.97306259784141, 24.1009260120028';
}
?>


                        

                    <section class="announcement update-block update1 update2 update3 zero"> 

                    	<div class="announcement-content__block announcement-content__car-parameters">
                            <div class="announcement-content__title">Цена и условия сделки</div>
                            <div class="announcement-content__block-wrap grid">

                                <div class="col_33">
                                    <div class="announcement-label__title">Цена *</div>
                                    <label>
                                        <input type="number" name="PRICE" placeholder="" >
                                    </label>
                                </div>

                            </div>
                        </div> 

                        <div class="announcement-content__block announcement-content__car-parameters">
                            <div class="announcement-content__title">История эксплуатации и состояние</div>
                            <div class="announcement-content__block-wrap grid">


                                <div class="col_33">
                                    <div class="label">
                                        <div class="announcement-label__title">Владельцев по ПТС</div>
                                        <select name="VLADELCEV" id="">
                                        		<option disabled selected>Выбрать</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4+</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <div class="announcement-label__title">Пробег *</div>
                                    <label>
                                        <input type="number" name="PROBEG" placeholder="">
                                    </label>
                                </div>


                                <div class="col_33">
                                    <div class="announcement-switch">
                                        <div class="announcement-label__title">Состояние</div>
                                        <div class="announcement-switch__wrap">
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="SOSTOYANIE" checked>
                                                <span>Битый</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="SOSTOYANIE">
                                                <span>Не битый</span>
                                            </label>
                                            <label class="announcement-switch__item">
                                                <input type="radio" name="SOSTOYANIE">
                                                <span>Не на ходу</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_33">
                                    <label class="label-checkbox">
                                        <input type="checkbox" name="GARANTIYA" class="visually-hidden">
                                        <span></span>
                                        <div>На гарантии</div>
                                    </label>
                                </div>

                                <div class="col_33">
                                    <label class="label-checkbox">
                                        <input type="checkbox" name="OBMEN" class="visually-hidden">
                                        <span></span>
                                        <div>Обмен</div>
                                    </label>
                                </div>


                            </div>
                        </div> 




                        <!-- Безопасность -->
						<div class="announcement-content__block">
							<div class="announcement-content__title">Безопасность</div>
							
							<div class="announcement-content__block-wrap grid">

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Подушки безопасности</div>
										<select name="PODUSHKI" id="">
											<option disabled selected>Выбрать</option>
											<option value="Водителя">Водителя</option>
											<option value="Пассажира">Пассажира</option>
											<option value="Боковые передние">Боковые передние</option>
											<option value="Боковые задние">Боковые задние</option>
											<option value="Оконные (шторки)">Оконные (шторки)</option>
											<option value="Коленей водителя">Коленей водителя</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Вспомогательные системы</div>
										<select name="VSPOMOGATELNYE" id="">
											<option disabled selected>Выбрать</option>
											<option value="Предотвращения столкновения">Предотвращения столкновения</option>
											<option value="Контроль за полосой движения">Контроль за полосой движения</option>
											<option value="Датчик усталости водителя">Датчик усталости водителя</option>
											<option value="Распознавания дорожных знаков">Распознавания дорожных знаков</option>
											<option value="Антипробуксовочная (ASR)">Антипробуксовочная (ASR)</option>
											<option value="Стабилизации рулевого управления (VSM)">Стабилизации рулевого управления (VSM)</option>
											<option value="Распределения тормозных усилий (BAS, EBD)">Распределения тормозных усилий (BAS, EBD)</option>
											<option value="Помощи при старте в гору">Помощи при старте в гору</option>
											<option value="Помощи при спуске">Помощи при спуске</option>
											<option value="Контроля слепых зон">Контроля слепых зон</option>
											<option value="Ночного видения">Ночного видения</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Система крепления Isofix</div>
										<select name="ISOFIX" id="">
											<option disabled selected>Выбрать</option>
											<option value="Задний ряд">Задний ряд</option>
											<option value="Передний ряд">Передний ряд</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="DATCHIK_DAVLENIYA_V_SHINAH" class="visually-hidden">
										<span></span>
										<div>Датчик давления в шинах</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="ESP" class="visually-hidden">
										<span></span>
										<div>Система стабилизации (ESP)</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="ABS" class="visually-hidden">
										<span></span>
										<div>Антиблокировочная система (ABS)</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="BLOKIROVKA_ZAMKOV" class="visually-hidden">
										<span></span>
										<div>Блокировка замков задних дверей</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="BRONIROV_KUZOV" class="visually-hidden">
										<span></span>
										<div>Бронированный кузов</div>
									</label>
								</div>
							</div>
						</div>

						<!-- Обзор -->
						<div class="announcement-content__block">
							<div class="announcement-content__title">Обзор</div>
							
							<div class="announcement-content__block-wrap grid">

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Фары</div>
										<select name="FARY" id="">
											<option disabled selected>Выбрать</option>
											<option value="Ксеноновые">Ксеноновые</option>
											<option value="Биксеноновые">Биксеноновые</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Электрообогрев</div>
										<select name="ELECTROOBOGREV" id="">
											<option disabled selected>Выбрать</option>
											<option value="Зоны стеклоочиститей">Зоны стеклоочиститей</option>
											<option value="Лобового зеркала">Лобового зеркала</option>
											<option value="Боковых зеркал">Боковых зеркал</option>
											<option value="Форсунок стеклоомывателей">Форсунок стеклоомывателей</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="PROTIVOTUMANKI" class="visually-hidden">
										<span></span>
										<div>Противотуманные фары</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="DATCHIK_SVETA" class="visually-hidden">
										<span></span>
										<div>Датчик света</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="DATCHIK_DOZHDYA" class="visually-hidden">
										<span></span>
										<div>Датчик дождя</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="AVTO_DALNIY_SVET" class="visually-hidden">
										<span></span>
										<div>Автоматический дальний свет</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="ADAPTIV_OSVESH" class="visually-hidden">
										<span></span>
										<div>Адаптивное освещение</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="AVTO_KORRECTOR_FAR" class="visually-hidden">
										<span></span>
										<div>Автоматический корректор фар</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="OMYVATEL_FAR" class="visually-hidden">
										<span></span>
										<div>Омыватель фар</div>
									</label>
								</div>
							</div>
						</div>

						<!-- Прочее -->
						<div class="announcement-content__block">
							<div class="announcement-content__title">Прочее</div>
							
							<div class="announcement-content__block-wrap grid">

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Подвеска</div>
										<select name="PODVESKA" id="">
											<option disabled selected>Выбрать</option>
											<option value="Активная">Активная</option>
											<option value="Спортивная">Спортивная</option>
											<option value="Пневмоподвеска">Пневмоподвеска</option>
										</select>
									</div>
								</div>

								<div class="col_25">
									<label class="label-checkbox">
										<input type="checkbox" name="FARKOP" class="visually-hidden">
										<span></span>
										<div>Фаркоп</div>
									</label>
								</div>

								<div class="col_25">
									<label class="label-checkbox">
										<input type="checkbox" name="ZASHCHITA_KARTERA" class="visually-hidden">
										<span></span>
										<div>Защита картера</div>
									</label>
								</div>

							</div>
						</div>

						<!-- Комфорт -->
						<div class="announcement-content__block">
							<div class="announcement-content__title">Комфорт</div>
							
							<div class="announcement-content__block-wrap grid">

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Кондиционер</div>
										<select name="KONDEY" id="">
											<option disabled selected>Выбрать</option>
											<option value="Климат-контроль 1-зонный">Климат-контроль 1-зонный</option>
											<option value="Климат-контроль 2-зонный">Климат-контроль 2-зонный</option>
											<option value="Климат-контроль многозонный">Климат-контроль многозонный</option>
											<option value="Кондиционер">Кондиционер</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Камера выбор</div>
										<select name="KAMERA_VYBOR" id="">
											<option disabled selected>Выбрать</option>
											<option value="360*">360*</option>
											<option value="Передняя">Передняя</option>
											<option value="Задняя">Задняя</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Электростеклоподъёмники выбор</div>
										<select name="ELECTROPODEMNIKI" id="">
											<option disabled selected>Выбрать</option>
											<option value="Передние">Передние</option>
											<option value="Задние">Задние</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Регулировка руля</div>
										<select name="REGULIROVKA_RULYA" id="">
											<option disabled selected>Выбрать</option>
											<option value="По высоте">По высоте</option>
											<option value="По вылету">По вылету</option>
											<option value="Электрорегулировка">Электрорегулировка</option>
											<option value="С памятью положения">С памятью положения</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Усилитель руля</div>
										<select name="USILITEL_RULYA" id="">
											<option disabled selected>Выбрать</option>
											<option value="По высоте">По высоте</option>
											<option value="По вылету">По вылету</option>
											<option value="Электрорегулировка">Электрорегулировка</option>
											<option value="С памятью положения">С памятью положения</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="PROEKCIONNYI_DISPLEY" class="visually-hidden">
										<span></span>
										<div>Проекционный дисплей</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="ELECTRONNAYA_PRIBORKA" class="visually-hidden">
										<span></span>
										<div>Электронная приборная панель</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="ELECTROSKLADYVANIE_ZERKAL" class="visually-hidden">
										<span></span>
										<div>Электроскладывание зеркал</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="SISTEMA_VYBORA_DVIZHENIYA" class="visually-hidden">
										<span></span>
										<div>Система выбора режима движения</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="SISTEMA_DOSTUPA_BEZ_KEY" class="visually-hidden">
										<span></span>
										<div>Система доступа без ключа</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="PODRULEVYE_LEPESTKI" class="visually-hidden">
										<span></span>
										<div>Подрулевые лепестки переключения передач</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="DISTANCIONNYI_ZAPUSK" class="visually-hidden">
										<span></span>
										<div>Дистанционный запуск двигателя</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="ZAPUSK_S_KNOPKI" class="visually-hidden">
										<span></span>
										<div>Запуск двигателя с кнопки</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="REGULIRUEMYI_PEDALNYI_UZEL" class="visually-hidden">
										<span></span>
										<div>Регулируемый педальный узел</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="BAGAZHNIK_BEZ_RUK" class="visually-hidden">
										<span></span>
										<div>Открытие багажника без помощи рук</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="PREDPUSKOVOI_OTOPITEL" class="visually-hidden">
										<span></span>
										<div>Программируемый предпусковой отопитель</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="START_STOP" class="visually-hidden">
										<span></span>
										<div>Система старт-стоп</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="MULTIFUNC_RULEVOR_KOLESO" class="visually-hidden">
										<span></span>
										<div>Мультифункциональное рулевое колесо</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="BORTOVOI_COMP" class="visually-hidden">
										<span></span>
										<div>Бортовой компьютер</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="ELECTROPRIVOD_BAGAZHNIKA" class="visually-hidden">
										<span></span>
										<div>Электропривод крышки багажника</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="KLIMAT_KONTROL" class="visually-hidden">
										<span></span>
										<div>Климат контроль</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="AUDIO_NA_RULE" class="visually-hidden">
										<span></span>
										<div>Управление аудиосистемой на руле</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="ELECTROPRIVOD_BOKOVYH_ZERKAL" class="visually-hidden">
										<span></span>
										<div>Электропривод боковых зеркал</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="ELECTROPRIVOD_ZADNIH_STEKOL" class="visually-hidden">
										<span></span>
										<div>Электропривод задних стекол</div>
									</label>
								</div>

							</div>
						</div>

						<!-- Элементы экстерьера -->
						<div class="announcement-content__block">
							<div class="announcement-content__title">Элементы экстерьера</div>
							
							<div class="announcement-content__block-wrap grid">

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Тип дисков</div>
										<select name="TIP_DISKOV" id="">
											<option disabled selected>Выбрать</option>
											<option value="Стальные">Стальные</option>
											<option value="Легкосплавные">Легкосплавные</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Размер дисков</div>
										<select name="RAZMER_DISKOV" id="">
											<option disabled selected>Выбрать</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>

										</select>
									</div>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="OBVES_KUZOVA" class="visually-hidden">
										<span></span>
										<div>Обвес кузова</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" name="REILINGI_NA_KRYSHE" class="visually-hidden">
										<span></span>
										<div>Рейлинги на крыше</div>
									</label>
								</div>


								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Цвет</div>
										<select name="COLOR" id="">
											<option value="Черный">Черный</option>
											<option value="Белый">Белый</option>
										</select>
									</div>
								</div>

							</div>
						</div>

						<!--------->

						<!-- Защита от угона -->
						<div class="announcement-content__block">
							<div class="announcement-content__title">Защита от угона</div>
							
							<div class="announcement-content__block-wrap grid">

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Сигнализация</div>
										<select name="" id="">
											<option disabled selected>Выбрать</option>
											<option value="Сигнализация с обратной связью">Сигнализация с обратной связью</option>
											<option value="Сигнализация">Сигнализация</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Центральный замок</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Датчик проникновения в салон</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Иммобилайзер</div>
									</label>
								</div>

							</div>
						</div>

						<!-- Салон -->
						<div class="announcement-content__block">
							<div class="announcement-content__title">Салон</div>
							
							<div class="announcement-content__block-wrap grid">

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Цвет салона</div>
										<select name="" id="">
											<option disabled selected>Выбрать</option>
											<option value="Светлый">Светлый</option>
											<option value="Темный">Темный</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Электрорегулировка сидений</div>
										<select name="" id="">
											<option disabled selected>Выбрать</option>
											<option value="Сиденья водителя">Сиденья водителя</option>
											<option value="Передних сидений">Передних сидений</option>
											<option value="Задних сидений">Задних сидений</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Вентиляция сидений</div>
										<select name="" id="">
											<option disabled selected>Выбрать</option>
											<option value="Передних сидений">Передних сидений</option>
											<option value="Задних сидений">Задних сидений</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Материал салона</div>
										<select name="" id="">
											<option disabled selected>Выбрать</option>
											<option value="Велюр">Велюр</option>
											<option value="Комбинированный">Комбинированный</option>
											<option value="Искуственная кожа">Искуственная кожа</option>
											<option value="Алькантара">Алькантара</option>
											<option value="Кожа">Кожа</option>
											<option value="Ткань">Ткань</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Память положения сидений</div>
										<select name="" id="">
											<option disabled selected>Выбрать</option>
											<option value="Сиденья водителя">Сиденья водителя</option>
											<option value="Передних сидений">Передних сидений</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Количество мест</div>
										<select name="" id="">
											<option disabled selected>Выбрать</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Регулировка сидений по высоте</div>
										<select name="" id="">
											<option disabled selected>Выбрать</option>
											<option value="Сиденья водителя">Сиденья водителя</option>
											<option value="Передних сидений">Передних сидений</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Подогрев сидений</div>
										<select name="" id="">
											<option disabled selected>Выбрать</option>
											<option value="Передних сидений">Передних сидений</option>
											<option value="Задних сидений">Задних сидений</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Спортивные передние сиденья</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Отделка кожей рулевого колеса</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Складывающееся заднее сиденье</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Люк</div>
									</label>
								</div>

							</div>
						</div>

						<!-- Мультимедиа -->
						<div class="announcement-content__block">
							<div class="announcement-content__title">Мультимедиа</div>
							
							<div class="announcement-content__block-wrap grid">

								<div class="col_33">
									<div class="label">
										<div class="announcement-label__title">Аудиосистема</div>
										<select name="" id="">
											<option disabled selected>Выбрать</option>
											<option value="Премиальная">Премиальная</option>
											<option value="Аудиосистема">Аудиосистема</option>
											<option value="Аудиоподготовка">Аудиоподготовка</option>
										</select>
									</div>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Мультимедиа с ЖК-экраном</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Голосовое управление</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>AUX</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Мультимедиа для задних пассажиров</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Android Auto</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Bluetoth</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>USB</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>CarPlay</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Навигационная система</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Розетка 12V</div>
									</label>
								</div>

								<div class="col_33">
									<label class="label-checkbox">
										<input type="checkbox" class="visually-hidden">
										<span></span>
										<div>Розетка 220V</div>
									</label>
								</div>

							</div>
						</div>

						<!-- Описание -->
						<div class="announcement-content__block announcement-content__description">
							<div class="announcement-content__title">Описание</div>
							<div class="announcement-content__block-wrap">
								<label class="wide">
									<textarea name="DESC"
										placeholder="Честно опишите достоинства и недостатки своего автомобиля. 
Не указывайте в описании телефон и e-mail — для этого есть отдельные поля."></textarea>
								</label>
							</div>
						</div>

						<!-- Внешний вид -->
						<div class="announcement-content__block announcement-content__appearance">
							<div class="announcement-content__title">Внешний вид</div>
							<div class="announcement-content__appearance-block">
								<div class="announcement-label__title">Фотографии</div>

                  <div class="announcement-content__appearance-photos-wrap">
                      <div class="announcement-content__appearance-photos">

                      </div>
                      <label>
                          <input type="file" multiple id="upload-file" hidden
                                 class="announcement-content__appearance-photo-input"
                                 name="file[]">
                      </label>
                  </div>

							</div>
							<div class="announcement-content__appearance-inputs mt35">
								<label>
									<div class="announcement-label__title">Видео c YouTube</div>
									<input type="text" placeholder="Например: https://www.youtube.com/watch?v=dQw4w9WgXcQ">
								</label>
							</div>
						</div>

						                <!-- Адрес -->
                <div class="announcement-content__block announcement-content__place">
                    <div class="announcement-content__title">Адрес</div>
                    <div class="announcement-content__place-search">
                        <label class="wide">
                            <div class="announcement-label__title">Адрес <span>?</span></div>
                            <input name="UF_ADDRESS" id="pac-input"  type="search" placeholder="Начните вводить адрес">
                            <input name="UF_GEO" id="geo" type="hidden">
                            <button class="announcement-content__place-search-btn">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/search.svg" alt="">
                            </button>
                        </label>
                    </div>
                    <div class="announcement-content__place-map" id="announcement-place-map"></div>
                    <script
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVzWclwddGOJh2PAH6L9EbMBVLiVtRCRg&callback=initAutocomplete&libraries=places&v=weekly"
                            defer
                    ></script>
                    <script>

                        function initAutocomplete() {
                            const myLatlng = new google.maps.LatLng(<?=$latLng?>);
                            const map = new google.maps.Map(document.getElementById("announcement-place-map"), {
                                center: myLatlng,
                                zoom: 10,
                                mapTypeId: "roadmap",
                            });

                            const infoWindow = new google.maps.InfoWindow({
                                content: "",
                                disableAutoPan: true,
                            });

                            // Create the search box and link it to the UI element.
                            const input = document.getElementById("pac-input");
                            const inputGeo = document.getElementById("geo");
                            const searchBox = new google.maps.places.SearchBox(input);

                            // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                            // Bias the SearchBox results towards current map's viewport.
                            map.addListener("bounds_changed", () => {
                                searchBox.setBounds(map.getBounds());
                            });

                            let markers1 = [];

                            // Listen for the event fired when the user selects a prediction and retrieve
                            // more details for that place.
                            searchBox.addListener("places_changed", () => {
                                const places = searchBox.getPlaces();

                                if (places.length == 0) {
                                    return;
                                }

                                // Clear out the old markers.
                                markers1.forEach((marker) => {
                                    marker.setMap(null);
                                });
                                markers1 = [];

                                // For each place, get the icon, name and location.
                                const bounds = new google.maps.LatLngBounds();

                                places.forEach((place) => {
                                    if (!place.geometry || !place.geometry.location) {
                                        console.log("Returned place contains no geometry");
                                        return;
                                    }

                                    const icon = {
                                        url: place.icon,
                                        size: new google.maps.Size(71, 71),
                                        origin: new google.maps.Point(0, 0),
                                        anchor: new google.maps.Point(17, 34),
                                        scaledSize: new google.maps.Size(25, 25),
                                    };

                                    // Create a marker for each place.
                                    markers1.push(
                                        new google.maps.Marker({
                                            map,
                                            icon,
                                            title: place.name,
                                            position: place.geometry.location,
                                        })
                                    );
                                    if (place.geometry.viewport) {
                                        // Only geocodes have viewport.
                                        bounds.union(place.geometry.viewport);
                                    } else {
                                        bounds.extend(place.geometry.location);
                                    }
                                    inputGeo.value = place.geometry.location;
                                });
                                map.fitBounds(bounds);
                            });
                        }

                        window.initAutocomplete = initAutocomplete;

                    </script>
                </div>


						<!-- Контакты -->
						<!-- Контакты -->
                <div class="announcement-content__block announcement-content__contacts">
                    <div class="announcement-content__title">Контакты</div>
                    <div class="announcement-content__contacts-wrap announcement-contacts__wrap grid">
                        <div class="col_50">
                            <label>
                                <div class="announcement-label__title">Основной (мобильный) *</div>
                                <input type="tel" name="UF_OWNER_PHONE">
                            </label>
                        </div>

                        <div class="col_50">
                            <label>
                                <div class="announcement-label__title">Номер телефона 2</div>
                                <input type="tel" name="UF_PHONE_TWO">
                            </label>
                        </div>
                    </div>
                </div>



                            </div>
                        </div>


                        <div class="announcement-content__block announcement-content__save">
                            <a href="#" class="announcement-content__save-btn announcement-save__btn">
                                <div class="announcement-content__save-btn-img">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/save-icon.svg" alt="">
                                </div>
                                <div class="announcement-content__save-btn-text">Сохранить и выйти</div>
                            </a>
                            <button href="#" class="announcement-content__save-next">Продолжить</button>
                        </div>
                    </section>



										<?$APPLICATION->IncludeComponent(
										    "bitrix:main.include",
										    "stendu",
										    Array(
										        "AREA_FILE_SHOW" => "file",
										        "AREA_FILE_SUFFIX" => "inc",
										        "COMPOSITE_FRAME_MODE" => "A",
										        "COMPOSITE_FRAME_TYPE" => "AUTO",
										        "EDIT_TEMPLATE" => "",
										        "PATH" => "/includes/announcement-modal.php"
										    )
										);?>



<script>
if ($(`select`)) {
    $(`select`).niceSelect()
}

        ymaps.ready(function () {
            var myMap = new ymaps.Map('announcement-place-map', {
                center: [55.755811, 37.617617],
                zoom: 9,
                controls: []
            }, {
                searchControlProvider: 'yandex#search'
            }),

                MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                    '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                ),

                myPlacemark = new ymaps.Placemark([55.662004, 37.126448], {
                    hintContent: 'Собственный значок метки',
                    balloonContent: 'Это красивая метка'
                }, {
                    iconLayout: 'default#image',
                    iconImageHref: '<?= SITE_TEMPLATE_PATH ?>/images/announcement/map-mark.svg',
                    iconImageSize: [70, 96],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-35, -96]
                });

            myMap.geoObjects
                .add(myPlacemark),
                myMap.behaviors.disable('scrollZoom');
        });



//Добавление фото в создание заказа
class AddPortfolio {
    constructor(selector, options) {
        this.$element = document.querySelector('.announcement-content__appearance-photos-wrap');
        this.setUp();
    }

    setUp() {
        if (this.$element) {
            this.$fileSelectDt = new DataTransfer();
            this.$file = this.$element.querySelector('.announcement-content__appearance-photo-input');
            this.$list = this.$element.querySelector('.announcement-content__appearance-photos');
            this.fileHendler();
            this.removeHendler();
        }
    }

    fileHendler() {
        this.$file.addEventListener('change', () => {
            if (this.$file.files.length > 0) {
                for (var key in this.$file.files) {
                    this.$fileSelectDt.items.add(this.$file.files[key])

                    let path = this.imgPath = window.URL.createObjectURL(this.$file.files[key]);
                    this.addItem(path);
                }

            }
        })
    }

    removeHendler() {
        this.$list.addEventListener('click', (e) => {
            if (e.target.dataset.appearancephotoremove) {
                this.removeArrItem(e.target.parentNode);
                this.removeItem(e.target.dataset.appearancephotoremove);

            }
        })
    }

    removeItem(id) {
        document.querySelector(`.announcement-content__appearance-photo[data-appearance-photo="${id}"]`).remove();

    }

    removeArrItem(el) {
        let dt = new DataTransfer()
        const index = Array.prototype.indexOf.call(el.parentNode.children, el);

        // Copy all besides deleted
        for (let i = 0; i <= this.$fileSelectDt.files.length - 1; i++)
            if (i !== index)
                dt.items.add(this.$fileSelectDt.files[i])

        // Replace
        this.$fileSelectDt = dt
        this.$file.files = this.$fileSelectDt.files

    }

    addItem(path) {
        let items = document.querySelectorAll('.announcement-content__appearance-photo');
        let id = items.length > 0 ? items[items.length - 1].getAttribute('data-appearance-photo') : 0;
        this.$list.insertAdjacentHTML('beforeend', this.getTemplate(path, +id + 1));
        document.getElementById('load-modal__photo').src = path;

    }

    getTemplate(path, id) {
        return `
        <div class="announcement-content__appearance-photo" data-appearance-photo="${id}">
          <div class="announcement-content__appearance-photo-img">
            <img src="${path}" alt="">
          </div>
          <div class="announcement-content__appearance-photo-remove" data-appearancePhotoRemove="${id}">
            <img src="/local/templates/stendu/images/announcement/appearance-photo-delete.svg" alt="">
          </div>
        </div>
      `;
    }
}

const addPOrtfolio = new AddPortfolio();
    </script>
