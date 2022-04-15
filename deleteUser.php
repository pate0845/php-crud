<?php 
include_once("connection.php");
//delete records
if(isset($_POST['del'])){
    $id=$_POST['del'];
    if($id!=''){
    $query="DELETE FROM users WHERE id=$id";    
    $result=$connection->query($query);
    if($result){
        echo 'success';
    }else{
        echo 'fail';
    }
}else{
    echo 'fail';
}
}
?>