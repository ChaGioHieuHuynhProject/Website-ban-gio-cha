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
            $results = $this->con->query(
            "SELECT productId, massUnit, products.name as productsName, orderdetails.quantity as quantity, products.price as price, (orderdetails.quantity * products.price) as total  
                FROM orderdetails 
                LEFT JOIN products
                ON orderdetails.productId = products.id
                WHERE orderdetails.orderId = {$orderId}"
            );
            $orderDetailList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($orderDetailList, $row);
            }
            return $orderDetailList;
            
        }

        function addOrderDetail($orderId, $productId, $quantity, $massUnit){
            $sql = "INSERT INTO orderDetails (orderId, productId, quantity, massUnit) 
                VALUES('$orderId', '$productId', '$quantity', '$massUnit')";
            return $this->con->query($sql);
        }
        function countProduct($productId) {
            return $this->con->query("SELECT count(*) as count FROM orderDetails WHERE productId = $productId")->fetch_assoc()["count"];
        }
        function bestSeller()
        {
            return $this->con->query("SELECT count(od.productId) AS count, od.productId, name
                FROM orderdetails AS od 
                JOIN products AS p ON od.productId = p.id
                GROUP BY productId ORDER BY count DESC LIMIT 1")->fetch_assoc();
        }
    }
?>