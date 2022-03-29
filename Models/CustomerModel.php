<?php class CustomerModel extends Model {
    function addNewCustomer($id, $name, $phoneNumber, $address, $email) {
        return $this->con->query("INSERT INTO customers VALUES($id, '$name', '$phoneNumber', '$address', '$email')");
    }
}