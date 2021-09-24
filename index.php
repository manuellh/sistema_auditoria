<?php include_once('login.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
html,
body {
height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-image:url(https://i.pinimg.com/originals/b5/ad/f6/b5adf6c49282ee22c71c44a2fdea69ea.jpg);
  background-size: 100% 100%;
}
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}

.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {
    font-size: 15px;
    font-weight: bold;
}
.form-signin .form-control:focus {
  z-index: 2;
}
</style>
</head>
<body class="text-center">

<div class="login-form">
    <form method="post" class="form-signin">
        <h2 class="text-center">Log in</h2>
        <div class="form-group">
          <label for="correo">Usuario</label>
          <input id="correo" type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input id="password" type="password" name="password" class="form-control">
        </div>
        <div class="card-action">
          <input type="submit" name="Entrar" value="Entrar" class="btn btn-danger" style="width: 100%;">
        </div>
    </form>
    <p class="text-center"><a href="#">Create an Account</a></p>
</div>
</body>
</html>
