<?php
    class OrderModel extends Model{

        function getOrderList(){
            $results = $this->con->query("SELECT * FROM orders");
            $orderList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($orderList, $row);
            }
            return $orderList;
        }

        function getOrderById($id){
            $result = $this->con->query("SELECT * FROM orders WHERE id ={$id}");
            return $result->fetch_assoc();
        }

        function addOrder($cusId, $date, $statusID, $shipFee){
            $sql = "INSERT INTO orders (cusId, date, statusID, shipFee) 
            VALUES('$cusId', '$date', '$statusID', '$shipFee')";
            return $this->con->query($sql);
        }

        function updateOrder($id, $cusId, $date, $statusID, $shipFee){
            $sql = "UPDATE orders SET cusId = '$cusId', date ='$date', statusID ='$statusID', shipFee ='$shipFee' WHERE id ={$id}";
            return $this->con->query($sql);
        }

        function deleteOrder($id){
            $sql = "DELETE FROM orders WHERE id ={$id}";
            return $this->con->query($sql);
        }

        function countOrders(){
            $result = $this->con->query("SELECT COUNT(id) as 'count' FROM orders");
            return $result->fetch_assoc()["count"];
        }

        function countOrdersMoreThanFiveTimes(){
            $results = $this->con->query(
            "SELECT name, phoneNumber, address, email, count(id) as 'count' FROM customers 
            LEFT JOIN orders
            ON customers.id = orders.cusId
            GROUP BY orders.cusId
            HAVING 'count' >= 5
            ");
            $orderList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($orderList, $row);
            }
            return $orderList;
        }
    }
?>