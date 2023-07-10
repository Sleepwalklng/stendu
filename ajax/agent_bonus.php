<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

if ($_REQUEST['bonus']) {
    ?>
    <div class="label">
        <div class="announcement-label__title">Бонус к агенту</div>
        <input name="UF_AGENT_BONUS_VALUE" type="text" value="">
        <span class="measure"><?= $_REQUEST['bonus'] == 'Фиксированная цена' ? '€' : '%' ?></span>
    </div>

<?php } ?>