<?php class Review extends Controller{
    function index(){
        $this->view("MainLayout", [
            'page'=>"Reviews"
        ]);
    }
}
