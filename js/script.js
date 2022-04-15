//onload will fetch all the users from db
$(document).ready(function () {
  FetchUsers();
});

//displays error messages
function display_message(text) {
  return ` <div class="alert alert-warning alert-dismissible fade show" role="alert">
                ${text}         
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
}

//validate email
function validateEmail(email){
  var reg = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/i;
  if(reg.test(email)){
      return true;
  }else{
      return false;
  }
}


//addUser to db on click
$("#save").on("click", function () {
  var email = $("#email").val();
  var name = $("#name").val();
  if(validateEmail(email)==false){
    alert("Enter valid email!");
    return false;
  }
  if (email == "" || name == "") {
    alert("Please check your input");
    return false;
  }
  $.ajax({
    type: "post",
    url: "addUser.php",
    data: { email: email, name: name },
    success: function (data) {
      if (data == "true") {
        $("#email").val("");
        $("#name").val("");
        FetchUsers();
        $("#message").html(display_message("User added!"));
      } else {
        $("#message").add(display_message("User not added!"));
      }
    },
  });
});

//edit user onclick
function editUser(id) {
  $.ajax({
    type: "post",
    url: "editUsers.php",
    data: { n_id: id },
    dataTypes: "json",
    success: function (data) {
      data = JSON.parse(data);
      if (data != "") {
        $("#email").val(data.email);
        $("#name").val(data.name);
        $("#id").val(data.id);
      }
    },
  });
}
//onclick will send updated data to db
$("#update").on("click", function () {
  var email = $("#email").val();
  var name = $("#name").val();
  var id = $("#id").val();
  if(validateEmail(email)==false){
    alert("Enter valid email!");
    return false;
  }
  if (email == "" || name == "") {
    alert("Please check your input");
    return false;
  }
  $.ajax({
    type: "post",
    url: "updateUser.php",
    data: { email: email, name: name, id: id },
    success: function (data) {
      console.log(data);
      if (data == "success") {
        FetchUsers();
        $("#email").val("");
        $("#name").val("");
        $("#id").val("");
        $("#message").html(display_message("User updated!"));
      } else {
        $("#message").add(display_message("User not updated!"));
      }
    },
  });
});

//fetch user data from db
function FetchUsers() {
  $.ajax({
    type: "post",
    url: "users.php",
    data: {},
    success: function (data) {
      if (data != "") {
        $("#users-list").html(data);
      }
    },
  });
}

//delete user :id
function deleteUser(id) {
  $.ajax({
    type: "post",
    url: "deleteUser.php",
    data: { del: id },
    success: function (data) {
      if (data != "") {
        FetchUsers();
        $("#message").html(display_message("User Deleted!"));
      }
    },
  });
}
