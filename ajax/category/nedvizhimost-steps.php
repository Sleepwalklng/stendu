<?
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';



$MY_HL_BLOCK_ID = $_REQUEST['category'];
CModule::IncludeModule('highloadblock');

//$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
//$rsData = $entity_data_class::getList(array(
//    'select' => array('*')
//));
//while($el = $rsData->fetch()){
//    $array[] = $el;
//}

function userFieldEnum($id, $ar): array
{
    $obEnum = new \CUserFieldEnum;
    $rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => $id));
    while ($ob = $rsEnum->fetch()) {
        if ($ar) {
            if (in_array($ob['ID'], $ar)) {
                $arr[] = $ob;
            }
        } else {
            $arr[] = $ob;
        }

    };
    return $arr;
}

$region = 54;
if ($_REQUEST['step'] == 1) {
    $_REQUEST['step'] = 2;
    $array = userFieldEnum(203, false);

} elseif ($_REQUEST['step'] == 3) {
    $array = userFieldEnum(199, false);
    $agent = $_REQUEST['subcategory'];
} elseif ($_REQUEST['step'] == 4) {
    $deal = $_REQUEST['subcategory'];
    if ($_REQUEST['subcategory'] == 68) {
        $array = userFieldEnum(273, [126, 127, 134, 129]);
    } elseif ($_REQUEST['subcategory'] == 69) {
        $array = userFieldEnum(453, false);
    } else {
        $array = userFieldEnum(277, false);
    }

} elseif ($_REQUEST['step'] == 5) {
    if ($_REQUEST['subcategory'] == 144) {
        $type_of_rs = $_REQUEST['subcategory'];//жилая
        if ($_REQUEST['deal'] == 66) {
            $array = userFieldEnum(273, [126, 127, 128, 129, 131, 132, 133]);
        } elseif ($_REQUEST['deal'] == 67) {
            $array = userFieldEnum(273, [126, 127, 134, 129, 131, 132]);
        }
    } elseif ($_REQUEST['subcategory'] == 145) {
        $type_of_rs = $_REQUEST['subcategory'];//коммерческая
        if ($_REQUEST['deal'] == 66) {
            $array = userFieldEnum(273, [135, 136, 137, 138, 139, 140, 141, 142, 143]);
        } elseif ($_REQUEST['deal'] == 67) {
            $array = userFieldEnum(273, [135, 136, 137, 138, 139, 141, 142, 143]);
        }
    } elseif ($_REQUEST['subcategory'] == 150) {    //Запросы на неджвижимость
        $request = $_REQUEST['subcategory'];
        $array = userFieldEnum(273, [126, 127, 134, 129]);
    } else {
        $request = $_REQUEST['subcategory'];
        $array = userFieldEnum(277, false);
    }

} elseif ($_REQUEST['step'] == 6) {

    $type_of_rs = $_REQUEST['subcategory'];
    if ($type_of_rs == 144) {
        if ($_REQUEST['request'] == 148) {
            $array = userFieldEnum(273, [126, 127, 128, 129, 131, 132, 133]);
        } elseif ($_REQUEST['request'] == 149) {
            $array = userFieldEnum(273, [126, 127, 134, 129, 131, 132]);

        }
    } elseif ($type_of_rs == 145) {
        if ($_REQUEST['request'] == 148) {
            $array = userFieldEnum(273, [135, 136, 137, 138, 139, 140, 141, 142, 143]);
        } elseif ($_REQUEST['request'] == 149) {
            $array = userFieldEnum(273, [135, 136, 137, 138, 139, 141, 142, 143]);
        }
    }
}
?>

<div class="new-ad__category-content">
    <div class="new-ad__category-title-box">
        <h3 class="new-ad__item-title">Категория</h3>
        <button type="button" class="new-ad__category-reset-btn mobile">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 20H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16.5 3.50023C16.8978 3.1024 17.4374 2.87891 18 2.87891C18.2786 2.87891 18.5544 2.93378 18.8118 3.04038C19.0692 3.14699 19.303 3.30324 19.5 3.50023C19.697 3.69721 19.8532 3.93106 19.9598 4.18843C20.0665 4.4458 20.1213 4.72165 20.1213 5.00023C20.1213 5.2788 20.0665 5.55465 19.9598 5.81202C19.8532 6.06939 19.697 6.30324 19.5 6.50023L7 19.0002L3 20.0002L4 16.0002L16.5 3.50023Z"
                      stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
    <div class="new-ad__category">
        <div class="new-ad__category-icon">
            <img src="<?= SITE_TEMPLATE_PATH ?>/images/announcement/category-3.svg" alt="">
        </div>
        <div class="new-ad__category-name-box">
            <h3 class="new-ad__category-title">
                <span>Недвижимость</span>
            </h3>
            <p class="new-ad__category-sub-title">
            </p>
        </div>
        <button type="button" class="new-ad__category-reset-btn desktop other-category">Другая категория</button>
    </div>
