<?php class ProductModel extends Model
{
    function getProductList()
    {
        $results = $this->con->query("SELECT * FROM products WHERE isDeleted = false");
        $productList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($productList, $row);
        }
        return $productList;
    }
    function get3Products()
    {
        $results = $this->con->query("SELECT * FROM products LIMIT 3");
        $productList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($productList, $row);
        }
        return $productList;
    }
    function getProductById($id)
    {
        $result = $this->con->query("SELECT * FROM products WHERE id=$id");
        return $result ? $result->fetch_assoc() : null;
    }

    function addProduct($name, $price, $img, $ingredients, $description, $usageGuide)
    {
        $sql = "INSERT INTO products (name, price, img, ingredients, description, usageGuide) 
        VALUES('$name', '$price', '$img', '$ingredients', '$description', '$usageGuide')";
        return $this->con->query($sql);
    }

    function updateProduct($id, $name, $price, $img, $ingredients, $description, $usageGuide)
    {
        $sql = "UPDATE products SET name ='$name', price ='$price', img = '$img', ingredients ='$ingredients', description ='$description', usageGuide ='$usageGuide' WHERE id = $id";
        return $this->con->query($sql);
    }
    function disableProduct($id) {
        return $this->con->query("UPDATE products SET isDeleted = 1 WHERE id = $id");
    }
    function deleteProduct($id)
    {
        return $this->con->query("DELETE FROM products WHERE id = $id");
    }
}
