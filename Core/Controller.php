<?php class Controller {
    public function model($model) {
        require_once "./Models/{$model}.php";
        return new $model;
    }
    public function view($layout, $data=[]) {
        require_once "./Views/{$layout}.php";
    }
    public function error() {
        require_once "error.php";
    }
}
?>