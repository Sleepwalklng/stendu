<?php

use lib\GetUserData;

if ($user_id) {
    $user = GetUserData::getUser((int)$user_id);
}
global $USER;
$idUser = $USER->GetID();
$rsUser = CUser::GetByID($idUser);
$arUser = $rsUser->Fetch();
$arElements = $arUser['UF_SUBSCRIPTION'];
?>
<div class="card__seller">
    <div class="card__top">
        <div class="card__service">
            <?= $title ?? '' ?>
        </div>

        <div class="card__cost">
            <?= $price ?? '' ?>
        </div>

        <div class="card__favorite card__favorite--favorite">
            <div class="card__favorite-text">
                В избранном
            </div>

            <a class="card__favorite-btn">
                <svg viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M12.62 19.71C12.28 19.83 11.72 19.83 11.38 19.71C8.48 18.72 2 14.59 2 7.59C2 4.5 4.49 2 7.56 2C9.38 2 10.99 2.88 12 4.24C13.01 2.88 14.63 2 16.44 2C19.51 2 22 4.5 22 7.59C22 14.59 15.52 18.72 12.62 19.71Z"
                            stroke="white" stroke-width="2.3" stroke-linecap="round"
                            stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="card__info">
        <img class="card__info-img" src="<?= CFile::GetPath($user['PERSONAL_PHOTO'] ?? '') ?>"
             alt="<?= $user['NAME'] ?>">

        <div class="card__info-wrapper">
            <div class="card__name">
                <?= $user['NAME'] ?>
            </div>

            <div class="card__time">
                На Авито с 16 декабря 2020 года
            </div>

            <div class="card__about">
                <div class="card__rating">
                    <img class="card__rating-img" src="<?= SITE_TEMPLATE_PATH ?>/images/star.svg" 5.0">

                    <span class="card__rating-text">5.0</span>
                </div>

                <div class="card__review">
                    <span class="card__review-count">26</span> отзывов
                </div>

                <div class="card__announcement">
                    <span class="card__announcement-count">14</span> Объявлений
                </div>
            </div>
        </div>
    </div>

    <div class="card__boundary"></div>

    <div class="card__bottom">
        <div class="card__contacts">
            <a class="card__message btn-blue" href="#">
                <img class="card__message-img" src="<?= SITE_TEMPLATE_PATH ?>/images/message-white.svg"
                     alt="Написать">

                Написать
            </a>

            <div class="card__tel">
                <img class="card__tel-img" src="<?= SITE_TEMPLATE_PATH ?>/images/phone.svg"
                     alt="Позвонить">

                <div class="card__tel-wrapper">
                    <a class="card__tel-show" href="#">
                        Показать телефон
                    </a>

                    <a class="card__num" href="#">
                        +371 ··· ··· ·· ··
                    </a>
                </div>
            </div>
        </div>
        <? if ($user_id == $idUser) {
            ?>
            <a class="card__subscribe link" href="/profile">
                <div class="link__text">
                    Перейти в личный кабинет
                </div>

                <div class="link__btn"></div>
            </a>
        <? } else {
            ?>
            <a class="card__subscribe link" id="subscribe" href="#" data-id="<?= $user_id ?? '' ?>"
               data-oper="<?= !in_array($user_id, $arElements) ? 'subscribe' : 'unsubscribe' ?>">
                <div class="link__text">
                    <?= !in_array($user_id, $arElements) ? 'Подписаться на продавца' : 'Отписаться' ?>
                </div>

                <div class="link__btn"></div>
            </a>
        <? } ?>
        <ul class="card__statistics">
            <li class="card__statistic">
                29 октября, вчера
            </li>

            <li class="card__statistic card__statistic--img">
                60 (33 сегодня)
            </li>

            <li class="card__statistic">
                № <?= $id ?? '' ?>
            </li>
        </ul>
    </div>
</div>