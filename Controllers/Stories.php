<?php class Stories extends Controller {
    function Index() {
        $storiesModel = $this->model("StoriesModel");
        $storyList = $storiesModel->getStoryList();
        $this->view("MainLayout", [
            "page" => "Stories",
            "storyList" => $storyList
        ]);
    }
}
