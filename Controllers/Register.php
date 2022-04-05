<?php class Register extends Controller {
    function Index() {
        if (!isset($_POST["register"])) {
            $this->view("MainLayout", [
                "page"=>"register",
                "message"=>"welcome to Register"
            ]);
        } 
        else {
            $customerModel = $this->model("CustomerModel");
            $accountModel = $this->model("AccountModel");
            if (empty($_POST["name"])||empty($_POST["address"])||empty($_POST["phone-number"])||empty($_POST["email"])||empty($_POST["password"])) {
                $message = "Vui lòng nhập đầy đủ thông tin!";
            } 
            else if ($accountModel->isExistedAccount($_POST["phone-number"])) {
                $message = "Số điện thoại đã tồn tại! Vui lòng nhập tài khoản khác!";
            }
            else {
                $name = $_POST["name"];
                $address = $_POST["address"];
                $phoneNumber = $_POST["phone-number"];
                $email = $_POST["email"];
                $pwd = $_POST["password"];
                $pwdPeppered = hash_hmac("sha256", $pwd, $_ENV["pepper"]);
                $pwdHashed = password_hash($pwdPeppered, PASSWORD_DEFAULT);
                echo $pwdHashed;
                $id = date_create()->getTimestamp();
                try {
                    $customerModel->addNewCustomer($id, $name, $phoneNumber, $address, $email);
                    $accountModel->addNewAccount($id, $pwdHashed);
                    return header("Location: Home");
                }
                catch(Exception $name){
                    $message = "Error!";
                }
            }
            return $this->view("MainLayout", [
                "page"=> "register",
                "message"=>$message
            ]);
        } 
    }
}