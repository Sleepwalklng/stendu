<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
CModule::IncludeModule('highloadblock');
function GetEntityDataClass($HlBlockId) {
    if (empty($HlBlockId) || $HlBlockId < 1)
    {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}

global $USER;
$ID_user = $USER-> GetID();
$filter = Array(
    'ID' => $ID_user
);
$arParameters = array(
    'FIELDS' => array('ID', 'NAME', 'LAST_NAME', 'SECOND_NAME', 'EMAIL', 'PERSONAL_PHONE')
);
$rsUsers = CUser::GetList(($by = "ID"), ($order = "ASC"), $filter, $arParameters);
while ($arUser = $rsUsers->Fetch()) {
    $arUserID[] = $arUser;
}

// избранное
if ($USER->IsAuthorized()) {

    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();
    $arElements = $arUser['UF_FAVOR'];
    if ($_POST['SECTION'] == '3') {
        $_POST['SECTION'] = 1;
    }
    if ($_POST['SECTION'] == '2') {
        $_POST['SECTION'] = 2;
    }
    if ($_POST['SECTION'] == '11') {
        $_POST['SECTION'] = 3;
    }
    if ($_POST['SECTION'] == '1') {
        $_POST['SECTION'] = 4;
    }
    if ($_POST['SECTION'] == '13') {
        $_POST['SECTION'] = 5    ;
    }
    $key = array_search($_POST['SECTION'].'-'.$_POST['ID'], $arElements); // Находим элемент, который нужно удалить из избранного

    unset($arElements[$key]);
    $USER->Update($idUser, Array("UF_FAVOR" => $arElements)); // Добавляем элемент в избранное
    foreach ($arElements as $item) {
        $el = explode("-", $item);
        if ($el['0'] == '1') {
            $resultFav[3][] = $el['1'];
        }
        if ($el['0'] == '2') {
            $resultFav[2][] = $el['1'];
        }
        if ($el['0'] == '3') {
            $resultFav[11][] = $el['1'];
        }
        if ($el['0'] == '4') {
            $resultFav[1][] = $el['1'];
        }
        if ($el['0'] == '5') {
            $resultFav[13][] = $el['1'];
        }
    }
}

// Личные вещи
foreach ($resultFav as $key => $value):
    $entity_data_class_lich = GetEntityDataClass($key);
    $rsUslugi = $entity_data_class_lich::getList(array(
        "select" => array("*"),
        "order" => array("ID" => "DESC"),
        "filter" => array("ID" => $value) //Фильтрация выборки
    ));
    while ($usl = $rsUslugi->fetch()) {
        $usl['SECTION_ID'] = $key;
        $arLichnue[] = $usl;
    };
endforeach;
 foreach ($arLichnue as $item) {
    ?>
    <div class="admin-st__fav-inner">
        <div class="admin-st__card">
            <div class="admin-st__card-left">
                <div class="admin-st__card-image">
                    <?php if ($item['SECTION_ID'] == 1) {?>
                        <img src="<?= CFile::GetPath($item['UF_PHOTO']['0']) ?>" alt="">
                    <?php }elseif ($item['SECTION_ID'] == 3){?>
                        <img src="<?= CFile::GetPath($item['UF_TRANSPORT_IMAGES']['0']) ?>" alt="">
                    <?php }elseif ($item['SECTION_ID'] == 11){?>
                        <img src="<?= CFile::GetPath($item['UF_PHOTO']) ?>" alt="">
                    <?php }
                    else { ?>
                        <img src="<?= CFile::GetPath($item['UF_PHOTOS']['0']) ?>" alt="">
                    <?php } ?>


                </div>
                <!--    article-image -->
            </div>
            <!-- article-left -->
            <div class="admin-st__card-right">
                <div class="admin-st__card-info">
                    <div class="admin-st__card-info-title">
                        Информация
                    </div>
                    <!-- /.admin-st__card-info-title -->
                    <div class="admin-st__card-info-name">
                        <?php if ($item['SECTION_ID'] == 3) {
                            echo $item['UF_TRANSPORT_NAME'];
                        } else {
                            echo $item['UF_NAME'];
                        } ?>

                    </div>
                    <!-- name -->
                    <div class="admin-st__card-info-geo">
                        <div class="admin-st__card-info-geo-icon">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/admin-st/icon/geo.svg"
                                 alt="гео">
                        </div>
                        <!-- geo -->
                        <div class="admin-st__card-info-geo-text">
                            <?php if ($item['SECTION_ID'] == 3){?>
                                <?= $item['UF_TRANSPORT_ADDRESS'] ?>
                            <?php }elseif ($item['SECTION_ID'] == 11){?>
                                <?= $item['UF_ADRES'] ?>
                            <?php }
                            else { ?>
                                <?= $item['UF_ADDRESS'] ?>
                            <?php } ?>
                        </div>
                        <!-- /.admin-st__card-info-geo-text -->

                    </div>
                    <!-- /.admin-st__card-info-geo -->
                    <div class="admin-st__card-info-price">
                        <?php if ($item['SECTION_ID'] == 3) {
                            echo $item['UF_TRANSPORT_PRICE'];
                        } else {
                            echo $item['UF_PRICE'];
                        } ?><span>₽</span>
                    </div>
                    <!-- /.admin-st__card-info-price -->
                </div>
                <!-- /.admin-st__card-info -->
                <div class="admin-st__card-date">
                    <span>3 дня назад</span>
                </div>
                <!-- /.admin-st__card-date -->
                <button class="admin-st__fav-button-heart admin-st__fav-button-heart--mobile delete_izbrannoye"
                        data-section="<?= $item['SECTION_ID'] ?>"
                        data-id="<?= $item['ID'] ?>">
                    <div class="admin-st__fav-button-heart-icon ">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/heardw.svg"
                             alt="сердце">
                    </div>
                    <!-- /.admin-st__fav-button-heart-icon -->
                    <div class="admin-st__fav-button-heart-text">
                        <span>Удалить </span>
                    </div>
                    <!-- /.admin-st__fav-button-heart-text -->
                </button>
            </div>
            <!-- article-right -->
        </div>
        <!-- /.admin-st__card -->
        <button class="admin-st__fav-button-heart delete_izbrannoye"
                data-section="<?= $item['SECTION_ID'] ?>"
                data-id="<?= $item['ID'] ?>">
            <div class="admin-st__fav-button-heart-icon ">
                <img src="<?= SITE_TEMPLATE_PATH ?>/img/heardw.svg" alt="сердце">
            </div>
            <!-- /.admin-st__fav-button-heart-icon -->
            <div class="admin-st__fav-button-heart-text">
                <span>Удалить </span>
                <span>из избранного</span>
            </div>
            <!-- /.admin-st__fav-button-heart-text -->
        </button>
    </div>
<? } ?>

<script>
    $('.delete_izbrannoye').click(function () {
        let id = $(this).attr('data-id')
        let section = $(this).attr('data-section')
        $.ajax({
            type: 'post',
            url: '/ajax/delete-favorites.php',
            data: {"ID": id,'SECTION': section},
            dataType: 'html',
            success: function (data) {
                $('.favorites_list').html(data);
            },
            error: function (data) {
                console.log(data);
                console.log(false);
            }
        });
        return false;

    })
</script>
