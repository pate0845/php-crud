<?php
    include("connection.php");
    if(isset($_POST['login'])){
        $email=$connection->real_escape_string($_POST['email']);
        $password=$connection->real_escape_string($_POST['password']);
        $query="SELECT id FROM users WHERE email='$email' AND password='$password'";
        $data=mysqli_query($connection,$query);
        if($data->num_rows>0){
           // header('Location:./index.php');
            // header('Location: http://' .$_SERVER['HTTP_HOST'] . '/securicore-assesment/index.php');
          // echo `<script type='text/javascript'> document.location.href='./index.php'; </script>`;
          echo '<script type="text/javascript">location.replace("http://localhost/securicore-assesment/index.php");</script>';
        
        }else{
            exit('failed');
        }
    };
?>
