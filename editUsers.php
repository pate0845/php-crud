<?php
include("connection.php");
//get data by :id
if(isset($_POST["n_id"])){
   // $edit_state=true;
    $userId=$_POST['n_id'];
    $query="SELECT * FROM users WHERE id=$userId";
    $result=$connection->query($query);
    $row=mysqli_fetch_array($result);
    $name=$row['firstname'];
    $email=$row['email'];
}
$data = new \stdClass();
$data->email=$email;
$data->name=$name;
$data->id=$userId;
$myJSON=json_encode($data);
echo $myJSON;
?>