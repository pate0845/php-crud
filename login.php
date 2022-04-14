<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User Login</title>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Sign up</span></div>
            <form>
                <div class="media">
                    <a href="https://www.facebook.com/login.php">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/i/flow/login">
                        <i class="fa-brands fa-twitter"></i>
                    </a> 
                    <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&flowEntry=ServiceLogin">         
                        <i class="fa-brands fa-google"></i>
                    </a>
                    <a href="https://github.com/login">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
                <span class="seprate-row">or</span>
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" id="email" name="email" required placeholder="Email">
                    <span></span>
                </div>
                
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" required placeholder="Password">
                    <span></span>
                </div>
               
                <div class="pass"><a href="#">Forgot password?</a></div>
               
                <div class="row button">
                    <input type="button" id="login" value="Log In" class="btn">
                </div>
              
                <div class="signup_link">Not a member? <a href="#">Signup</a></a></div>
                <div id="error">
                </div>
            </div>
        </div>
    </form>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#login").on('click', function() {
                var email = $('#email').val();
                var password = $('#password').val();

                if (email == "" || password == "") {
                    alert("Please check your input");
                } else {
                    $.ajax({
                        url: 'http://localhost/securicore-assesment/db_connect.php',
                        method: 'POST',
                        data: {
                            login: 1,
                            email: email,
                            password: password
                        },
                        success: function() {
                            console.log('success');
                        },
                        dataType: 'text'
                    });
                }
            });

        })
    </script>

</body>

</html>