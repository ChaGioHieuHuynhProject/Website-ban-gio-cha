<?php class Register extends Controller {
    function Index() {
        if (!isset($_POST["register"])) {
            $this->view("MainLayout", [
                "page"=>"register"
            ]);
        } else {
            
        }
    }
}