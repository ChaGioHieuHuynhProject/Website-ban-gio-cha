<?php class AccountModel extends Model {
    function getAccountList() {
        $accList = [];
        $results = $this->con->query("SELECT * FROM accounts");
        if ($results) {
            while ($row = $results->fetch_assoc()) {
                array_push($accList, $row);
            }
        }
        return $accList;
    }
    function getAccountById($id) {
        $result = $this->con->query("SELECT * FROM accounts WHERE id = $id");
        if ($result) return $result->fetch_assoc();
        return null;
    }
    function getAccountByUserName($username) {
        $result = $this->con->query("SELECT * FROM accounts WHERE id = $username");
        if ($result) return $result->fetch_assoc();
        return null;
    }
    function isExistedAccount($username) {
        if (is_null($this->getAccountByUserName($username))) {
            return false;
        };
        return true;
    }
    
}