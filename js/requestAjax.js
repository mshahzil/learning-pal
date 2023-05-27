$(document).ready(function () {
  //email already exists check
  $("#stdemail").on("keypress blur", function () {
    var reg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var stdemail = $("#stdemail").val();
    $.ajax({
      url: "./addStd.php",
      method: "POST",

      data: {
        checkemail: "checkemail",
        stdemail: stdemail,
      },
      success: function (data) {
        if (data != 0) {
          $("#errorMsg2").html(
            "<small class='text-danger pl-3 font-weight-bold'>This Email Id Already Exists!!</small>"
          );
          $("#Signup").attr("disabled", true);
        } else if (data == 0 && reg.test(stdemail)) {
          $("#errorMsg2").html(
            "<small class='text-primary pl-3 font-weight-bold'>You are good to go!</small>"
          );
          $("#Signup").attr("disabled", false);
        } else if (!reg.test(stdemail)) {
          $("#errorMsg2").html(
            "<small class='text-danger pl-3 font-weight-bold'>Please Enter a valid Email (Format: name@mail.com)!!</small>"
          );
          $("#Signup").attr("disabled", true);
        }
      },
      error: function () {
        console.log("error");
      },
    });
  });
});

//register student

function AddStd() {
  var reg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var stdname = $("#stdname").val();
  var stdemail = $("#stdemail").val();
  var stdpass = $("#stdpass").val();

  //checking form fields
  if (stdname.trim() == "") {
    $("#errorMsg1").html(
      "<small class='text-danger pl-3 font-weight-bold ' >Name Field is Empty!!</small>"
    );
    $("#stdname").focus();
    return false;
  } else if (stdemail.trim() == "") {
    $("#errorMsg2").html(
      "<small class='text-danger pl-3 font-weight-bold'>Email Field is Empty!!</small>"
    );
    $("#stdemail").focus();
    return false;
  } else if (stdemail.trim() != "" && !reg.test(stdemail)) {
    $("#errorMsg2").html(
      "<small class='text-danger pl-3 font-weight-bold'>Please Enter a valid Email (Format: name@mail.com)!!</small>"
    );
    $("#stdemail").focus();
    return false;
  } else if (stdpass.trim() == "") {
    $("#errorMsg3").html(
      "<small class='text-danger pl-3 font-weight-bold'>Password Field is Empty!!</small>"
    );
    $("#stdpass").focus();
    return false;
  } else {
    $.ajax({
      url: "./addStd.php",
      method: "POST",
      dataType: "json",
      data: {
        stduser: "stduser",
        stdname: stdname,
        stdemail: stdemail,
        stdpass: stdpass,
      },
      success: function (data) {
        if (data == "OK") {
          $("#SuccessMsg").html(
            "<span class='text-success font-weight-bold'>Registration Successful!!</span>"
          );
          clearForm();
        } else if (data == "Failed") {
          $("#SuccessMsg").html(
            "<span class='text-danger font-weight-bold'>Registration Failed!!</span>"
          );
        }
      },
    });
  }
}

//function to clear form
function clearForm() {
  $("#std-form").trigger("reset");
  $("#errorMsg1").html(" ");
  $("#errorMsg2").html(" ");
  $("#errorMsg3").html(" ");
}

//student Login
function StuLoginfunc() {
  var reg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var stdLoginemail = $("#stdLoginemail").val();
  var stdLoginpass = $("#stdLoginpass").val();

  if (stdLoginemail.trim() == "") {
    $("#stdErr1").html(
      "<small class='text-danger pl-3 font-weight-bold'>Email Field is Empty!!</small>"
    );
    $("#stdLoginemail").focus();
    return false;
  } else if (stdLoginemail.trim() != "" && !reg.test(stdLoginemail)) {
    $("#stdErr1").html(
      "<small class='text-danger pl-3 font-weight-bold'>Please Enter a valid Email (Format: name@mail.com)!!</small>"
    );
    $("#stdLoginemail").focus();
    return false;
  } else if (stdLoginpass.trim() == "") {
    $("#stdErr2").html(
      "<small class='text-danger pl-3 font-weight-bold'>Password Field is Empty!!</small>"
    );
    $("#stdLoginpass").focus();
    return false;
  } else {
    $.ajax({
      url: "./loginCheck.php",
      method: "POST",
      data: {
        loginCheck: "Check login",
        stdLoginemail: stdLoginemail,
        stdLoginpass: stdLoginpass,
      },
      success: function (data) {
        console.log(data);
        if (data == 0) {
          $("#LoginMsg").html(
            '<small class="alert alert-danger font-weight-bold">Invalid Email ID or Password</small>'
          );
        } else if (data == 1) {
          $("#LoginMsg").html(
            '<div class="spinner-border text-success role="status"><span class="sr-only"></span></div>'
          );
          setTimeout(() => {
            window.location.href = "index.php";
          }, 1000);
        }
      },
    });
  }
}

//Admin Login
function AdminLoginfunc() {
  var reg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var adminLogemail = $("#adminLogemail").val();
  var adminLogpass = $("#adminLogpass").val();
  if (adminLogemail.trim() == "") {
    $("#admErr1").html(
      "<small class='text-danger pl-3 font-weight-bold'>Email Field is Empty!!</small>"
    );
    $("#adminLogemail").focus();
    return false;
  } else if (adminLogemail.trim() != "" && !reg.test(adminLogemail)) {
    $("#admErr1").html(
      "<small class='text-danger pl-3 font-weight-bold'>Please Enter a valid Email (Format: name@mail.com)!!</small>"
    );
    $("#adminLogemail").focus();
    return false;
  } else if (adminLogpass.trim() == "") {
    $("#admErr2").html(
      "<small class='text-danger pl-3 font-weight-bold'>Password Field is Empty!!</small>"
    );
    $("#adminLogpass").focus();
    return false;
  } else {
    $.ajax({
      url: "adminCheck.php",
      method: "POST",
      data: {
        loginCheck: "Check admin login",
        adminLogemail: adminLogemail,
        adminLogpass: adminLogpass,
      },
      success: function (data) {
        console.log(data);
        if (data == 0) {
          $("#AdminLoginMsg").html(
            '<small class="alert alert-danger font-weight-bold">Invalid Email ID or Password</small>'
          );
        } else if (data == 1) {
          $("#AdminLoginMsg").html(
            '<small class="alert alert-success font-weight-bold">Login Successful</small>'
          );
          setTimeout(() => {
            window.location.href = "adminDashboard.php";
          }, 1000);
        }
      },
    });
  }
}
