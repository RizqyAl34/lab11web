<?php
session_start();

// include config & class
include "config.php";
include "class/database.php";
include "class/form.php";

// buat database object
$db = new Database();

// routing
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/artikel/index';
$segments = explode('/', trim($path, '/'));

$mod  = $segments[0] ?? 'artikel';
$page = $segments[1] ?? 'index';

$file = "module/{$mod}/{$page}.php";

// tampilan header
include "template/header.php";

// panggil file modul
if (file_exists($file)) {
    include $file;
} else {
    echo '<div class="alert alert-danger">Modul tidak ditemukan: '
         . htmlspecialchars($mod . '/' . $page)
         . '</div>';
}

// tampilan footer
include "template/footer.php";
?>
