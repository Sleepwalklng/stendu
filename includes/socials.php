<?php
$social = CIBlockElement::GetList(
    array('ID' => 'ASC'),
    array('IBLOCK_ID' => 9,'ACTIVE'=>'Y'),
    false,
    false,
    array('ID', 'NAME', 'PROPERTY_ICON_SVG', 'PROPERTY_ICON_ALT', 'PROPERTY_LINK')
);
while ($el = $social->GetNext()) {
    $socials[] = $el;
}
?>
<ul class="card__social">
    <? foreach ($socials as $social): ?>
        <li class="card__social-item">
            <a href="<?= $social['PROPERTY_LINK_VALUE'] ?>" class="card__social-link">
                <? if (!empty($social['PROPERTY_ICON_SVG_VALUE']['TEXT'])) {
                    echo $social['~PROPERTY_ICON_SVG_VALUE']['TEXT'];
                } else {
                    ?>
                    <img src="<?= CFile::GetPath($social['PROPERTY_ICON_ALT_VALUE']) ?>" alt="<?= $social['NAME'] ?>">
                    <?
                }
                ?>
            </a>
        </li>
    <? endforeach; ?>
</ul>