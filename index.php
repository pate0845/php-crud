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
    <link rel="stylesheet" href="./index.css">
    <title>Users</title>
</head>
<body>  
    <div id="message">
    </div>
    <div id="users-list">
    </div>
    <form method="POST">
        <!-- Edit user data -->
        <input type="hidden" name="id" id="id">
        <div class="input-data">
            <label>Name</label>
            <span></span>
            <input type="text" name="name" id="name" >
        </div>
        <div class="input-data">
            <label>Email</label>
            <span></span>
            <input type="text" name="email" id="email" >
        </div>
        <div class="input-data">
            <button type="button" name="save" id="save" class="btn">Save</button>
            <button type="button" name="update" id="update" class="btn">Update</button>
        </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            FetchUsers();
        });

        function display_message(text){
                return ` <div class="alert alert-warning alert-dismissible fade show" role="alert">
                ${text}         
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            }

            $("#save").on('click', function() {
                var email = $('#email').val();
                var name = $('#name').val();
                if (email == "" || name == "") {
                    alert("Please check your input");
                    return false;
                } 
                $.ajax({
                        type:'post',
                        url:'addUser.php',
                        data: {email: email,name: name},
                        success: function(data) {   
                            if(data=='true'){
                                $('#email').val('');
                                $('#name').val('');
                                FetchUsers();
                                $('#message').html(display_message('User added!'));
                            }else{
                                $('#message').add(display_message('User not added!'));
                            }
                        }
                    });
            });

            
        function editUser(id){
                $.ajax({
                    type:'post',
                    url:'editUsers.php',
                    data:{n_id:id},
                    dataTypes:'json',
                    success:function(data){
                        data=JSON.parse(data);
                        if(data!=''){
                            $('#email').val(data.email);
                            $('#name').val(data.name);
                            $('#id').val(data.id);
                        }
                    }
                })
            }

            $("#update").on('click', function() {
                var email = $('#email').val();
                var name = $('#name').val();
                var id=$('#id').val();
                if (email == "" || name == "") {
                    alert("Please check your input");
                    return false;
                } 
                $.ajax({
                        type:'post',
                        url:'updateUser.php',
                        data: {email: email,name: name,id:id},
                        success: function(data) {
                            console.log(data);
                            if(data=='success'){
                                FetchUsers();
                                $('#email').val('');
                                $('#name').val('');
                                $('#id').val('');
                                $('#message').html(display_message('User updated!'));
                            }else{
                                $('#message').add(display_message('User not updated!'));
                            }
                        }
                    });
            });

        function FetchUsers(){
                $.ajax({
                    type:'post',
                    url:'users.php',
                    data:{},
                    success:function(data){
                        if(data!=''){
                            $('#users-list').html(data);
                        }
                    }
                })
            }

        function deleteUser(id){
            $.ajax({
                    type:'post',
                    url:'deleteUser.php',
                    data:{del:id},
                    success:function(data){
                        if(data!=''){
                            FetchUsers();
                            $('#message').html(display_message('User Deleted!'));
                        }
                    }
                })
        }    
    </script>
</body>
</html>