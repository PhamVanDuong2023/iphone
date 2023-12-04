<?php
    // include "http://localhost/duanmau/model/DAO/pdo.php";
    // $absolute_path = $_SERVER['DOCUMENT_ROOT'] . "/duanmau";
    // include $absolute_path."/model/DAO/pdo.php";
    function selectDanhMuc(){
        $sql_danhmuc = "SELECT * FROM danhmuc";
        $list = query($sql_danhmuc);
        return $list;
    }

    function insertDanhMuc($param){
        $sql = "INSERT INTO danhmuc(tendanhmuc) values ('{$param}')";
        execute($sql);
    }

    function deleteDanhMuc($param){
        $sql = "DELETE FROM danhmuc WHERE danhmuc_id = {$param}";
        execute($sql);
    }

    function updateDanhMuc($param, $id){
        $sql = "UPDATE danhmuc SET tendanhmuc = '{$param}' WHERE danhmuc_id = {$id}";
        execute($sql);
    }

    function findOneDanhMuc($param){
        $sql_danhmuc = "SELECT * FROM danhmuc WHERE danhmuc_id = {$param}";
        $list = query($sql_danhmuc);
        return $list[0];
    }

?>