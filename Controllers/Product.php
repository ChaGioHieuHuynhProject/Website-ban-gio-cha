<?php class Product extends Controller {
    function Index(){
        $productList = $this->model("ProductModel")->getProductList();
        $this->view("MainLayout", [
            "page" => "Product",
            "productList" => $productList
        ]);
    }
    function Detail($id=null) {
        if (is_null($id)) {
            return Error();
        }
        $product = $this->model("ProductModel")->getProductById($id);
        $masUnitList = $this->model("MassUnitModel")->getMassUnitListByProductId($id);
        $product["price"] = $product["price"];
        $this->view("MainLayout", [
            "page" => "Detail",
            "product" => $product,
            "massUnitList" => $masUnitList
        ]);
    }
}