<?php 
session_start();
//var_dump($_SESSION);
	if (!isset($_SESSION["email"]) || !isset($_SESSION["loggedIN"])) {
			header("Location: login.php");
			exit();
	}  
?>      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/index.css">
    <title>Users</title>
</head>
<body>  
    <?php //global $edit_state; ?>
    <div id="message">
    </div>
    <div id="users-list">
    </div>
    <form method="POST">
        <!-- Edit user data -->
        <input type="hidden" name="id" id="id">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">Log out</a>
            </li>
        </ul>  
        <div class="input-data">
            <input type="text" name="name" id="name" >
            <span></span>
            <label>Name</label>
        </div>
        <div class="input-data">
            <input type="text" name="email" id="email" >
            <span></span>            
            <label>Email</label>
        </div>
        <div class="input-btn">
            <?php //if($edit_state==false):?>
            <button type="button" name="save" id="save" class="btn">Save</button>
            <?php //else:?>
            <button type="button" name="update" id="update" class="btn">Update</button>
            <?php //endif;?>
        </div>
        </div>
    </form>
    <script src="./js/script.js"></script>
</body>
</html>