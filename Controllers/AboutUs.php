<?php class AboutUs extends Controller{
    
    function Index(){
        $this->view("MainLayout", [
            "page" => "AboutUs",
            "message"=>"welcome to About Us."//Don't need mesage, here maybe is the content of About Us
        ]);
    }
}
?>