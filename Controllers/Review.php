<?php 
    class Review extends Controller{
        function index(){
            $reviewModel = $this-> model("ReviewModel");
            $reviewList = $reviewModel->getReviewList();
            $this->view("MainLayout", [
                'reviewList'=>$reviewList,
                'page'=>"reviews"
            ]);
        }
    }
