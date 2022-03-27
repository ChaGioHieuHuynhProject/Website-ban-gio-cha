<?php class Login extends Controller {
    function Index() {
        if (!isset($_POST["login"])) {
            $this->view("MainLayout", [
                "page"=>"Login"
            ]);
        } else {
            $accModel = $this->model("AccountModel");
            $acc = $accModel->getUser($_POST["username"]);
            if (!is_null($acc)) {
                $pepper = $_ENV["pepper"];
                $pwd = $_POST["password"];
                $pepperedPwd = hash_hmac('sha256', $pwd, $pepper);
                if (password_verify($pepperedPwd, $acc["password"])) {
                    session_start();
                    $_SESSION["cusID"] = $acc["cusId"];
                    header("Location: Home");
                }
                else {
                    $message = "Password incorect! Please try again!";
                }
            } else {
                $message = "Username is not existed!";
            }
            $this->view("MainLayout", [
                "page"=>"Login",
                "errorMessage"=>$message
            ]);
        }
    }
}