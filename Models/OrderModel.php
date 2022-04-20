<?php
class OrderModel extends Model
{

    function getOrderList($order)
    {
        $results = $this->con->query("SELECT o.id, o.customerName, o.customerPhone, o.customerAddress, o.date, o.note, s.name as status, statusID FROM orders as o
        JOIN statuses as s ON o.statusID = s.id 
        ORDER BY o.date $order, o.statusID ASC");
        $orderList = [];
        while ($row = $results->fetch_assoc()){
            array_push($orderList, $row);
        }
        return $orderList;
    }
    function getOrderListByStatusId($statusId) {
        $results = $this->con->query("SELECT o.id, o.customerName, o.customerPhone, o.customerAddress, o.date, o.note, s.name as status, statusID FROM orders as o
        JOIN statuses as s ON o.statusID = s.id 
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
        $result = $this->con->query("SELECT orders.id as id, customerName, customerPhone, customerAddress, date, note, name as nameStatus, shipFee
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

    function updateStatus($id, $statusID)
    {
        $sql = "UPDATE orders SET statusID ='$statusID' WHERE id = $id";
        return $this->con->query($sql);
    }
    function updateShipFee($id, $fee)
    {
        $sql = "UPDATE orders SET shipFee = $fee WHERE id = $id";
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
    function getLatestOrderId()
    {
        return $this->con->query("SELECT max(id) AS id FROM orders")->fetch_assoc()["id"];
    }
    function countOrder() {
        return $this->con->query("SELECT count(*) AS count FROM orders")->fetch_assoc()["count"];
    }
    function countCustomer() {
        return $this->con->query("SELECT count(DISTINCT(customerPhone)) AS count FROM orders")->fetch_assoc()["count"];
    }
    function countGroupByStatus()
    {
        $results = $this->con->query("SELECT statusID, COUNT(statusID) as 'count'
            FROM orders
            GROUP BY statusID
            ");
        $statusList = [];
        while ($row = $results->fetch_assoc()) {
            $statusList += [$row["statusID"] => $row["count"]];
        }
        return $statusList;
    }
}
