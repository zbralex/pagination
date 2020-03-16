<?php

require_once('init.php');
require_once('helpers.php');


$title = '⚡️ Детальная страница товара';
$id = $_GET['id'];
if ($_GET['id']) {
    $sqlDetail = 'SELECT * FROM pagination_example.detail_goods d
                    JOIN pagination_example.goods g
                    WHERE d.good_id = g.id AND d.good_id = ' . $id;
    $result = mysqli_query($con, $sqlDetail);
    $detail = mysqli_fetch_all($result, MYSQLI_ASSOC);


    // view *********

    $page_content = include_template('item_detail.php', [
        'id' => $id,
        'detail' => $detail[0]
    ]);
    $layout = include_template('layout.php', [
        'content' => $page_content,
        'title' => $title
    ]);
    print($layout);
}
