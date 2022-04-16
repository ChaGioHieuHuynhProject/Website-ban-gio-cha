<?php class Contact extends Controller
{
    function Index()
    {
        if (!isset($_POST["send-contact"])) {
            $this->view("MainLayout", [
                "page" => "Contact",
            ]);
        } else {
            $contactModel = $this->model("ContactModel");

            $name = $_POST["name"];
            $phone = $_POST["phone-number"];
            $address = $_POST["address"];
            $note = $_POST["note"];
            try {
                $contactModel->addContact($name, $phone, $address, $note);
                $message = "Đã gửi thành công!<br>Cảm ơn quý khách đã gửi thông tin liên lạc";
            } catch (Exception $name) {
                $message = "Xảy ra lỗi!";
            }
            return $this->view("MainLayout", [
                "page" => "Contact",
                "message" => $message
            ]);
        }
    }
}