<?php class Admin extends Controller {
    function Product($action = null, $id=null) {
        switch ($action) {
            case "create" : {

            }
            case "delete": {
                $this->con->query("DELETE FROM products where id=$id");
            }
        }
    }
}