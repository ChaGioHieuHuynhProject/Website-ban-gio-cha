<?php class Qaa extends Controller {
    function Index() {
        return $this->view("MainLayout", [
            "page"=>"QuestionAndAnswer"
        ]);
    }
}