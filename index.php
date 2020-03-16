<?php
require_once('helpers.php');
require_once('init.php');

$title = "Главная";

$main_page = include_template('main_page.php', []);

$layout = include_template('layout.php', [
        'content' => $main_page,
        'title' => $title
    ]
);

print($layout);


