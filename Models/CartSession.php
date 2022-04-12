<?php class CartSession {
    function add($data) {
        if (empty($_SESSION[CART])) {
            $_SESSION[CART] = [];
        }
        array_push($_SESSION[CART], $data);
    }
    function delete($index) {
        array_splice($_SESSION[CART], $index, 1);
    }
}