<?php class Admin extends Controller
{
    function Product($action = null, $id = null)
    {
        switch ($action) {
            case "Create": {
                }
            case "Delete": {
                    $this->con->query("DELETE FROM products where id=$id");
                }
            case "Update": {
                }
            default: {
                }
        }
    }
}
