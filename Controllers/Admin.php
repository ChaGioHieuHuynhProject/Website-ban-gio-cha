<?php class Admin extends Controller
{
    function Index() {
        header("Location:".Redirect("Admin", "DashBoard"));
    }
    function DashBoard() {
        $this->view("AdminLayout", [
            "page" => "DashBoard",
            "action" => "DashBoard"
        ]);
    }
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
    function Order($action = null, $id = null) {
        switch ($action) {
            case "Create": {
                }
            case "Update": {
                }
            case "Show": {
                
            }
            default: {
                $orderList = $this->model("OrderModel")->getOrderList("DESC");
                $this->view("AdminLayout", [
                    "page" => "Order",
                    "action" => "Order",
                    "orderList" => $orderList
                ]);
            }
        }
    }
}
