<?php class Home extends Controller{
    function Index () {
        $this->view("MainLayout", [
            "page"=>"Home" 
        ]);
    }
}
?>