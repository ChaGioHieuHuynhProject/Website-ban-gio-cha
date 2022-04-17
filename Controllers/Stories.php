<?php class Stories extends Controller
{
    function Index()
    {
        $storyList = $this->model("StoriesModel")->getStoryList();
        $this->view("MainLayout", [
            "page" => "Stories",
            "storyList" => $storyList
        ]);
    }
}
