<?php
    class OrderDetailModel extends Model{

        function getOrderDetailList(){
            $results = $this->con->query(
            "SELECT name, phoneNumber, address, email, products.name, quantity, price FROM customers 
                LEFT JOIN orders
                ON customers.id = orders.cusId
                LEFT JOIN orderDetails
                ON orders.id = orderDetails
                LEFT JOIN products
                ON orderDetails.productId = products.id 
                "
            );
            $orderDetailList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($orderDetailList, $row);
            }
            return $orderDetailList;
        }

        function getOrderDetailById($orderId)
        {
            $result = $this->con->query(
                "SELECT name, phoneNumber, address, email, products.name, quantity, price FROM customers 
                    LEFT JOIN orders
                    ON customers.id = orders.cusId
                    LEFT JOIN orderDetails
                    ON orders.id = orderDetails
                    LEFT JOIN products
                    ON orderDetails.productId = products.id
                    WHERE orders.id = {$orderId} 
                    "
            );
            return $result->fetch_assoc();
            
        }

        function addOrderDetail($orderId, $productId, $quantity, $massUnit){
            $sql = "INSERT INTO orderDetails (orderId, productId, quantity, massUnit) 
                VALUES('$orderId', '$productId', '$quantity', '$massUnit')";
            return $this->con->query($sql);
        }
        function countProduct($productId) {
        return $this->con->query("SELECT count(*) as count FROM orderDetails WHERE productId = $productId")->fetch_assoc()["count"];
        }

    }
?>