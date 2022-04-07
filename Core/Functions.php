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
?>