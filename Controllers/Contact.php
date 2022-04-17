<?php class Contact extends Controller
{
    function Index()
    {
        if (!isset($_POST["contact"])) {
            $this->view("MainLayout", [
                "page" => "Contact",
            ]);
        } else {
            $contactModel = $this->model("ContactModel");

            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $note = $_POST["note"];
            try {
                $contactModel->addContact($address, $phone, $email, $note);
                return header("Location: Home");
            } catch (Exception $address) {
                $message = "Error!";
            }
            return $this->view("MainLayout", [
                "page" => "Contact",
                "message" => $message
            ]);
        }
    }
}
