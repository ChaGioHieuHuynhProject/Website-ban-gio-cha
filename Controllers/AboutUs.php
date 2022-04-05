<?php class AboutUs extends Controller{

    function Index(){
        $this->view("MainLayout", [
            "page" => "AboutUs",
            "paragraph"=>"welcome to About Us."
        ]);

    }
}
?>