<?php
$host='localhost';
$passwd='';
$db='login';
$username='root';
$connection=new mysqli($host, $username, $passwd, $db);
if($connection->connect_error){
    die("Unable to connect database: ".$connection->connect_error);
}
?>