</div>
<div class="new-ad__category-edit">
    <div class="new-ad__category-search-box">
        <label class="new-ad__category-label-search">
            <input placeholder="Начните вводить название" type="text">
        </label>
        <label class="new-ad__category-label-search active">
            <input placeholder="Выберите подкатегорию" type="text">
        </label>
        <label class="new-ad__category-label-search">
            <input placeholder="Выберите подкатегорию" type="text">
        </label>
    </div>
    <div class="new-ad__category-checkboxes">
        <div class="new-ad__subcategory-list-box">
            <div class="new-ad__subcategory-list">

                <? foreach ($array as $item) { ?>
                    <label class="new-ad__subcategory-label">

                        <input class="subcategory" type="radio" name="subcategory" value="<?= $item['ID'] ?>">
                        <input class="category" type="hidden" name="category" value="Недвижимость">
                        <input class="region" type="hidden" name="region" value="<?= $region ?>">
                        <input class="agent" type="hidden" name="agent" value="<?= $agent ?>">
                        <input class="deal" type="hidden" name="deal" value="<?= $deal ?>">
                        <input class="type_of_rs" type="hidden" name="type_of_rs" value="<?= $type_of_rs ?>">
                        <input class="step" type="hidden" name="step" value="<?= $_REQUEST['step'] ?>">
                        <input class="request" type="hidden" name="request" value="<?= $request ?>">
                        <span><?= $item['VALUE'] ?></span>
                    </label>
                <? } ?>

            </div>
        </div>
    </div>
</div>

