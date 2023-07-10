<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';


$MY_HL_BLOCK_ID = 6;


$entity_data_class = GetEntityDataClass($MY_HL_BLOCK_ID);
$rsData = $entity_data_class::getList(array(
   'select' => array('*'),
   'order' => array('UF_TRANSPORT_MARK_NAME' => 'ASC'),
));

?>



						<ul class="brand-ad__list">


								<? while($el = $rsData->fetch()) { ?>
    							<li class="brand-ad__item brand-ad__item-d">
                                    <label class="brand-ad__label">
                                        <input type="text" name="brand" value="<?= $el['UF_ID_CAR'] ?>">
                                        <span class="brand-ad__item-img-box desktop">
                                            <img src="<?= CFile::GetPath($el['UF_TRANSPORT_MARK_LOGO']) ?>" alt="">
                                        </span>
                                        <span class="brand-ad__item-name"><?= $el['UF_TRANSPORT_MARK_NAME'] ?></span>
                                        <span class="brand-ad__item-number mobile"></span>
                                    </label>
                                </li>
								<? } ?>
						</ul>

<script>
		// выбор марки и переход к выбору модели
		$(document).ready(function () {
        $('.brand-ad__item-d').click(function () {
            var data = $(this).find('input').val();

            console.log(data);
            
    
            $.ajax({
                type: 'post',
                url: '/ajax/category/transport/model.php',
                data: { data: data },
                dataType: 'html',
                success: function (e) {
                    //$('.category-select').empty().append(e);
                    $('.update4').remove();
                    $('.brand-ad').remove();
                    $('.new-ad__form').append(e);
                    console.log(e);

                },
                error: function (e) {
                    console.log(false);
                }
            });
            return false;
        })
    });


</script>