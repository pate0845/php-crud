<?php

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);
$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

$connection=new mysqli($hostname, $username, $password, $database);
if($connection->connect_error){
    die("Unable to connect database: ".$connection->connect_error);
}
?>