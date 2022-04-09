<?php class Home extends Controller{
    function Index () {
        $this->view("MainLayout", [
            "page"=>"Home" 
        ]);
    }
    function Logout() {
        $_SESSION["LOGIN"] = null;
        header("Location:".ROOT_URL);
    }
}
?>