<?php
    session_start();
    include("connection.php");

    if(isset($_SESSION['loggedIn']) && isset($_SESSION['email'])){
        header('Location: index.php');
        exit('success');
    }

    elseif(isset($_POST['login'])){
        $email=$connection->real_escape_string($_POST['email']);
        $password=md5($connection->real_escape_string($_POST['password']));
        $query="SELECT id FROM users WHERE email='$email' AND password='$password'";
        $data=$connection->query($query);
        if($data->num_rows>0){
            $_SESSION['loggedIN']='1';
            $_SESSION['email']=$email;
            exit('success');
        }else{
            exit('failed');
        }
    };
?>
