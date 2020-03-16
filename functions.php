<?php
function pagination($connection, $sql) {
    // текущая страница
    $cur_page = $_GET['page'] ?? 1;

    // количество записей на странице
    $page_items = 4;

    // получаем общее количество записей
    $result = mysqli_query($connection, "SELECT COUNT(*) as cnt FROM pagination_example.goods");

    // количество записей на странице
    $items_count = mysqli_fetch_assoc($result)['cnt'];

    // делим количество записей в базе на количество записей на странице
    $pages_count = ceil($items_count / $page_items);

    // шаг
    $offset = ($cur_page - 1) * $page_items;

    // коли
    $pages = range(1, $pages_count);


    $sql = 'SELECT * FROM pagination_example.goods '
        . 'ORDER BY id ASC LIMIT '
        . $page_items . ' OFFSET ' . $offset;
    if ($goods = mysqli_query($connection, $sql)) {
        $tpl_data = [
            'goods' => $goods,
            'pages' => $pages,
            'pages_count' => $pages_count,
            'cur_page' => $cur_page
        ];

        $content = include_template('main.php', $tpl_data);
    }
    if ($goods = mysqli_query($connection, $sql)) {
        $tpl_data = [
            'goods' => $goods,
            'pages' => $pages,
            'pages_count' => $pages_count,
            'cur_page' => $cur_page
        ];

        $content = include_template('main.php', $tpl_data);
    }
    $pagination = include_template('_pagination.php', [
        'pages' => $pages,
        'pages_count' => $pages_count,
        'cur_page' => $cur_page
    ]);

}
