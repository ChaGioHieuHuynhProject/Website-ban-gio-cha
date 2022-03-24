<?php class ProductModel extends Model{
    function getProductList() {
        $results = $this->con->query("SELECT * FROM products");
        $productList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($productList, $row);
        }
        return $productList;
    }
    function getProduct($id) {
        $result = $this->con->query("SELECT * FROM products WHERE id={$id}");
        return $result->fetch_assoc();
    }
} 