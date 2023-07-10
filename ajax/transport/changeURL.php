<?php
$filter = ['category' => $_GET['category'], 'mileage' => $_GET['mileage'], 'sort_time' => $_GET['sort_time'], 'sort_price' => $_GET['sort_price'], 'page_id' => $_GET['page_id']];
$res = http_build_query($filter);
print_r($res);