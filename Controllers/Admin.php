<?php
class Admin extends Controller
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

    function Signup(){
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }
        if (!isset($_POST["signup"])){
            return $this->view("AdminLayout", [
                "page" => "Signup",
                "action" => "DashBoard",
                "error" =>""
            ]);
        }else{
            $adminModel = $this->model("AdminModel");
            $email = $_POST['user-email'];
            $password1 = $_POST['user-password'];
            $password2 = $_POST['enter-the-password'];
            if($adminModel->checkUserEmail($email)){
                if($password1 == $password2){
                    $adminModel->addAdmin($email, $password1);
                    return header("Location:" . Redirect("Admin").$_SESSION["indexPage"]);
                }
                else{
                    return $this->view("AdminLayout", [
                        "page" => "Signup",
                        "action" => "DashBoard",
                        "error" => "Mật khẩu Không Khớp"
                    ]);
                }
            }else{
                return $this->view("AdminLayout", [
                    "page" => "Signup",
                    "action" => "DashBoard",
                    "error" => "Email Đã Tồn Tại"
                ]);
            }
        }

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
<<<<<<< HEAD
        $orderModel = $this->model("OrderModel");
        return $this->view("AdminLayout", [
=======
        $_SESSION["indexPage"] = "DashBoard";
        $this->view("AdminLayout", [
>>>>>>> 1fafa1ce0000a252ba620fa47b8bd4b2e455a374
            "page" => "DashBoard",
            "action" => "DashBoard",
            "numOfCustomers" => $orderModel->countCustomer(),
            "numOfProducts" => $this->model("ProductModel")->countProduct(),
            "numOfOrders" => $orderModel->countOrder(),
            "numOfContacts" => $this->model("ContactModel")->countContact(),
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
                            } catch (Exception $ex) {
                                $error = "Có lỗi xảy ra!";
                            }
                        }
                    }
                    // $_SESSION["indexPage"] = "Product/Create";
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
                    } else {
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
                        } else {
                            $img_name = $_FILES['img']['name'];
                            $file_tmp = $_FILES['img']['tmp_name'];
                            $tempArr = explode('.', $img_name);
                            $file_ext = strtolower(end($tempArr));

                            $extensions = array("jpeg", "jpg", "png");

                            if (!in_array($file_ext, $extensions)) {
                                $error = "File không hợp lệ! File nên có đuôi là JPEG, JPG hoặc PNG.";
                            } else {
                                move_uploaded_file($file_tmp, "./Assets/img/" . $img_name);
                            }
                        }
                        if (empty($error)) {
                            try {
                                $this->model("ProductModel")->updateProduct($id, $name, $price, $img_name, $ingredients, $description, $usageGuide);
                                return header("Location:" . Redirect("Admin", "Product"));
                            } catch (Exception $ex) {
                                $error = "Có lỗi xảy ra!";
                            }
                        }
                    }
                    // $_SESSION["indexPage"] = "Product/Update/$id";
                    return $this->view("AdminLayout", [
                        "page" => "ProductForm",
                        "action" => "Product",
                        "error" => $error,
                        "product" => $product
                    ]);
                }
            default: {
                    $_SESSION["indexPage"] = "Product";
                    $productList = $this->model("ProductModel")->getProductList();
                    $this->view("AdminLayout", [
                        "page" => "Product",
                        "action" => "Product",
                        "productList" => $productList
                    ]);
                    $_SESSION["indexPage"] = "Product/Update/$id";
            }
        }
    }
    function Order($action = null, $orderId = null, $statusId = null)
    {
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }
        switch ($action) {
            case "UpdateStatus": {
                    if ($orderId == null || $statusId == null) {
                        return header("Location:" . Redirect("Admin", "Order"));
                    }
                    switch ($statusId) {
                        case 1: {
                                return $this->updateStatus($orderId, 1);
                            }
                        case 2: {
                                return $this->updateStatus($orderId, 2);
                            }
                        default: {
                                return header("Location:" . Redirect("Admin", "Order"));
                            }
                    }
                }
            case "Show": {
                    if ($orderId ==  null) {
                        return header("Location:" . Redirect("Admin", "Order"));
                    }
                    $order = $this->model("OrderModel")->getOrderById($orderId);
                    if (empty($order)) {
                        $orderDetail = null;
                    } else {
                        $orderDetail = $this->model("OrderDetailModel")->getOrderDetailById($orderId);
                    }
                    // $_SESSION["indexPage"] = "Order/Show/$orderId";
                    return $this->view("AdminLayout", [
                        "page" => "OrderDetail",
                        "action" => "Order",
                        "order" => $order,
                        "orderDetail" => $orderDetail
                    ]);
                }
            case "ShowByStatus":{
                    $statuses = $this->model("OrderModel")->countGroupByStatus();
                    $orderList = $this->model("OrderModel")->getOrderListByStatusId($statusId);
                    $statusList = $this->model("StatusModel")->getStatusList();
                    $_SESSION["indexPage"] = "Order/ShowByStatus/null/$statusId";
                    return $this->view("AdminLayout", [
                        "page" => "Order",
                        "action" => "Order",
                        "orderList" => $orderList,
                        "statusList" => $statusList,
                        "statuses" => $statuses
                    ]);
            }
            default: {
                    $statuses = $this->model("OrderModel")->countGroupByStatus();
                    $statusList = $this->model("StatusModel")->getStatusList();
                    if (isset($_POST["filter-order-status"]) && $_POST["filter-order-status"] != '') {
                        $orderList = $this->model("OrderModel")->getOrderListByStatusId($_POST["filter-order-status"]);
                    } else {
                        $orderList = $this->model("OrderModel")->getOrderList("DESC");
                    }
                    $_SESSION["indexPage"] = "Order";
                    return $this->view("AdminLayout", [
                        "page" => "Order",
                        "action" => "Order",
                        "orderList" => $orderList,
                        "statusList" => $statusList,
                        "statuses" => $statuses
                    ]);
                }
        }
    }

    function Contact()
    {
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }
        $contactList = $this->model("ContactModel")->getContactList();
        $_SESSION["indexPage"] = "Contact";
        $this->view("AdminLayout", [
            "page" => "Contact",
            "action" => "Contact",
            "contactList" => $contactList
        ]);
    }

    function QAA($action = null, $id = null) {

        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }

        switch($action){
            case "Create": {
                $error = "";
                if (isset($_POST["save"])) {
                    $question = $_POST["question"];
                    $answer = $_POST["answer"];

                    if (empty($error)) {
                        try {
                            $this->model("QAAModel")->addQAA($question, $answer);
                            return header("Location:" . Redirect("Admin", "QAA"));
                        } catch (Exception $ex) {
                            $error = "Có lỗi xảy ra!";
                        }
                    }
                }
                return $this->view("AdminLayout", [
                    "page" => "QaaForm",
                    "action" => "QAA",
                    "error" => $error
                ]);
            }
            case "Delete": {
                if (empty($_POST)) {
                    return header("Location:" . Redirect("Admin", "QAA"));
                }
                $id = $_POST["id"];
                $qaaModel = $this->model("QAAModel");
                if (($qaaModel->getQaaById($id)) == null) {
                    return header("Location:" . Redirect("Admin", "QAA"));
                }
                $qaaModel->deleteQAA($id);
                return header("Location:" . Redirect("Admin", "QAA"));
            }
            case "Update": {
                if ($id == null) {
                    return header("Location:" . Redirect("Admin", "QAA"));
                }
                $qaa = $this->model("QAAModel")->getQaaById($id);
                if (empty($qaa)) {
                    return header("Location:" . Redirect("Admin", "QAA"));
                }

                $error = "";
                if (isset($_POST["save"])) {
                    $question = $_POST["question"];
                    $answer = $_POST["answer"];

                    if (empty($error)) {
                        try {
                            $this->model("QAAModel")->updateQAA($id, $question, $answer);
                            return header("Location:" . Redirect("Admin", "QAA"));
                        } catch (Exception $ex) {
                            $error = "Có lỗi xảy ra!";
                        }
                    }
                }
                return $this->view("AdminLayout", [
                    "page" => "QaaForm",
                    "action" => "QAA",
                    "qaa" => $qaa,
                    "error" => $error
                ]);
            }
            default: {
                $qaaList = $this->model("QaaModel")->getQaaList();
                return $this->view("AdminLayout", [
                    "page" => "Qaa",
                    "action" => "QAA",
                    "qaaList" => $qaaList
                ]);
            }
        }
    }

    function Stories($action = null, $id = null){
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }

        switch($action){
            case "Create": {
                $error = '';
                if (isset($_POST["save"])) {
                    $title = $_POST["title"]; 
                    $content = $_POST["content"];

                    $img_name = $_FILES['img']['name'];
                    $file_tmp = $_FILES['img']['tmp_name'];
                    $tempArr = explode('.', $img_name);
                    $file_ext = strtolower(end($tempArr));

                    $extensions = array("jpeg", "jpg", "png");

                    if (!in_array($file_ext, $extensions)) {
                        $error = "File không hợp lệ! File nên có đuôi là JPEG, JPG hoặc PNG.";
                    }
                    if (empty($error)) {
                        try {
                            move_uploaded_file($file_tmp, "Assets/img/" . $img_name);
                            $this->model("StoriesModel")->addStories($img_name, $title,$content);
                            return header("Location:" . Redirect("Admin", "Stories"));
                        } catch (Exception $ex) {
                            $error = "Có lỗi xảy ra!";
                        }
                    }
                }
                return $this->view("AdminLayout", [
                    "page" => "StoriesForm",
                    "action" => "Stories",
                    "error" => $error
                ]);
            }
            
            case "Delete": {
                if (empty($_POST)) {
                    return header("Location:" . Redirect("Admin", "Stories"));
                }
                $id = $_POST["id"];
                $storiesModel = $this->model("StoriesModel");
                $story = $storiesModel->getStoryById($id);
                if (empty($story)) {
                    return header("Location:" . Redirect("Admin", "Stories"));
                }
                unlink("Assets/img/{$story["img"]}");
                $storiesModel->deleteStory($id);
                return header("Location:" . Redirect("Admin", "Stories"));
            }

            case "Update": {
                if ($id == null) {
                    return header("Location:" . Redirect("Admin", "Stories"));
                }

                $story = $this->model("StoriesModel")->getStoryById($id);
                if (empty($story)) {
                    return header("Location:" . Redirect("Admin", "Stories"));
                }

                $error = "";
                if (isset($_POST["save"])) {
                    $title = $_POST["title"]; 
                    $content = $_POST["content"];

                    if (empty($_FILES["img"]["name"])) {
                        $img_name = $_POST["old-img"];
                    } else {
                        $img_name = $_FILES['img']['name'];
                        $file_tmp = $_FILES['img']['tmp_name'];
                        $tempArr = explode('.', $img_name);
                        $file_ext = strtolower(end($tempArr));

                        $extensions = array("jpeg", "jpg", "png");

                        if (!in_array($file_ext, $extensions)) {
                            $error = "File không hợp lệ! File nên có đuôi là JPEG, JPG hoặc PNG.";
                        } else {
                            move_uploaded_file($file_tmp, "./Assets/img/" . $img_name);
                        }
                    }
                    if (empty($error)) {
                        try {
                            $this->model("StoriesModel")->updateStory($id, $title, $content, $img_name);
                            return header("Location:" . Redirect("Admin", "Stories"));
                        } catch (Exception $ex) {
                            $error = "Có lỗi xảy ra!";
                        }
                    }
                }
                return $this->view("AdminLayout", [
                    "page" => "StoriesForm",
                    "action" => "Stories",
                    "error" => $error,
                    "story" => $story
                ]);
            }
            default: {
                $storiesList = $this->model("StoriesModel")->getStoryList();
                return $this->view("AdminLayout", [
                    "page" => "Stories",
                    "action" => "Stories",
                    "storiesList" => $storiesList,
                ]);
            }
        }
    }

    function Banner($action = null, $id = null)
    {
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }
        switch ($action) {
            case "Create": {
                    $error = '';
                    if (isset($_POST["save"])) {
                        $isDisplayed = $_POST["isDisplayed"] == "on" ? 1 : 0;

                        $img_name = $_FILES['img']['name'];
                        $file_tmp = $_FILES['img']['tmp_name'];
                        $tempArr = explode('.', $img_name);
                        $file_ext = strtolower(end($tempArr));

                        $extensions = array("jpeg", "jpg", "png");

                        if (!in_array($file_ext, $extensions)) {
                            $error = "File không hợp lệ! File nên có đuôi là JPEG, JPG hoặc PNG.";
                        }
                        if (empty($error)) {
                            try {
                                move_uploaded_file($file_tmp, "Assets/img/" . $img_name);
                                $this->model("BannerModel")->addBanner($img_name, $isDisplayed);
                                return header("Location:" . Redirect("Admin", "Banner"));
                            } catch (Exception $ex) {
                                $error = "Có lỗi xảy ra!";
                            }
                        }
                    }
                    return $this->view("AdminLayout", [
                        "page" => "BannerForm",
                        "action" => "Banners",
                        "error" => $error
                    ]);
                }
            case "Delete": {
                    $bannerModel = $this->model("BannerModel");
                    if ($id == null || ($banner = $bannerModel->getBannerById($id)) == null) {
                        return header("Location:" . Redirect("Admin", "Banner"));
                    }
                    unlink("Assets/img/{$banner["img"]}");
                    $this->model("BannerModel")->deleteBanner($id);
                    return header("Location:" . Redirect("Admin", "Banner"));
                }
            case "UpdateStatus": {
                    if (empty($_POST)) {
                        return header("Location:" . Redirect("Admin", "Banner"));
                    }
                    $this->model("BannerModel")->updateDisplayStatus($_POST["id"]);
                    return;
                }
            default: {
                    $_SESSION["indexPage"] = "Banner";
                    $bannerList = $this->model("BannerModel")->getAllBanner();
                    return $this->view("AdminLayout", [
                        "page" => "Banner",
                        "action" => "Banner",
                        "bannerList" => $bannerList,
                    ]);
                }
        }
    }

    function MassUnit($action = null, $id = null, $name = null)
    {
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }
        switch ($action) {
            case "Create": {
                    $error = "";
                    if (isset($_POST["save"])) {
                        $productId = $_POST["productId"];
                        $nameMassUnit = str_replace(" ", "_", $_POST["nameMassUnit"]);
                        $factor = $_POST["factor"];
                        if (empty($error)) {
                            try {
                                $this->model("MassUnitModel")->addMassUnit($productId, $nameMassUnit, $factor);
                                return header("Location:" . Redirect("Admin", "MassUnit"));
                            } catch (Exception) {
                                $error = "Có lỗi xảy ra!";
                            }
                        }
                    }
                    // $_SESSION["indexPage"] = "Product/Create";
                    $productList = $this->model("ProductModel")->getProductList();
                    return $this->view("AdminLayout", [
                        "page" => "MassUnitForm",
                        "action" => "MassUnit",
                        "productList" => $productList,
                        "error" => $error
                    ]);
                }
            case "Update": {
                    if ($id == null || $name == null) {
                        return header("Location:" . Redirect("Admin", "MassUnit"));
                    }

                    $MassUnit = $this->model("MassUnitModel")->getMassUnit($id, $name);
                    $error = "";
                    if (isset($_POST["save"])) {
                        $nameMassUnit = str_replace(" ", "_", $_POST["nameMassUnit"]);
                        $factor = $_POST["factor"];
                        if (empty($error)) {
                            try {
                                $this->model("MassUnitModel")->updateMassUnit($id, $name, $nameMassUnit, $factor);
                                return header("Location:" . Redirect("Admin", "MassUnit"));
                            } catch (Exception) {
                                $error = "Có lỗi xảy ra!";
                            }
                        }
                    }
                    // $_SESSION["indexPage"] = "Product/Update/$id";
                    return $this->view("AdminLayout", [
                        "page" => "MassUnitForm",
                        "action" => "Update",
                        "error" => $error,
                        "MassUnit" => $MassUnit
                    ]);
                }
            case "Delete": {
                    if ($id == null || $name == null) {
                        return header("Location:" . Redirect("Admin", "MassUnit"));
                    }
                    $this->model("MassUnitModel")->deleteMassUnit($id, $name);
                    return header("Location:" . Redirect("Admin", "MassUnit"));
                }
            default: {
                $_SESSION["indexPage"] = "MassUnit";
                $massUnitList = $this->model("MassUnitModel")->getMassUnitList();
                return $this->view("AdminLayout", [
                    "page" => "MassUnit",
                    "action" => "MassUnit",
                    "massUnitList" => $massUnitList
                ]);
                }
        }
    }
    function UpdateWebsiteInfo()
    {
        if (!$this->isAdminLogedIn()) {
            return header("Location:" . Redirect("Admin", "Login"));
        }
        $message = "";
        $info = json_decode(file_get_contents("./info.json"), true);

        if (!empty($_POST)) {
            $phoneNumber = $_POST["phone-number"];
            $address = $_POST["address"];
            $facebook = $_POST["facebook"];
            $zalo = $_POST["zalo"];
            $email = $_POST['email'];

            $info["phoneNumber"] = $phoneNumber;
            $info["address"] = $address;
            $info["facebook"] = $facebook;
            $info["zalo"] = $zalo;
            $info["email"] = $email;
            file_put_contents("./info.json",json_encode($info, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
            $message = "Đổi thông tin thành công!";
        }
        return $this->view("AdminLayout", [
            "page" => "UpdateWebsiteInformation",
            "action" => "UpdateInfo",
            "info" => $info,
            "message" => $message
        ]);
    }
    private function isAdminLogedIn()
    {
        return $_SESSION[ADMIN_LOGIN] != null;
    }
    private function updateStatus($orderId, $statusID)
    {
        $orderModel = $this->model("OrderModel");
        $orderModel->updateOrder($orderId, $statusID);
        header("Location:" . Redirect("Admin", "Order"));
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