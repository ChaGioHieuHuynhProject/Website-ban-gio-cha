<?php class CustomerModel extends Model {
    function getCustomerById($id) {
        return $this->con->query("SELECT * FROM customers WHERE id = $id")->fetch_assoc();
    }
    function addNewCustomer($id, $name, $phoneNumber, $address, $email) {
        return $this->con->query("INSERT INTO customers VALUES($id, '$name', '$phoneNumber', '$address', '$email')");
    }
}