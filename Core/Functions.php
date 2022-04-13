<?php 
    define("ROOT_URL", "http://localhost:8080/Website-ban-gio-cha/");
    function Error() {
        require_once "error.php";
    }
    function Redirect($action, $controller) {
        return "/Website-ban-gio-cha/$controller/$action";
    }
