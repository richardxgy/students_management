<?php
function stre($str){
//对字符转义,数据处理

        $str = addslashes($str);
        $str = htmlspecialchars($str);
        $str = strip_tags($str);
        return $str;
}

function adddata($formdata){

    $field  = array();
    $valuea = array();
    foreach ($formdata as $key => $value) {
        $field[] = $key;
        if(is_string($value)){
            $valuea[$key] = '"' . $value . '"';
        }else{
            $valuea[$key] = $value;
        }
    }
    // var_dump($field);
    $fieldstr   = implode(', ', $field);
    $value      = implode(', ', $valuea);
    $sql        = 'INSERT INTO students('.$fieldstr.') VALUES('.$value.')';
    return $sql;
}