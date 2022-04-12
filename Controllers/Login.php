<?php class Login extends Controller
{
    function Index()
    {
        if (!isset($_POST["login"]) && !isset($_POST["register"])) {
            $this->view("EmptyLayout", [
                "page" => "Login-Register"
            ]);
        } else if (isset($_POST["login"])) {
            $accModel = $this->model("AccountModel");
            $acc = $accModel->getAccountByPhoneNumber($_POST["phone-number"]);
            if (!is_null($acc)) {
                $pepper = $_ENV["pepper"];
                $pwd = $_POST["password"];
                $pepperedPwd = hash_hmac('sha256', $pwd, $pepper);
                if (password_verify($pepperedPwd, $acc['password'])) {
                    session_start();
                    $cusInfo = $this->model("CustomerModel")->getCustomerById($acc["id"]);
                    $_SESSION[LOGIN] = ["cusId" => $acc["id"], "firstName" => end(explode(' ', $cusInfo["name"]))];
                    return header("Location:" . ROOT_URL);
                }
                $message = "Sai mật khẩu! Vui lòng thử lại!";
            } else {
                $message = "Số điện thoại hiện chưa đăng kí tài khoản!";
            }
            return $this->view("EmptyLayout", [
                "page" => "Login-Register",
                "loginMessage" => $message
            ]);
        } else if (isset($_POST["register"])) {
            $customerModel = $this->model("CustomerModel");
            $accountModel = $this->model("AccountModel");
            if ($accountModel->isExistedAccount($_POST["phone-number"])) {
                $message = "Số điện thoại đã tồn tại! Vui lòng nhập số điện thoại khác!";
            } else {
                $name = $_POST["name"];
                $address = $_POST["address"];
                $phoneNumber = $_POST["phone-number"];
                $email = $_POST["email"];
                $pwd = $_POST["password"];
                $pwdPeppered = hash_hmac("sha256", $pwd, $_ENV["pepper"]);
                $pwdHashed = password_hash($pwdPeppered, PASSWORD_DEFAULT);
                $id = date_create()->getTimestamp();
                try {
                    $customerModel->addNewCustomer($id, $name, $phoneNumber, $address, $email);
                    $accountModel->addNewAccount($id, $pwdHashed);
                    return header("Location:" . ROOT_URL);
                } catch (Exception) {
                    $message = "Có lỗi xảy ra!";
                }
            }
            return $this->view("EmptyLayout", [
                "page" => "Login-Register",
                "registerMessage" => $message
            ]);
        }
    }
}
