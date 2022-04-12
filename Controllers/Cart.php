<?php class Cart extends Controller {
    function Index() {
        $this->view("MainLayout", [
            "page" => "cart"
        ]);
    }
    function Add($id = null, $quantity = null) {
        if ($id == null || $quantity == null) {
            return header("Location: ".Redirect("Cart"));
        }

        $this->model("CartSession")->add(["id" => $id, "quantity" => $quantity]);
    }
    function Delete($index = null) {
        if ($index == null || empty($_SESSION[CART][$index])) {
            return header("Location: " . Redirect("Cart"));
        }
        $this->model("CartSession")->delete($index);
    }
    function Test() {
        $arr = [1 => 2, 3 => 4];
        $this->view("AdminLayout", [
            "page" => "test",
            "data" => array_splice($arr, 1, 1)
        ]);
    }
}