<?php class Home extends Controller{
    function Index () {
        $this->view("MainLayout", [
            "page" => "Home", 
            "productList" => $this->model("ProductModel")->get3Products(),
            "bannerList" => $this->model("BannerModel")->getBannerList(),
            "storiesList" => $this->model("StoriesModel")->get2LatestStories(),
        ]);
    }
}
?>