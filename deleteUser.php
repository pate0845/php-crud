<?php 
include_once("connection.php");
//delete records
if(isset($_POST['del'])){
    $id=$_POST['del'];
    if($id!=''){
    $result=mysqli_query($connection,"DELETE FROM users WHERE id=$id");
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