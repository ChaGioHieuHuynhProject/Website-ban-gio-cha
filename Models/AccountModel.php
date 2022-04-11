<?php class AccountModel extends Model
{
    function getAccountList()
    {
        $accList = [];
        $results = $this->con->query("SELECT * FROM accounts");
        if ($results) {
            while ($row = $results->fetch_assoc()) {
                array_push($accList, $row);
            }
        }
        return $accList;
    }
    function getAccountById($id)
    {
        $result = $this->con->query("SELECT * FROM accounts WHERE cusId = $id");
        if ($result) return $result->fetch_assoc();
        return null;
    }
    function getAccountByPhoneNumber($phoneNumber)
    {
        $result = $this->con->query("SELECT cus.Id as id, cus.phoneNumber as phoneNumber, acc.password as password FROM customers as cus JOIN accounts as acc on cus.id = acc.cusId  WHERE phoneNumber = $phoneNumber");
        if ($result) return $result->fetch_assoc();
        return null;
    }
    function isExistedAccount($phoneNumber)
    {
        if (is_null($this->getAccountByPhoneNumber($phoneNumber))) {
            return false;
        };
        return true;
    }
    function addNewAccount($id, $password)
    {
        return $this->con->query("INSERT INTO accounts VALUES ('$password', $id)");
    }
}
