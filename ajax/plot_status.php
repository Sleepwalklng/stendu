<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

if ($_REQUEST['plotStatus']) {
    ?>
    <label>
        <div class="announcement-label__title">Иное</div>
        <input type="text" name="UF_PLOT_STATUS2">
    </label>

<?php } ?>