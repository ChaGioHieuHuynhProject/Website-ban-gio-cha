<?php
class OrderModel extends Model
{

    function getOrderList($order)
    {
        $results = $this->con->query("SELECT o.id, o.customerName, o.customerPhone, o.customerAddress, o.date, o.note, s.name as status, statusID FROM orders as o
                                            JOIN statuses as s ON o.statusId = s.id 
                                            ORDER BY o.date $order, o.statusId ASC");
        $orderList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($orderList, $row);
        }
        return $orderList;
    }
    function getOrderListByStatusId($statusId) {
        $results = $this->con->query("SELECT o.id, o.customerName, o.customerPhone, o.customerAddress, o.date, o.note, s.name as status, o.statusID FROM orders as o
                                            JOIN statuses as s ON o.statusId = s.id 
                                            WHERE s.id = $statusId
                                            ORDER BY o.date DESC"
                                            );
        $orderList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($orderList, $row);
        }
        return $orderList;
    }
    function getOrderById($id)
    {
        $result = $this->con->query("SELECT orders.id as id, customerName, customerPhone, customerAddress, date, note, name as nameStatus
        FROM orders 
        LEFT JOIN statuses
        ON orders.statusID = statuses.id
        WHERE orders.id = {$id}");
        return $result->fetch_assoc();
    }

    function getOrderListByCustomerPhone($phone)
    {
        $results = $this->con->query("SELECT * FROM orders WHERE customerPhone = $phone");
        $orderList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($orderList, $row);
        }
        return $orderList;
    }

    function addOrder($customerName, $customerPhone, $customerAddress, $note)
    {
        $dateNow = date_create("now", new DateTimeZone("Asia/Ho_Chi_Minh"));
        $date = $dateNow->format("Y-m-d H:i:s");
        $sql = "INSERT INTO orders (customerName, customerPhone, customerAddress, date, note, statusID) 
            VALUES('$customerName', '$customerPhone', '$customerAddress', '$date', '$note', 0)";
        return $this->con->query($sql);
    }

    function updateOrder($id, $statusID)
    {
        $sql = "UPDATE orders SET statusID ='$statusID' WHERE id = $id";
        return $this->con->query($sql);
    }

    function deleteOrder($id)
    {
        $sql = "DELETE FROM orders WHERE id ={$id}";
        return $this->con->query($sql);
    }

    function countOrders()
    {
        $result = $this->con->query("SELECT COUNT(id) as count FROM orders");
        return $result->fetch_assoc()["count"];
    }

    function countOrdersMoreThanFiveTimes()
    {
        $results = $this->con->query(
            "SELECT name, phoneNumber, address, email, count(id) as count FROM customers 
            LEFT JOIN orders
            ON customers.id = orders.cusId
            GROUP BY orders.cusId
            HAVING 'count' >= 5
            "
        );
        $orderList = [];
        while ($row = $results->fetch_assoc()) {
            array_push($orderList, $row);
        }
        return $orderList;
    }
    function getLatestOrderId()
    {
        return $this->con->query("SELECT max(id) AS id FROM orders")->fetch_assoc()["id"];
    }
}
