<?php
    class OrderDetail extends Model{

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

        function getOrderDetailById($id)
        {
            $result = $this->con->query(
                "SELECT name, phoneNumber, address, email, products.name, quantity, price FROM customers 
                    LEFT JOIN orders
                    ON customers.id = orders.cusId
                    LEFT JOIN orderDetails
                    ON orders.id = orderDetails
                    LEFT JOIN products
                    ON orderDetails.productId = products.id
                    WHERE orders.id = {$id} 
                    "
            );
            return $result->fetch_assoc();
            
        }

        function addOrderDetail($orderId, $productId, $quantity){
            $sql = "INSERT INTO orderDetails (orderId, productId, quantity) 
                VALUES('$orderId', '$productId', '$quantity')";
            return $this->con->query($sql);
        }

    }
?>