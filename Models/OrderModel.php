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

        function getOrderListByCustomerPhone($phone){
            $results = $this->con->query("SELECT * FROM orders WHERE customerPhone = $phone");
            $orderList = [];
            while ($row = $results->fetch_assoc()) {
                array_push($orderList, $row);
            }
            return $orderList;
        }

        function addOrder($customerName, $customerPhone, $note){
            $dateNow = date_create("now");
            $date = $dateNow->format("Y-m-d H:i:s");
            $sql = "INSERT INTO orders (customerName, customerPhone, date, note, statusID) 
            VALUES('$customerName', '$customerPhone' , '$date', '$note', 0)";
            return $this->con->query($sql);
        }

        function updateOrder($id, $date, $statusID, $shipFee){
            $sql = "UPDATE orders SET date ='$date', statusID ='$statusID', shipFee = $shipFee WHERE id = $id";
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
        function getLatestOrderId() {
            return $this->con->query("SELECT id FROM orders HAVING id = max(id)")->fetch_assoc()["id"];
        }
    }
