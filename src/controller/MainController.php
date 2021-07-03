<?php 

# import routes
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');

class MainController {
    public function view(){
        require_once(VIEW_PATH. "welcome.php");
    }

    public function error404(){
        require_once(VIEW_ERRORS_PATH. "error404.php");
    }

    public function error500(){
        require_once(VIEW_ERRORS_PATH. "error500.php");
    }
}