<?
 require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");


 ?>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>StendU | Транспорт в Риге</title>
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/style.min.css">
  <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/style.css">

</head>

   <main class="main">
    <section class="announcement">
      <div class="container">
        <div class="announcement-title">Создание объявления</div>
        <div class="announcement-wrap">
          <div class="announcement-content">
            <div class="announcement-content__block announcement-content__category">
              <div class="announcement-content__title">Категория</div>
              <div class="announcement-content__category-block">
                <div class="announcement-content__category-name">
                  <div class="announcement-content__category-img">
                    <img src="images/announcement/category-2.svg" alt="">
                  </div>
                  <div class="announcement-content__category-text">
                    <ul class="announcement-content__category-list">
                      <li>
                        <a href="#">Транспорт</a>
                      </li>
                      <li>
                        <a href="#">Автомобили</a>
                      </li>
                    </ul>
                    <div class="announcement-content__category-description">Новый</div>
                  </div>
                </div>
                <a href="#" class="announcement-content__category-more">
                  <span>Другая категория</span>
                  <img src="images/announcement/edit-icon.svg" alt="">
                </a>
              </div>
            </div>

            <div class="announcement-content__block announcement-content__brand">
              <div class="announcement-content__title">Выберите марку</div>
              <div action="#" class="announcement-content__brand-wrap">
                <label class="wide">
                  <div class="announcement-label__title">Название марки</div>
                  <input type="text" value="Название марки">
                </label>
              </div>
            </div>

            <ul class="data__items">
              <li class="data__box">
                <ul class="data__list">
                  <li class="data__item">
                    <div class="data__name">
                      LADA
                    </div>

                    <div class="data__count">
                      4 344
                    </div>

                    <img class="data__img" src="images/lada.svg" alt="LADA">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Ford
                    </div>

                    <div class="data__count">
                      4 344
                    </div>

                    <img class="data__img" src="images/ford.svg" alt="Ford">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Land Rover
                    </div>

                    <div class="data__count">
                      4 344
                    </div>

                    <img class="data__img" src="images/lada.svg" alt="Land Rover">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Opel
                    </div>

                    <div class="data__count">
                      4 344
                    </div>

                    <img class="data__img" src="images/lada.svg" alt="Opel">
                  </li>
                </ul>
              </li>

              <li class="data__box">
                <ul class="data__list">
                  <li class="data__item">
                    <div class="data__name">
                      Audi
                    </div>

                    <div class="data__count">
                      962
                    </div>

                    <img class="data__img" src="images/audi.svg" alt="Audi">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Geely
                    </div>

                    <div class="data__count">
                      962
                    </div>

                    <img class="data__img" src="images/gelly.svg" alt="Geely">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Lexus
                    </div>

                    <div class="data__count">
                      962
                    </div>

                    <img class="data__img" src="images/audi.svg" alt="Lexus">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Peugeot
                    </div>

                    <div class="data__count">
                      962
                    </div>

                    <img class="data__img" src="images/audi.svg" alt="Peugeot">
                  </li>
                </ul>
              </li>

              <li class="data__box">
                <ul class="data__list">
                  <li class="data__item">
                    <div class="data__name">
                      BMW
                    </div>

                    <div class="data__count">
                      1 436
                    </div>

                    <img class="data__img" src="images/bmw.svg" alt="BMW">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Honda
                    </div>

                    <div class="data__count">
                      1 436
                    </div>

                    <img class="data__img" src="images/honda.svg" alt="Honda">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      MINI
                    </div>

                    <div class="data__count">
                      1 436
                    </div>

                    <img class="data__img" src="images/bmw.svg" alt="MINI">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Porsche
                    </div>

                    <div class="data__count">
                      1 436
                    </div>

                    <img class="data__img" src="images/bmw.svg" alt="Porsche">
                  </li>

                </ul>
              </li>

              <li class="data__box">
                <ul class="data__list">
                  <li class="data__item">
                    <div class="data__name">
                      Chery
                    </div>

                    <div class="data__count">
                      3 013
                    </div>

                    <img class="data__img" src="images/chery.svg" alt="Chery">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Hyundai
                    </div>

                    <div class="data__count">
                      3 013
                    </div>

                    <img class="data__img" src="images/hyundai.svg" alt="hyundai">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Mazda
                    </div>

                    <div class="data__count">
                      3 013
                    </div>

                    <img class="data__img" src="images/chery.svg" alt="Mazda">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Renault
                    </div>

                    <div class="data__count">
                      3 013
                    </div>

                    <img class="data__img" src="images/chery.svg" alt="Renault">
                  </li>
                </ul>
              </li>

              <li class="data__box">
                <ul class="data__list">
                  <li class="data__item">
                    <div class="data__name">
                      Chevrolet
                    </div>

                    <div class="data__count">
                      3 013
                    </div>

                    <img class="data__img" src="images/chevrolet.svg" alt="Chevrolet">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Infiniti
                    </div>

                    <div class="data__count">
                      3 013
                    </div>

                    <img class="data__img" src="images/infiniti.svg" alt="infiniti">
                  </li>

                  <li class="data__item">
                    <div class="data__name">
                      Mercedes-Benz
                    </div>

                    <div class="data__count">
                      3 013
                    </div>

                    <img class="data__img" src="images/chevrolet.svg" alt="Mercedes-Benz">
                  </li>

                  <li class="data__item">
                    <a href="#" class="data__link link">
                      <span class="link__text">Все марки</span>

                      <div class="link__btn"></div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>

            <div class="announcement-content__block announcement-content__model">
              <div class="announcement-content__title">Выберите модель</div>
              <div action="#" class="announcement-content__model-wrap">
                <label class="wide">
                  <div class="announcement-label__title">Модель</div>
                  <input type="text" value="Модель">
                </label>
              </div>
            </div>

            <div class="announcement-content__block announcement-content__car-parameters">
              <div class="announcement-content__title">Параметры</div>
              <div class="announcement-content__block-wrap">
                <label>
                  <div class="announcement-label__title">Год выпуска</div>
                  <div class="announcement-filter">
                    <input type="hidden" class="announcement-filter__select" value="1998">
                    <div class="select">
                      <div class="select_checked">
                        <span class="select-text">1998</span>
                      </div>
                      <ul class="select-dropdown">
                        <li class="select-dropdown__option" data-value="1998">
                          1998
                        </li>
                        <li class="select-dropdown__option" data-value="1999">
                          1999
                        </li>
                      </ul>
                    </div>
                  </div>
                </label>

                <div class="announcement-switch">
                  <div class="announcement-label__title">Тип кузова</div>
                  <div class="announcement-switch__wrap">
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-body-type" checked>
                      <span>Седан</span>
                    </label>
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-body-type">
                      <span>Универсал</span>
                    </label>
                  </div>
                </div>

                <div class="announcement-switch">
                  <div class="announcement-label__title">Двигатель</div>
                  <div class="announcement-switch__wrap">
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-engine" checked>
                      <span>Бензин</span>
                    </label>
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-engine">
                      <span>Дизель</span>
                    </label>
                  </div>
                </div>

                <label>
                  <div class="announcement-label__title">Поколение</div>
                  <div class="announcement-filter">
                    <input type="hidden" class="announcement-filter__select" value="C3 рестайлинг (1988—1991)">
                    <div class="select">
                      <div class="select_checked">
                        <span class="select-text">C3 рестайлинг (1988—1991)</span>
                      </div>
                      <ul class="select-dropdown">
                        <li class="select-dropdown__option" data-value="C3 рестайлинг (1988—1991)">
                          C3 рестайлинг (1988—1991)
                        </li>
                        <li class="select-dropdown__option" data-value="C4 рестайлинг (1988—1991)">
                          C4 рестайлинг (1988—1991)
                        </li>
                      </ul>
                    </div>
                  </div>
                </label>

                <div class="announcement-switch">
                  <div class="announcement-label__title">Привод</div>
                  <div class="announcement-switch__wrap">
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-drive" checked>
                      <span>Передний</span>
                    </label>
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-drive">
                      <span>Полный</span>
                    </label>
                  </div>
                </div>

                <div class="announcement-switch">
                  <div class="announcement-label__title">Коробка передач</div>
                  <div class="announcement-switch__wrap">
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-transmission" checked>
                      <span>Автомат</span>
                    </label>
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-transmission">
                      <span>Механика</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="announcement-content__block announcement-content__plate-numbers">
              <div class="announcement-content__title">Госномер и VIN / номер кузова</div>
              <div class="announcement-content__subtitle">Мы размещаем только проверенные автомобили</div>
              <div class="announcement-content__block-wrap">
                <div class="announcement-content__plate-number">
                  <div class="announcement-label__title">Государственный номер</div>
                  <label>
                    <input type="text" placeholder="o   000   o o">
                  </label>
                  <label>
                    <input type="text" placeholder="000">
                  </label>
                </div>

                <label class="ss-wide">
                  <div class="announcement-label__title">VIN / Номер кузова</div>
                  <input type="text" value="101002020202020">
                </label>

                <label class="ss-wide">
                  <div class="announcement-label__title">Свидетельство о регистрации (СТС)</div>
                  <input type="text" value="101002020202020">
                </label>
              </div>
            </div>

            <div class="announcement-content__block announcement-content__story">
              <div class="announcement-content__title">История эксплуатации и состояние</div>
              <div class="announcement-content__block-wrap">
                <div class="announcement-switch">
                  <div class="announcement-label__title">Паспорт транспортного средства</div>
                  <div class="announcement-switch__wrap">
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-vehicle-passport" checked>
                      <span>Оригинал</span>
                    </label>
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-vehicle-passport">
                      <span>Дубликат</span>
                    </label>
                  </div>
                </div>

                <div class="announcement-switch">
                  <div class="announcement-label__title">Владельцев по ПТС</div>
                  <div class="announcement-switch__wrap">
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-owner" checked>
                      <span>1</span>
                    </label>
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-owner">
                      <span>2</span>
                    </label>
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-owner">
                      <span>3</span>
                    </label>
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-owner">
                      <span>4+</span>
                    </label>
                  </div>
                </div>

                <div class="announcement-content__story-block">
                  <div class="announcement-label__title">Когда был куплен автомобиль</div>
                  <label class="ss-wide">
                    <input type="text" placeholder="Год">
                  </label>

                  <label class="ss-wide">
                    <input type="text" placeholder="Месяц">
                  </label>
                </div>

                <label>
                  <div class="announcement-label__title">Пробег</div>
                  <input type="text" value="20 000 км">
                </label>

                <div class="announcement-switch">
                  <div class="announcement-label__title">Состояние</div>
                  <div class="announcement-switch__wrap">
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-condition" checked>
                      <span>Битый</span>
                    </label>
                    <label class="announcement-switch__item">
                      <input type="radio" name="switch-condition">
                      <span>Не битый</span>
                    </label>
                  </div>
                </div>

                <label class="label-checkbox">
                  <input type="checkbox" class="visually-hidden" checked>
                  <span></span>
                  <div>На гарантии</div>
                </label>
              </div>
            </div>

            <div class="announcement-content__block announcement-content__description">
              <div class="announcement-content__title">Описание</div>
              <div class="announcement-content__block-wrap">
                <label class="wide">
                  <div class="announcement-label__title">Описание</div>
                  <textarea
                    placeholder="Честно опишите достоинства и недостатки своего автомобиля.                                                                                                                                 Не указывайте в описании телефон и e-mail — для этого есть отдельные поля."></textarea>
                </label>
              </div>
            </div>

            <div class="announcement-content__block announcement-content__appearance">
              <div class="announcement-content__title">Внешний вид</div>
              <div class="announcement-content__appearance-block">
                <div class="announcement-label__title">Фотографии</div>
                <div class="announcement-content__appearance-photos-wrap">
                  <div class="announcement-content__appearance-photos">
                    <div class="announcement-content__appearance-photo appearance-photo-main" data-appearance-photo="1">
                      <div class="announcement-content__appearance-photo-img">
                        <img src="images/announcement/appearance-photo.png" alt="">
                      </div>
                      <div class="announcement-content__appearance-photo-remove" data-appearancePhotoRemove="1">
                        <img src="images/announcement/appearance-photo-delete.svg" alt="">
                      </div>
                    </div>

                    <div class="announcement-content__appearance-photo" data-appearance-photo="2">
                      <div class="announcement-content__appearance-photo-img">
                        <img src="images/announcement/appearance-photo1.png" alt="">
                      </div>
                      <div class="announcement-content__appearance-photo-remove" data-appearancePhotoRemove="2">
                        <img src="images/announcement/appearance-photo-delete.svg" alt="">
                      </div>
                    </div>

                    <div class="announcement-content__appearance-photo" data-appearance-photo="3">
                      <div class="announcement-content__appearance-photo-img">
                        <img src="images/announcement/appearance-photo2.png" alt="">
                      </div>
                      <div class="announcement-content__appearance-photo-remove" data-appearancePhotoRemove="3">
                        <img src="images/announcement/appearance-photo-delete.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <label>
                    <input type="file" hidden class="announcement-content__appearance-photo-input">
                  </label>
                </div>

              </div>
              <div class="announcement-content__appearance-inputs">
                <label>
                  <div class="announcement-label__title">Цвет</div>
                  <div class="announcement-filter">
                    <input type="hidden" class="announcement-filter__select" value="Белый">
                    <div class="select">
                      <div class="select_checked">
                        <span class="select-text">Белый</span>
                      </div>
                      <ul class="select-dropdown">
                        <li class="select-dropdown__option" data-value="Белый">
                          Белый
                        </li>
                        <li class="select-dropdown__option" data-value="Черный">
                          Черный
                        </li>
                      </ul>
                    </div>
                  </div>
                </label>

                <label class="s-wide">
                  <div class="announcement-label__title">Видео c YouTube</div>
                  <input type="text" placeholder="Например: https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                </label>
              </div>
            </div>

            <div class="announcement-content__block announcement-content__options">
              <div class="announcement-content__title">Опции</div>
              <div class="announcement-content__options-wrap">
                <div class="announcement-content__options-item">
                  <div class="announcement-content__options-title">Безопасность</div>
                  <div class="announcement-content__options-body">
                    <div class="label-group">
                      <label>
                        <div class="announcement-label__title">Подушки безопасности</div>
                        <div class="announcement-filter">
                          <input type="hidden" class="announcement-filter__select" value="Водителя">
                          <div class="select">
                            <div class="select_checked">
                              <span class="select-text">Водителя</span>
                            </div>
                            <ul class="select-dropdown">
                              <li class="select-dropdown__option" data-value="Водителя">
                                Водителя
                              </li>
                              <li class="select-dropdown__option" data-value="Пассажира">
                                Пассажира
                              </li>
                            </ul>
                          </div>
                        </div>
                      </label>

                      <label>
                        <div class="announcement-label__title">Система крепления</div>
                        <div class="announcement-filter">
                          <input type="hidden" class="announcement-filter__select" value="Передний ряд">
                          <div class="select">
                            <div class="select_checked">
                              <span class="select-text">Передний ряд</span>
                            </div>
                            <ul class="select-dropdown">
                              <li class="select-dropdown__option" data-value="Передний ряд">
                                Передний ряд
                              </li>
                              <li class="select-dropdown__option" data-value="Задний ряд">
                                Задний ряд
                              </li>
                            </ul>
                          </div>
                        </div>
                      </label>

                      <label>
                        <div class="announcement-label__title">Вспомогательные системы</div>
                        <div class="announcement-filter">
                          <input type="hidden" class="announcement-filter__select" value="Вспомогательные системы (2)">
                          <div class="select">
                            <div class="select_checked">
                              <span class="select-text">Вспомогательные системы (2)</span>
                            </div>
                            <ul class="select-dropdown">
                              <li class="select-dropdown__option" data-value="Вспомогательные системы (2)">
                                Вспомогательные системы (2)
                              </li>
                              <li class="select-dropdown__option" data-value="Вспомогательные системы (3)">
                                Вспомогательные системы (3)
                              </li>
                            </ul>
                          </div>
                        </div>
                      </label>
                    </div>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" checked>
                      <span></span>
                      <div>Антиблокировочная система (ABS)</div>
                    </label>
                  </div>
                </div>

                <div class="announcement-content__options-item item-review">
                  <div class="announcement-content__options-title">Обзор</div>
                  <div class="announcement-content__options-body">
                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" checked>
                      <span></span>
                      <div>Противотуманные фары</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" checked>
                      <span></span>
                      <div>Автоматический корректор фар</div>
                    </label>

                    <label>
                      <!-- <div class="announcement-label__title">Вид фар</div> -->
                      <div class="announcement-filter">
                        <input type="hidden" class="announcement-filter__select" value="Вид фар">
                        <div class="select">
                          <div class="select_checked">
                            <span class="select-text">Вид фар</span>
                          </div>
                          <ul class="select-dropdown">
                            <li class="select-dropdown__option" data-value="Вид фар">
                              Вид фар
                            </li>
                            <li class="select-dropdown__option" data-value="Вид фар1">
                              Вид фар1
                            </li>
                          </ul>
                        </div>
                      </div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" checked>
                      <span></span>
                      <div>Дневные ходовые огни</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" checked>
                      <span></span>
                      <div>Омыватель фар</div>
                    </label>

                    <label>
                      <!-- <div class="announcement-label__title">Электрообогрев</div> -->
                      <div class="announcement-filter">
                        <input type="hidden" class="announcement-filter__select" value="Электрообогрев">
                        <div class="select">
                          <div class="select_checked">
                            <span class="select-text">Электрообогрев</span>
                          </div>
                          <ul class="select-dropdown">
                            <li class="select-dropdown__option" data-value="Электрообогрев">
                              Электрообогрев
                            </li>
                            <li class="select-dropdown__option" data-value="Электрообогрев1">
                              Электрообогрев1
                            </li>
                          </ul>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>

                <div class="announcement-content__options-item">
                  <div class="announcement-content__options-title">Безопасность</div>
                  <div class="announcement-content__options-body">
                    <div class="label-group">
                      <label>
                        <div class="announcement-label__title">Кондиционер</div>
                        <div class="announcement-filter">
                          <input type="hidden" class="announcement-filter__select" value="Клмат контроль многозонный">
                          <div class="select">
                            <div class="select_checked">
                              <span class="select-text">Клмат контроль многозонный</span>
                            </div>
                            <ul class="select-dropdown">
                              <li class="select-dropdown__option" data-value="Клмат контроль многозонный">
                                Клмат контроль многозонный
                              </li>
                              <li class="select-dropdown__option" data-value="Клмат контроль многозонный2">
                                Клмат контроль многозонный2
                              </li>
                            </ul>
                          </div>
                        </div>
                      </label>

                      <label>
                        <div class="announcement-label__title">Система помощи при парковке</div>
                        <div class="announcement-filter">
                          <input type="hidden" class="announcement-filter__select" value="Передний ряд">
                          <div class="select">
                            <div class="select_checked">
                              <span class="select-text">Передний ряд</span>
                            </div>
                            <ul class="select-dropdown">
                              <li class="select-dropdown__option" data-value="Передний ряд">
                                Передний ряд
                              </li>
                              <li class="select-dropdown__option" data-value="Задний ряд">
                                Задний ряд
                              </li>
                            </ul>
                          </div>
                        </div>
                      </label>

                      <label>
                        <div class="announcement-label__title">Система помощи при парковке</div>
                        <div class="announcement-filter">
                          <input type="hidden" class="announcement-filter__select" value="Патронник передний">
                          <div class="select">
                            <div class="select_checked">
                              <span class="select-text">Патронник передний</span>
                            </div>
                            <ul class="select-dropdown">
                              <li class="select-dropdown__option" data-value="Патронник передний">
                                Патронник передний
                              </li>
                              <li class="select-dropdown__option" data-value="Патронник задний">
                                Патронник задний
                              </li>
                            </ul>
                          </div>
                        </div>
                      </label>

                      <label>
                        <div class="announcement-label__title">Регулировка руля</div>
                        <div class="announcement-filter">
                          <input type="hidden" class="announcement-filter__select" value="По высоте">
                          <div class="select">
                            <div class="select_checked">
                              <span class="select-text">По высоте</span>
                            </div>
                            <ul class="select-dropdown">
                              <li class="select-dropdown__option" data-value="По высоте">
                                По высоте
                              </li>
                              <li class="select-dropdown__option" data-value="По ширине">
                                По ширине
                              </li>
                            </ul>
                          </div>
                        </div>
                      </label>

                      <label>
                        <div class="announcement-label__title">Электростеплоподъемники</div>
                        <div class="announcement-filter">
                          <input type="hidden" class="announcement-filter__select" value="Задние">
                          <div class="select">
                            <div class="select_checked">
                              <span class="select-text">Задние</span>
                            </div>
                            <ul class="select-dropdown">
                              <li class="select-dropdown__option" data-value="Задние">
                                Задние
                              </li>
                              <li class="select-dropdown__option" data-value="Передние">
                                Передние
                              </li>
                            </ul>
                          </div>
                        </div>
                      </label>

                      <label>
                        <div class="announcement-label__title">Усилитель руля</div>
                        <div class="announcement-filter">
                          <input type="hidden" class="announcement-filter__select" value="Активный">
                          <div class="select">
                            <div class="select_checked">
                              <span class="select-text">Активный</span>
                            </div>
                            <ul class="select-dropdown">
                              <li class="select-dropdown__option" data-value="Активный">
                                Активный
                              </li>
                              <li class="select-dropdown__option" data-value="Пассивный">
                                Пассивный
                              </li>
                            </ul>
                          </div>
                        </div>
                      </label>
                    </div>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" checked>
                      <span></span>
                      <div>Система выбора режима движения</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" checked>
                      <span></span>
                      <div>Мультифункциональное рулевое колесо</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" checked>
                      <span></span>
                      <div>Бортовой компьютер</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" checked>
                      <span></span>
                      <div>Система доступа без ключа</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" checked>
                      <span></span>
                      <div>Электроскладывание зеркал</div>
                    </label>

                    <label class="label-checkbox">
                      <input type="checkbox" class="visually-hidden" checked>
                      <span></span>
                      <div>Электропривод зеркал</div>
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="announcement-content__block announcement-content__place">
              <div class="announcement-content__title">Место сделки</div>
              <div class="announcement-content__place-search">
                <label class="wide">
                  <div class="announcement-label__title">Адрес <span>?</span></div>
                  <input type="search" placeholder="Начните вводить адрес, а потом выберите из списка">
                  <button class="announcement-content__place-search-btn">
                    <img src="images/announcement/search.svg" alt="">
                  </button>
                </label>
              </div>
              <div class="announcement-content__place-map" id="announcement-place-map"></div>
            </div>

            <div class="announcement-content__block announcement-content__contacts">
              <div class="announcement-content__title">Контакты</div>
              <div class="announcement-content__contacts-wrap announcement-contacts__wrap">
                <label class="ss-wide">
                  <div class="announcement-label__title">Введите e-mail</div>
                  <input type="email" value="example@mail.ru">
                </label>

                <label class="ss-wide">
                  <div class="announcement-label__title">Введите телефон</div>
                  <input type="text" value="+74993481034">
                </label>

                <div class="announcement-contacts__block">
                  <div class="announcement-contacts__block-title">Способ связи</div>
                  <div class="announcement-contacts__block-pick">
                    <label>
                      <input type="radio" name="announcement-contacts-raido" class="visually-hidden" checked>
                      <span></span>
                      <div>По телефону и в сообщениях</div>
                    </label>
                    <label>
                      <input type="radio" name="announcement-contacts-raido" class="visually-hidden">
                      <span></span>
                      <div>По телефону</div>
                    </label>
                    <label>
                      <input type="radio" name="announcement-contacts-raido" class="visually-hidden">
                      <span></span>
                      <div>В сообщениях</div>
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="announcement-content__block announcement-content__save">
              <a href="#" class="announcement-content__save-btn announcement-save__btn">
                <div class="announcement-content__save-btn-img">
                  <img src="images/announcement/save-icon.svg" alt="">
                </div>
                <div class="announcement-content__save-btn-text">Сохранить и выйти</div>
              </a>
              <a href="#" class="announcement-content__save-next">Продолжить</a>
            </div>
          </div>

          <div class="announcement-stages">
            <div class="announcement-stages__banner">
              <div class="announcement-stages__banner-corner corner-left"></div>
              <div class="announcement-stages__banner-corner corner-right"></div>
              <div class="announcement-stages__banner-img">
                <img src="images/announcement/stages-banner.svg" alt="">
              </div>
            </div>
            <div class="announcement-stages__content">
              <div class="announcement-stages__items">
                <div class="announcement-stages__item active">
                  <div class="announcement-stages__item-img">
                    <img src="images/announcement/stage-1.svg" alt="">
                  </div>
                  <div class="announcement-stages__item-name">Категория</div>
                </div>
                <div class="announcement-stages__item active">
                  <div class="announcement-stages__item-img">
                    <img src="images/announcement/stage-2.svg" alt="">
                  </div>
                  <div class="announcement-stages__item-name">Параметры</div>
                </div>
                <div class="announcement-stages__item active">
                  <div class="announcement-stages__item-img">
                    <img src="images/announcement/stage-3.svg" alt="">
                  </div>
                  <div class="announcement-stages__item-name">Внешний вид</div>
                </div>
                <div class="announcement-stages__item">
                  <div class="announcement-stages__item-img">
                    <img src="images/announcement/stage-4.svg" alt="">
                  </div>
                  <div class="announcement-stages__item-name">Место сделки</div>
                </div>
                <div class="announcement-stages__item">
                  <div class="announcement-stages__item-img">
                    <img src="images/announcement/stage-5.svg" alt="">
                  </div>
                  <div class="announcement-stages__item-name">Контакты</div>
                </div>
              </div>
              <a href="#" class="announcement-stages__link">
                <div class="announcement-stages__link-suptitle">Столкнулись с проблемой?</div>
                <div class="announcement-stages__link-title">Задайте нам вопрос</div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  </html>

<? //require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
