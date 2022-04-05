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
        $result = $this->con->query("SELECT * FROM products WHERE id=$id");
        return $result->fetch_assoc();
    }

    function addProducts($proId, $name, $price, $ingredients,$description,$usageGuide,$massUnitId){
        $sql = "INSERT INTO products (proId, name, price, ingredients, description, usageGuide, massUnitId) 
        VALUES('$proId', '$name', '$price', '$ingredients', '$description', '$usageGuide', '$massUnitId')";
        return $this->con->query($sql);
    }

    function updateProducts($id, $name, $price, $ingredients,$description,$usageGuide,$massUnitId){
        $sql = "UPDATE products SET name ='$name', ingredients ='$price', shipFee ='$ingredients', description ='$description', usageGuide ='$usageGuide',massUnitId = '$massUnitId' WHERE id ={$id}";
        return $this->con->query($sql);
    }

    function deleteProducts($id){
        $sql = "DELETE FROM prorducts WHERE id ={$id}";
        return $this->con->query($sql);
    }
} 