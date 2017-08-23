<?php

class DB{
    //定义属性
    public $db;

    //定义构造函数
    function __construct($db_config){
        //链接数据库
        $this->db = new mysqli($db_config['host'], $db_config['username'], $db_config['passwd'], $db_config['daname'] );
        //设置数据库字符编码UTF8
        $this->db->query("SET NAMES UTF8");
    }
    //添加数据
    function insterData($table,$formdata){

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
        $fieldstr   = implode(', ', $field);
        $value      = implode(', ', $valuea);
        $sql        = 'INSERT INTO '.$table.'('.$fieldstr.') VALUES('.$value.')';
        $r = $this->db->query($sql);
        return $r;
    }


//跟新数据
    function updataData($table, $formdata, $where){
        $data = array();
        foreach ($formdata as $key => $value){
            //判断是否是String类型的 如果是的是就加上"";
            if (is_string($value)){
                $value = '"' . $value . '"';
            }
            $data[] = $key . '=' . $value;
        };

        //$str ='sname="'.$_POST['sname'].'", sno="'.$_POST['sno'].'", mobile="'.$_POST['mobile'].'", idcount="'.$_POST['idcount'].'", address="'.$_POST['address'].'", username="'.$_POST['username'].'", opertimes='.time().', cid = '.$_POST['cid'].'';
        $str = implode(',',$data);
        $sql = ' UPDATE '.$table.' SET '.$str.' WHERE '.$where;
        echo $sql;
        $r = $this->db->query($sql);
        return $r;


    }

    //删除语句
    function delData($table,$where){
        $sql = 'DELETE FROM '.$table. ' WHERE ' .$where;
        $r = $this->db->query($sql);
        return $r;

    }

    //查询数据
    function selectData($table,$fields='*',$where='',$offset = 0,$limit = 0){

        $sql = 'SELECT '.$fields.' FROM '.$table.($where ? (' WHERE ' . $where):'') ;
        //查询指定范围内的记录
        if ($limit){
            $sql .=' LIMIT '.$offset.', '.$limit ;
        }


        $result = $this->db->query($sql);
        $data = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            $data[] = $row;
        }

        return $data;
    }

    //复合条件的记录数量
    function getCount($table,$where=''){
        $sql = 'SELECT count(id) as totalnum FROM ' . $table .($where ? (' WHERE ' . $where): '');
        $result = $this ->db->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row['totalnum'];

    }



    //析构函数 类执行完之后自动执行
    function __destruct(){

        $this->db->close();

    }

};
