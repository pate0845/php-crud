<?php
include_once("connection.php");
//onclick  (save)  enter   data    into    db
    if(isset($_POST["email"])){
    $email=$_POST["email"];
    $name=$_POST["name"];
    if($email!='' && $name!=''){
    $sql ="INSERT INTO `users` (`firstname`,`email`,`password`) VALUES ('$name', '$email','')";
    $table=mysqli_query($connection,$sql);
   // $_SESSION['msg']="User added";
    //header('location: index.php');
    if($table){
        echo 'true';
    }else{
        echo 'false';
    }
    }else{
        echo 'false';
    }
}
?>