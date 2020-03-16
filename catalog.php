<?php
require_once ('init.php');
require_once ('helpers.php');

if ($con) {
    if (isset($_GET['page'])) {
        $title = 'Каталога товаров';
        $sql = 'SELECT id, name FROM pagination_example.goods';
        $result = mysqli_query($con, $sql);

        if ($result) {
            $goods = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        // текущая страница
        $cur_page = $_GET['page'] ?? 1;

        // количество записей на странице
        $page_items = 4;

        // получаем общее количество записей
        $result = mysqli_query($con, "SELECT COUNT(*) as cnt FROM pagination_example.goods");

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







        if ($goods = mysqli_query($con, $sql)) {
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




        $page_content = include_template('main.php',
            [
                'items' => $goods,
                'pagination' => $pagination
            ]
        );



        $layout = include_template('layout.php',
            [
                'content' => $page_content,
                'title' => $title
            ]
        );

        print($layout);
    }


}

