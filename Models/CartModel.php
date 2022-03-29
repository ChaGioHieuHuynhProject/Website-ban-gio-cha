<?php 
    class CartModel extends Model {
        
        function getCartListByCustomerId($customerId){
            $results = $this->con->query(
                "SELECT link, name, price
                FROM carts
                LEFT JOIN products
                ON carts.productId = products.id
                LEFT JOIN imgs
                ON products.id = imgs.productId
                LEFT JOIN customers
                ON carts.cusId = customers.id
                WHERE customers.id = {$customerId}
            ");
            $cartList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($cartList, $row);
            }
            return $cartList;
        }

        function addCart($cusId, $productId, $quantity){
            $sql = "INSERT INTO carts (cusId, productId, quantity) 
            VALUES('$cusId', '$productId', '$quantity')";
            return $this->con->query($sql);
        }

        function updateCart($id, $quantity){
            $sql = "UPDATE carts SET quantity = '$quantity' WHERE id ={$id}";
            return $this->con->query($sql);
        }

        function deleteCart($id){
            $sql = "DELETE FROM carts WHERE id ={$id}";
            return $this->con->query($sql);
        }
    }
?>
