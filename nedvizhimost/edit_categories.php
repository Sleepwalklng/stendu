<?
$url = $_SERVER['REQUEST_URI'];
$sect = explode("/", $url)[2];

?>

<section class="data">
  <div class="container">
    <div class="data__title data__title--property title">
      <span class="data__title-categories">Недвижимость</span>

      <img class="data__title-img" src="<?=SITE_TEMPLATE_PATH?>/images/date-title2.png" alt="Недвижимость">

      <span class="data__title-text">в Риге</span>
    </div>

    <div class="data__subtitle">
      Продажа 1-комнатных квартир в Риге
    </div>

    <div class="data__offers">
      67 030 предложений
    </div>

    <ul class="data__categories data__categories--property">
      <li class="data__categories-item <?if ($sect == 'kupit') echo 'data__categories-item--active';?>">
        <a href="/nedvizhimost/kupit/" class="data__categories-label">
          <img class="data__categories-img" src="<?=SITE_TEMPLATE_PATH?>/images/property-data1.png" alt="Купить">

          <input class="data__radio" type="radio" name="categories" checked>

          <div class="data__text">Купить</div>
        </a>
      </li>

      <li class="data__categories-item <?if ($sect == 'snyat') echo 'data__categories-item--active';?>">
        <a href="/nedvizhimost/snyat/" class="data__categories-label">
          <img class="data__categories-img" src="<?=SITE_TEMPLATE_PATH?>/images/property-data2.png" alt="Снять">

          <input class="data__radio" type="radio" name="categories">

          <div class="data__text">Снять</div>
        </a>
      </li>

      <li class="data__categories-item <?if ($sect == 'posutochno') echo 'data__categories-item--active';?>">
        <a href="/nedvizhimost/posutochno/" class="data__categories-label">
          <img class="data__categories-img data__categories-img--fit" src="<?=SITE_TEMPLATE_PATH?>/images/property-data3.png" alt="Посуточно">

          <input class="data__radio" type="radio" name="categories">

          <div class="data__text">Посуточно</div>
        </a>
      </li>

      <li class="data__categories-item  data__categories-item--short">
        <a href="/nedvizhimost/" class="data__categories-label">
          <img class="data__categories-img data__categories-img--fit" src="<?=SITE_TEMPLATE_PATH?>/images/property-data4.png" alt="Запрос на недвижимость">

          <input class="data__radio" type="radio" name="categories">

          <div class="data__text">Запрос на недвижимость</div>
        </a>
      </li>
    </ul>
  </div>
</section>