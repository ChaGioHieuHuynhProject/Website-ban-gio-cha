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

    function addProduct($name, $price, $ingredients,$description,$usageGuide,$massUnitId){
        $sql = "INSERT INTO products (name, price, ingredients, description, usageGuide, massUnitId) 
        VALUES('$name', '$price', '$ingredients', '$description', '$usageGuide', '$massUnitId')";
        return $this->con->query($sql);
    }

    function updateProduct($id, $name, $price, $ingredients,$description,$usageGuide,$massUnitId){
        $sql = "UPDATE products SET name ='$name', ingredients ='$price', shipFee ='$ingredients', description ='$description', usageGuide ='$usageGuide',massUnitId = '$massUnitId' WHERE id ={$id}";
        return $this->con->query($sql);
    }

    function deleteProduct($id){
        $sql = "DELETE FROM prorducts WHERE id ={$id}";
        return $this->con->query($sql);
    }
} 
