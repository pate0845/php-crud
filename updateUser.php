<?php
include_once("connection.php");
//update data
if(isset($_POST["id"])){
    $username=$connection->real_escape_string($_POST['name']);
    $userEmail=$connection->real_escape_string($_POST['email']);
    $userId=$connection->real_escape_string($_POST['id']);
    if($userEmail!=''&& $username!=''){
    $edit="UPDATE `users` SET `firstname`='$username',`email`='$userEmail' WHERE id=$userId";
    $result=mysqli_query($connection,$edit);
    if($result){
        echo 'success';
    }else{
        echo 'fail';
    }
}
}else{
    echo 'fail';
}

?>