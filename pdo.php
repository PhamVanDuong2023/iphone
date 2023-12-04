<?php  

//kết nối database bằng PDO

function pdo_connect() {
    $dburl="mysql:host=localhost;dbname=du_an1;charset=utf8";
    $username='root';
    $password='';

    $conn=new PDO($dburl,$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $conn;
}





//thực thi câu lệnh sql thao tác dữ liệu(insert,update,delete)

function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}


// thực thi câu lệnh truy vấn(select)
function pdo_query($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_connect();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows=$stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

//Truy vấn 1 bản ghi

function pdo_query_one($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_connect();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }

}


// thực thi câu lệnh 1 giá trị


function pdo_query_value($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_connect();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        return array_values(($row[0]));
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

?>