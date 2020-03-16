<?php
require_once('init.php');
require_once('helpers.php');


$where = '';
$orderBy = ' ORDER BY id';
if ($_GET['q']) {

    $search = trim($_GET['q']) ?? '';

    if (strlen($search)) {

        $where = ' WHERE symbol_code LIKE ? OR name LIKE ?';

        $search = '%' . $search . '%';

        $sql = "SELECT id, name FROM pagination_example.goods"
            . $where
            . $orderBy;

        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $search, $search);
        mysqli_stmt_execute($stmt);

        if ($goods = mysqli_stmt_get_result($stmt)) {
            $goods = mysqli_fetch_all($goods, MYSQLI_ASSOC);
        }

        $page_content = include_template('main.php',
            [
                'items' => $goods
            ]
        );
        $layout = include_template('layout.php', [
                'content' => $page_content,
                'title' => ''
            ]
        );

        print ($layout);
    }


} else {
    $sql = 'SELECT id, name FROM pagination_example.goods '
        . $orderBy;
    $result = mysqli_query($con, $sql);
    if ($result) {
        $goods = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    $page_content = include_template('main.php',
        [
            'items' => $goods
        ]
    );
    $layout = include_template('layout.php', [
            'content' => $page_content,
            'title' => ''
        ]
    );
    print ($layout);
}

