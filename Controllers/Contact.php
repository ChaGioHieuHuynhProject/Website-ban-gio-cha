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
                $subject = "[Khách hàng liên lạc][Đang chờ phản hồi]";
                $content = "Tên khách hàng: <b>{$_POST['name']}</b><br>
                    Số điện thoại: <b>{$_POST["phone-number"]}</b><br>
                    Địa chỉ: <b>{$_POST["address"]}</b><br>
                    Với lời nhắn: \"{$_POST["note"]}\"<br><br>
                    Hãy liên lạc lại ngay với khách hàng đi nào!";
                sendEmail($subject, $content);
            } catch (Exception $ex) {
                $message = $ex . "Xảy ra lỗi!";
            }
            return $this->view("MainLayout", [
                "page" => "Contact",
                "message" => $message
            ]);
        }
    }
}
