<?php class QAA extends Controller {
    function Index() {
        $qaaModel = $this->model("QAAModel");
        $qaaList = $qaaModel->getQAAList();
        $this->view("MainLayout", [
            "page" => "QuestionAndAnswer",
            "qaaList" => $qaaList
        ]);
    }
}