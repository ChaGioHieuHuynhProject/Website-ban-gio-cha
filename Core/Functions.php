<?php 
    function Error() {
        require_once "error.php";
    }
    function Redirect($action, $controller) {
        return "/KyNguyen/MVC/$controller/$action";
    }
?>