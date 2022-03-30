<?php class Contact extends Controller{
    function Index() {
        $ContactModel = $this-> model("ContactModel");
        $contactList = $ContactModel->getContactList();
        $this->view("MainLayout", [ 
            "page"=> "Contact",
            "contactList"=> $contactList
        ]);
    }
}

?>