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
    function getAccount($id) {
        $result = $this->con->query("SELECT * FROM accounts WHERE id = $id");
        if ($result) return $result->fetch_assoc();
        return null;
    }
    function isAnAccount() {
        
    }
    
}