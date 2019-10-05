<?php

// kumpulan fungsi-fungsi yang sering digunakan
function base_url()
{
    $url = sprintf("%s://%s%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI']);
    return $url;
}
