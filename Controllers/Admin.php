<?php class Admin extends Controller
{
    function Index()
    {
        header("Location:" . Redirect("Admin", "DashBoard"));
    }
    function Login()
    {
        if (!isset($_POST["login"])) {
            return $this->view("EmptyLayout", [
                "page" => "Login"
            ]);
        }
        $adminModel = $this->model("AdminModel");
        $admin = $adminModel->getAdmin($_POST["email"]);
        if (!is_null($admin)) {
            $pepper = $_ENV["pepper"];
            $pwd = $_POST["password"];
            $pepperedPwd = hash_hmac('sha256', $pwd, $pepper);
            if (password_verify($pepperedPwd, $admin['password'])) {
                // session_start();
                $_SESSION[ADMIN_LOGIN] = ["admin" => $admin["email"]];
                return header("Location:" . Redirect("Admin"));
            }
            $message = "Sai mật khẩu! Vui lòng thử lại!";
        } else {
            $message = "Bạn không phải là admin!";
        }
        return $this->view("EmptyLayout", [
            "page" => "Login",
            "loginMessage" => $message
        ]);
    }
    function Logout() {
        $_SESSION[ADMIN_LOGIN] = null;
        return header("Location:".Redirect("Admin", "Login"));
    }
    function DashBoard()
    {
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
                    $this->view("AdminLayout", [
                        "page" => "Product"
                    ]);
                }
        }
    }
    function Order($action = null, $id = null)
    {
        switch ($action) {
            case "Create": {
                }
            case "Update": {
                }
            case "Show": {
                }
            default: {
                    $orderList = $this->model("OrderModel")->getOrderList("DESC");
                    $statusList = $this->model("StatusModel")->getStatusList();
                    $this->view("AdminLayout", [
                        "page" => "Order",
                        "action" => "Order",
                        "orderList" => $orderList,
                        "statusList" => $statusList
                    ]);
                }
        }
    }
    function Contact($action = null, $id = null)
    {
        switch ($action) {
            default: {
                $this->view("AdminLayout", [
                    "page" => "Contact"
                ]);
            }
        }
    }
    function test() {
        $pwd = "admin";
        $pwdPeppered = hash_hmac("sha256", $pwd, $_ENV["pepper"]);
        $pwdHashed = password_hash($pwdPeppered, PASSWORD_DEFAULT);
        $this->view("AdminLayout", [
            "page" => "test",
            "action"=> "test",
            "pwd" => $pwdHashed
        ]);
    }
}
?>