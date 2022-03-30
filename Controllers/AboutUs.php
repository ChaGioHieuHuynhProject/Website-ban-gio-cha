<?php class AboutUs extends Controller{

    function Index(){
        $this->view("MainLayout", [
            "page" => "AboutUs",
            "message"=>"welcome to About Us."
        ]);

    }
}
?>