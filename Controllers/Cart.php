<?php class Cart extends Controller
{
    function Index()
    {
        if (empty($_SESSION[CART])) {
            return $this->view("MainLayout", [
                "page" => "Cart"
            ]);
        }
        $detailList = [];
        $productModel = $this->model("ProductModel");
        $massUnitModel = $this->model("MassUnitModel");
        foreach ($_SESSION[CART] as $detail) {
            $product = $productModel->getProductById($detail["id"]);
            $price = $massUnitModel->getFactor($detail["id"], $detail["massUnit"]) * $product["price"];
            array_push($detailList, ["productInfo" => $product, "quantity" => $detail["quantity"], "massUnit" => $detail["massUnit"], "price" => $price]);
        }
        $this->view("MainLayout", [
            "page" => "Cart",
            "detailList" => $detailList
        ]);
    }
    function Add($id = null, $quantity = null, $massUnit = null)
    {
        if ($id == null || $quantity == null || $massUnit == null) {
            return header("Location:" . Redirect("Cart"));
        }
        $cartModel = $this->model("CartSessionHelper");
        if (empty($this->model("ProductModel")->getProductById($id)) || $cartModel->hasProduct($id)) {
            return header("Location:" . Redirect("Cart"));
        }
        $massUnitList = array_map(fn ($value) => $value["name"], $this->model("MassUnitModel")->getMassUnitListByProductId($id));
        if ($massUnit != null & !in_array($massUnit, $massUnitList)) {
            $massUnit = $massUnitList[0];
        }
        $cartModel->add(["id" => $id, "quantity" => $quantity, "massUnit" => $massUnit]);
        return header("Location:" . Redirect("Cart"));
    }
    function Update()
    {
        if (empty($_POST)) {
            return header("Location:" . Redirect("Cart"));
        }
        $this->model("CartSessionHelper")->update(["index" => $_POST["index"], "quantity" => $_POST["quantity"]]);
    }
    function Delete($index)
    {
        $this->model("CartSessionHelper")->delete($index);
        return header("Location:" . Redirect("Cart"));
    }
    function Confirm()
    {
        if (empty($_POST)) {
            return header("Location:" . Redirect("Cart"));
        }
        $orderModel = $this->model("OrderModel");
        $orderDetailModel = $this->model("OrderDetailModel");
        $orderModel->addOrder($_POST["customerName"], $_POST["phoneNumber"], $_POST["customerAddress"], $_POST["note"]);
        $orderId = $orderModel->getLatestOrderId();
        foreach ($_SESSION[CART] as $detail) {
            $orderDetailModel->addOrderDetail($orderId, $detail["id"], $detail["quantity"], $detail["massUnit"]);
        }
        $_SESSION[CART] = null;
    }
    function test()
    {
        // session_destroy();
        // $detailList = [];
        // $productModel = $this->model("ProductModel");
        // $massUnitModel = $this->model("MassUnitModel");
        // foreach ($_SESSION[CART] as $detail) {
        //     $product = $productModel->getProductById($detail["id"]);
        //     $price = $detail["massUnit"] != null ? $massUnitModel->getFactor($detail["id"], $detail["massUnit"]) * $product["price"] : $product["price"];
        //     array_push($detailList, ["productInfo" => $product, "quantity" => $detail["quantity"], "massUnit" => $detail["massUnit"], "price" => $price]);
        // }
        // $massUnitList = array_map(fn ($value) => $value["name"], $this->model("MassUnitModel")->getMassUnitListByProductId(1));

        $this->view("MainLayout", [
            "page" => "test",
            "list" => $_SESSION[CART]
        ]);
    }
}