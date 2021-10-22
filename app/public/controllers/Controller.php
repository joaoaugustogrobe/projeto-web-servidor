<?php

class Controller{
    public static function CreateView($viewName, $requiresAuth){

        if($requiresAuth){
            if (empty($_SESSION['logged-in']) || !$_SESSION['logged-in']) {
                header('Location: login');
                return;
            }
        }

        if(file_exists('./Views/'.$viewName.'.php')){
            static::mount();
            include_once('./Views/'.$viewName.'.php');
        }else{
            echo 'File not found:  ';
            echo './Views/'.$viewName.'.php';
        }
    }

    public static function mount(){
    }
}

?>