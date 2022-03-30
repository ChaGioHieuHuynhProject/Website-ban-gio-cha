<?php class Qaa extends Controller {
    function Index() {
        $this->view("MainLayout", [
            "page" => "QuestionAndAnswer"
        ]);
    }
}