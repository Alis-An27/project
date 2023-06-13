<?php

class Route{
    public static function post($path, $callback){
        $requestURI = $_SERVER['REQUEST_URI'];
        $paths = explode('/', $requestURI); 
        if(strpos($path, "{") and $_SERVER['REQUEST_METHOD'] == "POST"){
            $uriChunks = explode('/',$path);
            if($uriChunks[1] == $paths[1]){
                exit($callback($paths[2]));
            }
        }else if($path == $_SERVER['REQUEST_URI'] and $_SERVER['REQUEST_METHOD'] == "POST"){
            $callback();
            exit;
        }
    }

    public static function get($path, $callback){ 
        $requestURI = $_SERVER['REQUEST_URI']; 
        $paths = explode('/', $requestURI);
        $content = "";
        if(strpos($path, "{") and $_SERVER['REQUEST_METHOD']== "GET"){
            $uriChunks = explode('/',$path);
            if($uriChunks[1] == $paths[1]){
                $content = $callback();
                require_once('template.php');
                exit;
            }
        }else if($path == '/'.$paths[1] and $_SERVER['REQUEST_METHOD']== "GET") {
            $content = $callback();
            require_once('template.php');
            exit;
        }

    }
}