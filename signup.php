<?php
    session_start();
    include("connection.php");
    if(isset($_POST['name'])){
        $name=$connection->real_escape_string($_POST['name']);
        $email=$connection->real_escape_string($_POST['email']);
        $userCheck="SELECT * FROM users WHERE email='$email' OR firstname='$name'";
        $data=$connection->query($userCheck);
        if($data->num_rows>0){
            exit("user present");
        }else{
            $password=md5($connection->real_escape_string($_POST['password']));
            $query="INSERT INTO `users` (`firstname`,`email`,`password`) VALUES ('$name', '$email','$password')";
            $newUser=$connection->query($query);
            if($newUser){
                exit('added');
            }else{
                exit('failed');
            }
         }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>User Signup</title>
</head>

<body>
    <div id="message"></div>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Sign Up</span></div>
            <form>
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" id="name" name="name" required placeholder="Name">
                    <span></span>
                </div>

                <div class="row">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" id="email" name="email" required placeholder="Email">
                    <span></span>
                </div>
                
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" required placeholder="Password">
                    <span></span>
                </div>
                              
                <div class="row button">
                    <input type="button" id="signup" value="SignUp" class="btn">
                </div>
                <div class="signup_link">Already Registered! <a href="login.php">Log In</a></a></div>
            </div>
        </div>
    </form>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $("#signup").on('click', function() {
                var name=$('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();

                if (email == "" || password == "" || name=="") {
                    alert("Please check your input");
                } else {
                    $.ajax({
                        url: 'signup.php',
                        method: 'POST',
                        data: {
                            name:name,
                            email: email,
                            password: password
                        },
                        success: function(data) {
                            if(data.indexOf('added')>=0){
                                $('#message').html(display_message("Successfully Registered!"));
                                window.location="login.php";
                            }else if(data.indexOf('user present')>=0){
                                $('#message').html(display_message("User or Email already present!"));
                            }else{
                                $('#message').html(display_message("failed to register!"));
                            }
                            $('#name').val('');
                            $('#email').val('');
                            $('#password').val('');
                        },
                        dataType: 'text'
                    });
                }
            });

            function display_message(text){
                return (` 
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                ${text}     
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            };
        })
    </script>

</body>

</html>