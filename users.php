<?php
include_once("connection.php");
$selectAll="SELECT * FROM users ORDER BY id DESC";
$record = $connection->query($selectAll);

$table='<table class="table table-hover" style="width: 80%;">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        ';
    if($record->num_rows>0){
         while ($row = mysqli_fetch_array($record)) {   
        $table.= '  
         <tr>
                <td>' . $row['firstname'] . '</td>
                     <td>' . $row['email'] . '</td>
                     <td>
                        <i class="fa-solid fa-user-pen" style="color:black;padding:12px;cursor:pointer;" 
                                    onclick="editUser('.$row['id'].')"></i>
                     </td>
                     <td>

                        <i class="fa-solid fa-trash-can" style="color:black;padding:12px;cursor:pointer;"
                                    onclick="deleteUser('.$row['id'].')"></i>
                    </td>
                </tr>           
';
}
}
 $table.='</tbody>
        </table> ';
echo $table;        
?>