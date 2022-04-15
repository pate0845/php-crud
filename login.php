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
    <title>User Login</title>
</head>

<body>
    <div id="message"></div>
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
                        url: 'validateLogin.php',
                        method: 'POST',
                        data: {
                            login: 1,
                            email: email,
                            password: password
                        },
                        success: function(data) {
                            if(data.indexOf('success')>=0){
                                window.location='index.php';
                            }
                            $('#message').html(display_message(data));
                            $('#email').val('');
                            $('#password').val('');
                        },
                        dataType: 'text'
                    });
                }
            });

            function display_message(text){
                return ` <div class="alert alert-warning alert-dismissible fade show" role="alert">
                ${text}         
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            }

        })
    </script>

</body>

</html>