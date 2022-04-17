<?php class Cart extends Controller {
    function Index() {
        $this->view("MainLayout", [
            "page" => "cart"
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
    }
    function Update() {
        if (!isset($_POST)) {
            return header("Loaction:".Redirect("Cart"));
        }
        $this->model("CartSessionHelper")->update(["index" => $_POST["ixdex"], "quantity" => $_POST["quantity"]]);
    }
}