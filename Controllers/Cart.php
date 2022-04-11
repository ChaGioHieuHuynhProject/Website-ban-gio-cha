<?php class Cart extends Controller {
    function Index() {
        $this->view("MainLayout", [
            "page" => "cart"
        ]);
    }
}