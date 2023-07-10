<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Транспорт");



?>
  <main class="main">

      <?$APPLICATION->IncludeComponent(
          "vladek:transport.navigation",
          ".default",
          array(
              "COMPONENT_TEMPLATE" => ".default"
          ),
          false
      );?>

    <section class="announcements">
      <div class="container announcements-ajax">
          <div class="announcements__top">
              <div class="announcements__title title">
                  Все объявления
              </div>
              <div class="announcements__select">
                  Дата:
                  <select class="select-sort-ajax" type="date">
                      <option <?php if(!$_GET['sort_price'] || $_GET['sort_price'] == null) echo 'selected'?> value="">За все время</option>
                      <option <?php if($_GET['sort_time'] == 'desc') echo 'selected'?> value="desc">Сначала новые</option>
                      <option <?php if($_GET['sort_time'] == 'asc') echo 'selected'?> value="asc">Сначала старые</option>
                  </select>
              </div>

              <div class="announcements__select">
                  Цена:
                  <select class="select-sort-ajax" type="price">
                      <option <?php if(!$_GET['sort_price'] || $_GET['sort_price'] == null) echo 'selected'?> value="">По умолчанию</option>
                      <option <?php if($_GET['sort_price'] == 'asc') echo 'selected'?> value="asc">По возрастанию</option>
                      <option <?php if($_GET['sort_price'] == 'desc') echo 'selected'?> value="desc">По убыванию</option>
                  </select>
              </div>

              <label class="announcements__format announcements__format--active">
                  <input class="announcements__radio" name="format" type="radio" checked>

                  <svg class="announcements__svg" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M24 8.52V3.98C24 2.57 23.36 2 21.77 2H17.73C16.14 2 15.5 2.57 15.5 3.98V8.51C15.5 9.93 16.14 10.49 17.73 10.49H21.77C23.36 10.5 24 9.93 24 8.52Z"
                              stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                      <path
                              d="M24 21.7602V17.7202C24 16.1302 23.36 15.4902 21.77 15.4902H17.73C16.14 15.4902 15.5 16.1302 15.5 17.7202V21.7602C15.5 23.3502 16.14 23.9902 17.73 23.9902H21.77C23.36 23.9902 24 23.3502 24 21.7602Z"
                              stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                      <path
                              d="M10.5 8.52V3.98C10.5 2.57 9.86 2 8.27 2H4.23C2.64 2 2 2.57 2 3.98V8.51C2 9.93 2.64 10.49 4.23 10.49H8.27C9.86 10.5 10.5 9.93 10.5 8.52Z"
                              stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                      <path
                              d="M10.5 21.7602V17.7202C10.5 16.1302 9.86 15.4902 8.27 15.4902H4.23C2.64 15.4902 2 16.1302 2 17.7202V21.7602C2 23.3502 2.64 23.9902 4.23 23.9902H8.27C9.86 23.9902 10.5 23.3502 10.5 21.7602Z"
                              stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
              </label>

              <label class="announcements__format announcements__format--justify">
                  <input class="announcements__radio" name="format" type="radio">

                  <svg class="announcements__svg" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M19.9 14.5H4.1C2.6 14.5 2 15.14 2 16.73V20.77C2 22.36 2.6 23 4.1 23H19.9C21.4 23 22 22.36 22 20.77V16.73C22 15.14 21.4 14.5 19.9 14.5Z"
                              stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                      <path
                              d="M19.9 2H4.1C2.6 2 2 2.64 2 4.23V8.27C2 9.86 2.6 10.5 4.1 10.5H19.9C21.4 10.5 22 9.86 22 8.27V4.23C22 2.64 21.4 2 19.9 2Z"
                              stroke="#B9BECD" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
              </label>
          </div>

          <div class="announcements__inner">
              <div class="wrapper-filter">
              <ul class="announcements__items">

            <?$APPLICATION->IncludeComponent(
                "vladek:transport.elements",
                ".default",
                array(
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                false
            );?>
              </ul>
              </div>
                  <div class="announcements__advertising advertising">
                      <div class="advertising__other advertising-block">
                          <a class="advertising__other-link" href="#">
                              <div class="advertising__other-wrapper">
                                  <img class="advertising__other-img" src="<?=SITE_TEMPLATE_PATH?>/images/advertising-img.png" alt="фото рекламы">
                              </div>

                              <div class="advertising__other-content">
                                  <div class="advertising__other-title">
                                      Stendū вакансии
                                  </div>

                                  <div class="advertising__other-text">
                                      Тысячи предложений о работе рядом с домом!
                                  </div>
                              </div>
                          </a>
                      </div>

                      <div class="advertising__other advertising-block">
                          <a class="advertising__other-link" href="#">
                              <div class="advertising__other-wrapper">
                                  <img class="advertising__other-img" src="<?=SITE_TEMPLATE_PATH?>/images/advertising-img.png" alt="фото рекламы">
                              </div>

                              <div class="advertising__other-content">
                                  <div class="advertising__other-title">
                                      Stendū вакансии
                                  </div>

                                  <div class="advertising__other-text">
                                      Тысячи предложений о работе рядом с домом!
                                  </div>
                              </div>
                          </a>
                      </div>

                      <div class="advertising__other advertising-block">
                          <a class="advertising__other-link" href="#">
                              <div class="advertising__other-wrapper">
                                  <img class="advertising__other-img" src="<?=SITE_TEMPLATE_PATH?>/images/advertising-img.png" alt="фото рекламы">
                              </div>

                              <div class="advertising__other-content">
                                  <div class="advertising__other-title">
                                      Stendū вакансии
                                  </div>

                                  <div class="advertising__other-text">
                                      Тысячи предложений о работе рядом с домом!
                                  </div>
                              </div>
                          </a>
                      </div>

                      <div class="advertising__other advertising-block">
                          <a class="advertising__other-link" href="#">
                              <div class="advertising__other-wrapper">
                                  <img class="advertising__other-img" src="<?=SITE_TEMPLATE_PATH?>/images/advertising-img.png" alt="фото рекламы">
                              </div>

                              <div class="advertising__other-content">
                                  <div class="advertising__other-title">
                                      Stendū вакансии
                                  </div>

                                  <div class="advertising__other-text">
                                      Тысячи предложений о работе рядом с домом!
                                  </div>
                              </div>
                          </a>
                      </div>
                  </div>
          </div>
      </div>
    </section>
  </main>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>