<?php
$con = mysqli_connect("localhost", "newuser", "!MyNewPass1", "pagination_example");



if (!$con) {
    print("Ошибка подключения: " . mysqli_connect_error());
    header("HTTP/1.0 500 Internal Server Error");
    die;
}
