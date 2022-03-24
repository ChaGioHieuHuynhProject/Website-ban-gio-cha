<?php 
class App {
    protected $controller = "Home";
    protected $action = "Index";
    protected $params = [];
    function __construct() {
        $arr = $this->urlProcess();

        //get controller Home/Show/1
        if (isset($arr[0])){
            if (file_exists("./Controllers/{$arr[0]}.php")) {
                $this->controller = ucfirst($arr[0]);
            } else {
                Error();
                return;
            }
            unset($arr[0]);
        }
        require_once "./Controllers/{$this->controller}.php";
        $this->controller = new $this->controller;
        //get action 
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])){
                $this->action = ucfirst($arr[1]);
            }
            else {
                Error();
                return;
            }
            unset($arr[1]);
        }
        //get params
        $this->params = $arr?array_values($arr):[];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
    function urlProcess() {
        if (isset($_GET["url"])){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
?>