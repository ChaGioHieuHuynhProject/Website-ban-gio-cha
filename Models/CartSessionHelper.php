<?php class CartSessionHelper
{
    function add($data)
    {
        if (empty($_SESSION[CART])) {
            $_SESSION[CART] = [];
        }
        array_push($_SESSION[CART], $data);
    }
    function delete($index)
    {
        array_splice($_SESSION[CART], $index, 1);
    }
    function update($data) {
        $_SESSION[CART][$data["index"]] = $data["quantity"];
    }
    function hasProduct($id) {
        foreach($_SESSION[CART] as $product) {
            if ($product["id"] == $id) {
                return true;
            }
        }
        return false;
    }
}
