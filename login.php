<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>نظام ادارة صيدلية نبع زمزم </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
    <script src="js/validateForm.js"></script>
    <script>
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(xhttp.readyState = 4 && xhttp.status == 200)
          xhttp.responseText;
      };
      xhttp.open("GET", "php/db_connection.php?action=is_logged_in", false);
      xhttp.send();

      //alert(xhttp.responseText);
      if(xhttp.responseText == "")
        window.location.href = "http://localhost/Pharmacy-Management/index.html";
      if(xhttp.responseText == "true")
        window.location.href = "http://localhost/Pharmacy-Management/home.php";

    </script>
  </head>
  <body>
    <div class="container">

      <div id="login-form" class="card m-auto p-2">
        <div class="card-body">
          <form name="login-form" class="login-form" action="home.php" method="post" onsubmit="return validateCredentials();">
            <div class="logo">
        			<img src="images/prof.jpg" class="profile"/>
        			<h1 class="logo-caption"><span class="tweak">تسجيل </span>الدخول </h1>
        		</div> <!-- logo class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
              </div>
              <input name="username" type="text" class="form-control" placeholder="اسم المستخدم " onkeyup="validate();" required>
            </div> <!--input-group class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
              </div>
              <input name="password" type="password" class="form-control" placeholder="كلمة السر " onkeyup="validate();" required>
            </div> <!-- input-group class -->
            <div class="form-group">
              <button class="btn btn-default btn-block btn-custom">تسجيل الدخول </button>
            </div>
          </form><!-- form close -->

        </div> <!-- cord-body class -->
        <div class="card-footer">
          <div class="text-center">
            <a class="text-light" onclick="displayForgotPasswordForm();" style="cursor: pointer;"> هل نسيت كلمة السر ؟ </a>
          </div>
        </div> <!-- cord-footer class -->
      </div> <!-- card class -->

      <div id="forgot-password-form" class="card m-auto p-2" style="display: none;">
        <div class="card-body">
          <div name="login-form" class="login-form">
            <div class="logo">
              <img src="images/prof.jpg" class="profile"/>
              <h1 class="logo-caption"><span class="tweak"></span>اعادة <span class="tweak"> تعيين </span>كلمة السر </h1>
            </div> <!-- logo class -->

            <div id="email-number-fields">
              <p class="h6 text-center text-light">ادخل الايميل الشخصي ورقم الهاتف في الاسفل لغرض اعادة تعيين كلمة السر <p>
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-envelope text-white"></i></span>
                </div>
                <input id="email" type="email" class="form-control" placeholder="ادخل الايميل الشخصي " required>
              </div> <!--input-group class -->

              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
                </div>
                <input id="contact_number" type="number" class="form-control" placeholder="ادخل رقم الهاتف " onkeyup="validate();" required>
              </div> <!-- input-group class -->

              <div class="form-group">
                <button class="btn btn-default btn-block btn-custom" onclick="verifyEmailNumber();">تحقق</button>
              </div>
            </div>


            <div id="username-password-fields" style="display: none;">
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
                </div>
                <input id="username" type="text" class="form-control" placeholder="enter username" onblur="notNull(this.value, 'username_error');" >
              </div> <!--input-group class -->
              <code class="text-light small font-weight-bold float-right mb-2" id="username_error" style="display: none;"></code>

              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock text-white"></i></span>
                </div>
                <input id="password" type="text" class="form-control" placeholder="enter password" onkeyup="validatePassword();" >
              </div> <!-- input-group class -->
              <code class="text-light small font-weight-bold float-right mb-2" id="password_error" style="display: none;"></code>

              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
                </div>
                <input id="confirm_password" type="password" class="form-control" placeholder="confirm password" onkeyup="validatePassword();" >
              </div> <!-- input-group class -->
              <code class="text-light small font-weight-bold float-right mb-2" id="confirm_password_error" style="display: none;"></code>
              <div class="form-group">
                <button class="btn btn-default btn-block btn-custom" onclick="updateUsernamePassword();">Reset Password</button>
              </div>
            </div>
          </div><!-- form close -->

        </div> <!-- cord-body class -->
        <div class="card-footer">
          <div class="text-center">
            <a class="text-light" onclick="displayLoginForm();" style="cursor: pointer;">Login here</a>
          </div>
        </div> <!-- cord-footer class -->
      </div> <!-- card class -->

    </div> <!-- container class -->
  </body>
</html>
