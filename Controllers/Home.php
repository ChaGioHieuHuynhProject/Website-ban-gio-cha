<?php class Home extends Controller{
    function Index () {
        $this->view("MainLayout", [
            "page" => "Home", 
            "productList" => $this->model("ProductModel")->get3Products()
        ]);
    }
    function Logout() {
        $_SESSION["LOGIN"] = null;
        header("Location:".ROOT_URL);
    }
}
?>