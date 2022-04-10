<?php
define("ROOT_URL", "http://localhost/KyNguyen/Website-ban-gio-cha/");
function Error()
{
    require_once "error.php";
}
function Redirect($controller, $action = "")
{
    return "/KyNguyen/Website-ban-gio-cha/$controller/$action";
}
function RenderCSS($cssFileName)
{
    echo "<link rel='stylesheet' href='" . ROOT_URL . "Assets/css/$cssFileName.css' type='text/css'>\n";
}
function RenderJs($jsFileName)
{
    echo "<script src='" . ROOT_URL . "Assets/js/$jsFileName.js'></script>\n";
}
function ImageLink($imgFileName) {
    return ROOT_URL."Assets/img/$imgFileName";
}
