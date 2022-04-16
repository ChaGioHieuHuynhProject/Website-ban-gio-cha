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
            Error();
            return;
        }
        $product = $this->model("ProductModel")->getProductById($id);
        $this->view("MainLayout", [
            "page" => "Detail",
            "product" => $product
        ]);
    }
}