<script>
    
    <?if($_REQUEST['step'] != 6 && $_REQUEST['subcategory'] != 68 && $_REQUEST['step'] != 5 || ($_REQUEST['step'] == 5 && $_REQUEST['deal'] == 69 && $_REQUEST['subcategory'] != 150)   ){?>
    $(document).ready(function () {
        $('.subcategory').click(function () {
            var category = $('input[name=category]').val();
            var subcategory = $(this).val();
            var region = $('.region').val();
            var agent = $('.agent').val();
            var deal = $('.deal').val();
            var request = $('.request').val();
            var step = 1 + Number($('.step').val());
            $.ajax({
                type: 'post',
                url: '/ajax/category/nedvizhimost-steps.php',
                data: {
                    category: category,
                    subcategory: subcategory,
                    agent: agent,
                    deal: deal,
                    region: region,
                    step: step,
                    request: request
                },
                dataType: 'html',
                success: function (e) {
                    $('.category-select').empty().append(e);
                    // console.log(e);
                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });
    <?}else{?>
    $(document).ready(function () {
        $('.subcategory').click(function () {
            var category = $('input[name=category]').val();
            var subcategory = $(this).val();
            var region = $('.region').val();
            var agent = $('.agent').val();
            var deal = $('.deal').val();
            var type = $(this).val();
            var request = $('.request').val();
            var type_of_rs = $('.type_of_rs').val();
            var step = 1 + Number($('.step').val());
            if (deal == 68) { //Сдать посуточно
                if (type == 126) {
                    var url = '/ajax/category/nedvizhimost/sdat_posutochno_zhiloe_kvartira.php';
                } else if (type == 127) {
                    var url = '/ajax/category/nedvizhimost/sdat_posutochno_zhiloe_komnata.php';
                } else if (type == 134) {
                    var url = '/ajax/category/nedvizhimost/sdat_posutochnoe_zhiloe_kojko-mesto.php';
                } else if (type == 129) {
                    var url = '/ajax/category/nedvizhimost/sdat_posutochnoe_zhiloe_dom-dacha.php';
                }
            } else if (deal == 66) {//Продать
                if (type_of_rs == 144) {//Жилая
                    if (type == 126) {
                        var url = '/ajax/category/nedvizhimost/prodat_zhiloe_kvartira.php';
                    } else if (type == 127) {
                        var url = '/ajax/category/nedvizhimost/prodat_zhiloe_komnata.php';
                    } else if (type == 128) {
                        var url = '/ajax/category/nedvizhimost/prodat_dolya_v_kvartire.php';
                    } else if (type == 129) {
                        var url = '/ajax/category/nedvizhimost/prodat_zhiloe_dom_dacha.php';
                    } else if (type == 131) {
                        var url = '/ajax/category/nedvizhimost/prodat_zhiloe_taunhaus.php';
                    } else if (type == 132) {
                        var url = '/ajax/category/nedvizhimost/prodat_zhiloe_chast_doma.php';
                    } else if (type == 133) {
                        var url = '/ajax/category/nedvizhimost/prodat_zhiloe_uchastok.php';
                    }
                } else if (type_of_rs == 145) {//Коммерческая
                    if (type == 135) {
                        var url = '/ajax/category/nedvizhimost/prodat_kommercheskoe_ofis.php';
                    } else if (type == 136) {
                        var url = '/ajax/category/nedvizhimost/prodat_kommercheskoe_zdanie.php';
                    } else if (type == 137) {
                        var url = '/ajax/category/nedvizhimost/prodat_kommercheskoe_proizvodstvo.php';
                    } else if (type == 138) {
                        var url = '/ajax/category/nedvizhimost/prodat_kommercheskoe_sklad.php';
                    } else if (type == 139) {
                        var url = '/ajax/category/nedvizhimost/prodat_garazh.php';
                    } else if (type == 140) {
                        var url = '/ajax/category/nedvizhimost/prodat_gotovyj_biznes.php';
                    } else if (type == 141) {
                        var url = '/ajax/category/nedvizhimost/prodat_pomeshchenie_svobodnogo_nazvacheniya.php';
                    } else if (type == 142) {
                        var url = '/ajax/category/nedvizhimost/prodat_kommercheskoe_torgovaya_ploshchadka.php';
                    } else if (type == 143) {
                        var url = '/ajax/category/nedvizhimost/prodat_kommercheskaya_zemlya.php';
                    }
                }
            } else if (deal == 67) {//Сдать
                if (type_of_rs == 144) {//Жилая
                    if (type == 126) {
                        var url = '/ajax/category/nedvizhimost/sdat_zhiloe_kvartira.php';
                    } else if (type == 127) {
                        var url = '/ajax/category/nedvizhimost/sdat_zhiloe_komnata.php';
                    } else if (type == 134) {
                        var url = '/ajax/category/nedvizhimost/sdat_zhiloe_kojko-mesto.php';
                    } else if (type == 129) {
                        var url = '/ajax/category/nedvizhimost/sdat_zhiloe_dom-dacha.php';
                    } else if (type == 131) {
                        var url = '/ajax/category/nedvizhimost/sdat_zhiloe_taunhaus.php';
                    }else if (type == 132) {
                        var url = '/ajax/category/nedvizhimost/sdat_zhiloe_chast_doma.php';
                    }
                } else if (type_of_rs == 145) {//Коммерческая
                    if (type == 135) {
                        var url = '/ajax/category/nedvizhimost/sdat_kommercheskoe_ofis.php';
                    } else if (type == 136) {
                        var url = '/ajax/category/nedvizhimost/sdat_kommercheskoe_zdanie.php';
                    } else if (type == 137) {
                        var url = '/ajax/category/nedvizhimost/sdat_kommercheskoe_proizvodstvo.php';
                    } else if (type == 138) {
                        var url = '/ajax/category/nedvizhimost/sdat_kommercheskoe_sklad.php';
                    } else if (type == 139) {
                        var url = '/ajax/category/nedvizhimost/sdat_kommercheskoe_garazh.php';
                    } else if (type == 141) {
                        var url = '/ajax/category/nedvizhimost/sdat_pomeshchenie_svobodnogo_nazvacheniya.php';
                    } else if (type == 142) {
                        var url = '/ajax/category/nedvizhimost/sdat_kommercheskoe_torgovaya_ploshchadka.php';
                    } else if (type == 143) {
                        var url = '/ajax/category/nedvizhimost/sdat_kommercheskaya_zemlya.php';
                    }
                }
            } else if (deal == 69) {//Запрос на недвижимость
                if (request == 150) {//Снять на сутки
                    if (type == 126) {
                        var url = '/ajax/category/nedvizhimost/zaprosi/sozdanie_zaprosa_sdat_posutochno_zhiloe_kvartira.php';
                    } else if (type == 127) {
                        var url = '/ajax/category/nedvizhimost/zaprosi/sozdanie_zaprosa_sdat_posutochno_zhiloe_komnata.php';
                    } else if (type == 134) {
                        var url = '/ajax/category/nedvizhimost/zaprosi/sozdanie_zaprosa_sdat_posutochno_zhiloe_kojko-mesto.php';
                    } else if (type == 129) {
                        var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_sdat_posutochno_zhiloe_dom.php';
                    }
                } else if (request == 148) {//Покупка

                    if (type_of_rs == 144) {//Жилая
                        if (type == 126) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_zhiloe_kvartira.php'
                        } else if (type == 127) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_zhiloe_komnata.php'
                        } else if (type == 128) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_zhiloe_dolya_v_kvartire.php'
                        } else if (type == 129) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_zhiloe_dom.php'
                        } else if (type == 131) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_zhiloe_taunhaus.php'
                        } else if (type == 132) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_zhiloe_chast_doma.php'
                        } else if (type == 133) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_zhiloe_uchastok.php'
                        }
                    } else if (type_of_rs == 145) {//Коммерческая
                        if (type == 135) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_komercheskoe_ofis.php';
                        } else if (type == 136) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_komercheskoe_zdanie.php';
                        } else if (type == 137) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_komercheskoe_proizvodstvo.php';
                        } else if (type == 138) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_komercheskoe_sklad.php';
                        } else if (type == 139) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_kommercheskoe_garazh.php';
                        } else if (type == 140) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_kommercheskoe_gotovyj_bines_arendnyj_biznes.php';
                        } else if (type == 141) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_komercheskoe_pomeshchenie_svobodnogo_naznacheniya.php';
                        } else if (type == 142) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_komercheskoe_torgovaya_ploshchadka.php';
                        } else if (type == 143) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_kupit_komercheskoe_zemlya.php';
                        }
                    }
                } else if (request == 149) {//Снять
                    if (type_of_rs == 144) {//Жилая
                        if (type == 126) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_zhiloe_kvartira.php'
                        } else if (type == 127) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_zhiloe_komnata.php'
                        } else if (type == 134) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_zhiloe_kojko-mesto.php'
                        } else if (type == 129) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_zhiloe_dom.php'
                        } else if (type == 131) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_zhiloe_taunhaus.php'
                        } else if (type == 132) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_chast_doma.php'
                        }

                    }else if (type_of_rs == 145) {//Коммерческая
                        if (type == 135) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_komercheskoe_ofis.php';
                        } else if (type == 136) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_komercheskoe_zdanie.php';
                        } else if (type == 137) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_komercheskoe_proizvodstvo.php';
                        } else if (type == 138) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_komercheskoe_sklad.php';
                        } else if (type == 139) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/sozdanie_zaprosa_snyat_kommercheskoe_garazh.php';
                        } else if (type == 141) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_komercheskoe_pomeshchenie_svobodnogo_naznacheniya.php';
                        } else if (type == 142) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_komercheskoe_torgovaya_ploshchadka.php';
                        } else if (type == 143) {
                            var url = '/ajax/category/nedvizhimost/zaprosi/cozdanie_zaprosa_snyat_komercheskoe_zemlya.php';
                        }
                    }
                }
            }
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    category: category,
                    subcategory: subcategory,
                    agent: agent,
                    deal: deal,
                    region: region,
                    type: type,
                    type_of_rs: type_of_rs,
                    step: step,
                    request: request
                },
                dataType: 'html',
                success: function (e) {
                    $('.main').empty().append(e);
                    // console.log(e);
                },
                error: function (e) {
                    console.log(e);
                    console.log(false);
                }
            });
            return false;
        })
    });
    <?}?>
    // Другая категория
    $(document).ready(function () {
        $('.other-category').click(function () {
            var data = $(this).serialize();

            $.ajax({
                type: 'post',
                url: '/ajax/category/other.php',
                data: data,
                dataType: 'html',
                success: function (e) {
                    $('.category-select').empty().append(e);
                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });
</script>