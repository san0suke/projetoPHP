<?php

class Utils {

    public static function return_encode($retorno) {
        if (is_array($retorno)) {
            array_walk_recursive($retorno, function(&$item, $key) {
                $item = utf8_encode($item);
            });
            return json_encode($retorno);
        }
        return json_encode(utf8_encode($retorno));
    }
    
    public static function post_decode() {
        if (count($_POST) > 0) {
            array_walk_recursive($_POST, function(&$item, $key) {
                $item = utf8_decode($item);
            });
        }
    }
    
}
