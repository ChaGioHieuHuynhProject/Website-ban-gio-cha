<?php 
    class Home extends Controller{
        function Index () {
            $this->view("MainLayout", [
                "page" => "Home",
                "name" => "Ky"
            ]);
        }
        // function Show () {
        //     // echo $this->model("KyModel")->getName()["name"];
        //     $this->view("MainLayout", [
        //         "page" => "Home",
        //         "name" => "Nguyen Dang Ky",
        //         "class" => "PNV23b",
        //         "age" => 21
        //     ]);
        // }
        function Test() {
            $this->view('MainLayout', [
                'page' => 'test'
            ]); 
        }
    }
?>