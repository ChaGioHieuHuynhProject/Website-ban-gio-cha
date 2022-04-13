<?php class Cart extends Controller {
    function Index() {
        $detailList = [];
        $productModel = $this->model("ProductModel");
        if (empty($_SESSION[CART])) {
            return $this->view("MainLayout", [
                "page" => "Cart"
            ]);
        }
        foreach($_SESSION[CART] as $detail) {
            $product = $productModel->getProductById($detail["id"]);
            array_push($detailList, ["productInfo" => $product, "quantity" => $detail["quantity"]]);
        }
        $this->view("MainLayout", [
            "page" => "Cart",
            "detailList" => $detailList
        ]);
    }
    function Add($id = null, $quantity = null) {
        if ($id == null || $quantity == null) {
            return header("Location:".Redirect("Cart"));
        }
        $cartModel = $this->model("CartSessionHelper");
        if ($cartModel->hasProduct($id)) {
            return header("Location:".Redirect("Cart"));
        }
        $cartModel->add(["id" => $id, "quantity" => $quantity]);
        return header("Location:" . Redirect("Cart"));
    }
    function Update() {
        if (!isset($_POST)) {
            return header("Loaction:".Redirect("Cart"));
        }
        $this->model("CartSessionHelper")->update(["index" => $_POST["index"], "quantity" => $_POST["quantity"]]);
    }
    function Delete($index) {
        $this->model("CartSessionHelper")->delete($index);
        return header("Location:" . Redirect("Cart"));
    }
    function test() {
        session_destroy();
        $this->view("MainLayout", [
            "page" => "test"
        ]);
    }
}