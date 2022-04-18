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
    function Logout()
    {
        $_SESSION[ADMIN_LOGIN] = null;
        return header("Location:" . Redirect("Admin", "Login"));
    }
    function DashBoard()
    {
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }
        $this->view("AdminLayout", [
            "page" => "DashBoard",
            "action" => "DashBoard"
        ]);
    }
    function Product($action = null, $id = null)
    {
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }
        switch ($action) {
            case "Create": {
                $error = "";
                if (isset($_POST["save"])) {
                    $name = $_POST["name"];
                    $price = $_POST["price"];
                    $ingredients = $_POST["ingredients"];
                    $description = $_POST["description"];
                    $usageGuide = $_POST["usageGuide"];

                    $img_name = $_FILES['img']['name'];
                    $file_tmp = $_FILES['img']['tmp_name'];
                    $file_ext = strtolower(end(explode('.', $img_name)));

                    $extensions = array("jpeg", "jpg", "png");

                    if (!in_array($file_ext, $extensions)) {
                        $error = "File không hợp lệ! File nên có đuôi là JPEG, JPG hoặc PNG.";
                    }
                    if (empty($error)) {
                        try {
                            move_uploaded_file($file_tmp, "Assets/img/" . $img_name);
                            $this->model("ProductModel")->addProduct($name, $price, $img_name, $ingredients, $description, $usageGuide);
                            return header("Location:" . Redirect("Admin", "Product"));
                        } catch (Exception) {
                            $error = "Có lỗi xảy ra!";
                        }
                    }
                }
                return $this->view("AdminLayout", [
                    "page" => "ProductForm",
                    "action" => "Product",
                    "error" => $error
                ]);
            }
            case "Delete": {
                if (empty($_POST)) {
                    return header("Location:" . Redirect("Admin", "Product"));
                }
                $id = $_POST["id"];
                $productModel = $this->model("ProductModel");
                if (($product = $productModel->getProductById($id)) == null) {
                    return header("Location:" . Redirect("Admin", "Product"));
                }
                if ($this->model("OrderDetailModel")->countProduct($id) == 0) {
                    unlink("Assets/img/{$product["img"]}");
                    $productModel->deleteProduct($id);
                }
                else {
                    $productModel->disableProduct($id);
                }
                return header("Location:" . Redirect("Admin", "Product"));
            }
            case "Update": {
                if ($id == null) {
                    return header("Location:" . Redirect("Admin", "Product"));
                }

                $product = $this->model("ProductModel")->getProductByid($id);
                if ($product == null) {
                    return header("Location:" . Redirect("Admin", "Product"));
                }

                $error = "";
                if (isset($_POST["save"])) {
                    $name = $_POST["name"];
                    $price = $_POST["price"];
                    $ingredients = $_POST["ingredients"];
                    $description = $_POST["description"];
                    $usageGuide = $_POST["usageGuide"];

                    if (empty($_FILES["img"]["name"])) {
                        $img_name = $_POST["old-img"];
                    } 
                    else {
                        $img_name = $_FILES['img']['name'];
                        $file_tmp = $_FILES['img']['tmp_name'];
                        $tempArr = explode('.', $img_name);
                        $file_ext = strtolower(end($tempArr));

                        $extensions = array("jpeg", "jpg", "png");

                        if (!in_array($file_ext, $extensions)) {
                            $error = "File không hợp lệ! File nên có đuôi là JPEG, JPG hoặc PNG.";
                        }
                        else {
                            move_uploaded_file($file_tmp, "./Assets/img/" . $img_name);
                        }
                    }
                    if (empty($error)) {
                        try {
                            $this->model("ProductModel")->updateProduct($id, $name, $price, $img_name, $ingredients, $description, $usageGuide);
                            return header("Location:" . Redirect("Admin", "Product"));
                        } catch (Exception) {
                            $error = "Có lỗi xảy ra!";
                        }
                    }
                }
                return $this->view("AdminLayout", [
                    "page" => "ProductForm",
                    "action" => "Product",
                    "error" => $error,
                    "product" => $product
                ]);
            }
            default: {
                    $productList = $this->model("ProductModel")->getProductList();
                    $this->view("AdminLayout", [
                        "page" => "Product",
                        "action" => "Product",
                        "productList" => $productList
                    ]);
                }
        }
    }
    function Order($action = null, $id = null)
    {
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }
        switch ($action) {
            case "Create": {
                }
            case "Update": {
                }
            case "Show": {
                }
            default: {
                $statusList = $this->model("StatusModel")->getStatusList();
                if (isset($_POST["filter-order-status"]) && $_POST["filter-order-status"] != '') {
                    $orderList = $this->model("OrderModel")->getOrderListByStatusId($_POST["filter-order-status"]);
                } else {
                    $orderList = $this->model("OrderModel")->getOrderList("DESC");
                }
                return $this->view("AdminLayout", [
                    "page" => "Order",
                    "action" => "Order",
                    "orderList" => $orderList,
                    "statusList" => $statusList
                ]);
            }
        }
    }

    function updateStatus($orderId, $statusID){
        $orderModel = $this->model("OrderModel");
        $orderModel->updateOrder($orderId, $statusID);
        header("Location:http://localhost:8080/Website-ban-gio-cha/Admin/order");
    }

    function status1($orderId){
        $this->updateStatus($orderId, 1);
    }

    function status2($orderId)
    {
        $this->updateStatus($orderId, 2);
    }

    function status3($orderId)
    {
        $this->updateStatus($orderId, 3);
    }

    function orderDetail($orderId){
        $orderModel = $this->model("OrderModel");
        $order = $orderModel->getOrderById($orderId);
        $orderDetailModel = $this->model("OrderDetailModel");
        $orderDetail = $orderDetailModel->getOrderDetailById($orderId);
        $this->view("AdminLayout", [
            "page" => "OrderDetail",
            "action" => "Order",
            "order" => $order,
            "orderDetail" => $orderDetail
        ]);
    }

    function Contact($action = null, $id = null)
    {
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }
        switch ($action) {
            default: {
                $this->view("AdminLayout", [
                    "page" => "Contact",
                    "action" => "Contact"
                ]);
            }
        }
    }
    function QAA($action = null, $id = null)
    {
    }
    function MassUnit($action = null, $id = null) {
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }
        switch ($action) {
            case "Create" : {

            }
            default : {
                return $this->view("AdminLayout", [
                    "page" => "MassUnit",
                    "action" => "MassUnit",
                ]);
            }
        }
    }
    private function isAdminLogedIn()
    {
        return $_SESSION[ADMIN_LOGIN] != null;
    }
    function test()
    {
        $this->view("AdminLayout", [
            "page" => "test",
            "action" => "test",
            "id" => $_GET["id"]
        ]);
    }
}
