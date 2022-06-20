<?php 
class App{
    function __construct()
    {
       $url = $this->getUrl();
       echo $url ;
    }
    function getUrl(){
        if(!empty($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
        }
        else{
            $url = '/';
        }
        return $url;
    }
}
?>