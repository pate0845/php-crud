<?php
$host=getenv('Port');
$passwd=getenv('Password');
$db=getenv('Database');
$username=getenv('Username');
$connection=new mysqli($host, $username, $passwd, $db);
if($connection->connect_error){
    die("Unable to connect database: ".$connection->connect_error);
}
?>