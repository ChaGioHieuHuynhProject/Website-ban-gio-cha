<?php class Login extends Controller {
    function Index() {
        if (!isset($_POST["login"])) {
            $this->view("EmptyLayout", [
                "page"=>"Login-Register"
            ]);
        } else {
            $accModel = $this->model("AccountModel");
            $acc = $accModel->getAccountByPhoneNumber($_POST["phone-number"]);
            if (!is_null($acc)) {
                $pepper = $_ENV["pepper"];
                $pwd = $_POST["password"];
                $pepperedPwd = hash_hmac('sha256', $pwd, $pepper);
                if (password_verify($pepperedPwd, $acc['password'])) {
                    session_start();
                    $_SESSION["cusID"] = $acc["id"];
                    return header("Location: Home");
                }
                $message = "Sai mật khẩu! Vui lòng thử lại!";
            } else {
                $message = "Số điện thoại hiện chưa đăng kí tài khoản!";
            }
            return $this->view("MainLayout", [
                "page"=>"login",
                "message"=>$message
            ]);
        }
    }
}