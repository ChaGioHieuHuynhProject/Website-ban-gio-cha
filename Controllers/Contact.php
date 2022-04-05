<?php class Contact extends Controller{
    function Index() {
        if (!isset($_POST["contact"])) {
            $this->view("MainLayout", [
                "page"=>"Contact",
            ]);
        } 
        else {
            $contactModel = $this->model("ContactModel");
            if (empty($_POST["address"])||empty($_POST["phone"])||empty($_POST["email"])) {
                $message = "Vui lòng nhập đầy đủ thông tin!";
            } 
            else {
                $address = $_POST["address"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];         
                try {
                    $contactModel->addNewContact($address, $phone, $email);
                    return header("Location: Home");
                }
                catch(Exception $address){
                    $message = "Error!";
                }
            }
            return $this->view("MainLayout", [
                "page"=> "contact",
                "message"=>$message
            ]);
        } 
    }

}
?>