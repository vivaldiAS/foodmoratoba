<?php 
session_start();
if(isset($_SESSION['sedang-login'])){
  header('Location: index.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login admin</title>
    <link rel="icon" href="../img/logo2.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .srouce{
            text-align: center;
            color: #ffffff;
            padding: 10px;
        }
    </style>
</head>
<body>

    <div class="main-container">
        <div class="form-container">

      

            <div class="form-body">
                <center><img src="../img/logo.png" style="width:100px;" ></center>
                <br>
                <h1 class="title"><b>Masuk</b></h1><br>
                <div>
                <?php if(isset($_SESSION['gagal'])){ ?>
                  <div style="background-color: #F6D9D8; color:#6E211E; padding:1rem;">
                    Username atau password salah
                    <br>
                  </div>
                <?php
                  unset($_SESSION['gagal']);
                } ?>
                </div>
            
                <form action="login_proses.php" method="POST"  class="the-form">

                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Masukkan username anda">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password anda">

                      <input type="submit" name="login" value="Masuk">

                </form>




            </div><!-- FORM BODY-->
            <center><a href="../index.php" style="color:whitesmoke;">
            <br>
            Kembali ke halaman website
            </a></center>
        </div><!-- FORM CONTAINER -->
        
    </div>
   

</body>
</html>

<style>
    *,
*::before,
*::after {
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
}

body {
  margin: 0;
  padding: 0;
  color: #222222;
  background:linear-gradient(to bottom, orangered, orange);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  background-attachment: fixed;
  padding: 20px;
  overflow-x: hidden;
}

body,
input,
button {
  font-family: "Muli", sans-serif, -apple-system, BlinkMacSystemFont,
    "Helvetica Neue", Helvetica, sans-serif;
  outline: none;
}

.main-container {
  max-width: 900px;
  margin: 0 auto;
}

a {
  color: inherit;
  outline: none;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

.form-container {
  max-width: 450px;
  margin: 0 auto;
}

.form-body {
  background: whitesmoke;
  overflow: hidden;
  padding: 30px;
  color: #333;
  border-radius: 3px;
  -webkit-box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3),
    0 10px 10px -5px rgba(0, 0, 0, 0.2);
}

@media only screen and (max-width: 500px) {
  .form-body {
    padding: 50px 40px;
  }
}

@media only screen and (max-width: 455px) {
  .form-body {
    padding: 45px 30px;
  }
}

@media only screen and (max-width: 340px) {
  .form-body {
    padding: 30px 20px;
  }
}

.form-body .title {
  margin: 0;
  text-align: center;
  font-weight: normal;
}

.social-login ul {
  list-style-type: none;
  margin: 30px 0;
  padding: 0;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}

.social-login ul li {
  -webkit-box-flex: 1;
  -ms-flex: 1 auto;
  flex: 1 auto;
}

.social-login ul li a {
  background-color: #56385a;
  border-radius: 3px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  width: 100%;
  height: 100%;
  padding: 15px;
  color: #e6e6e6;
  font-weight: bold;
  text-decoration: none;
  -webkit-transition: background-color 0.3s;
  transition: background-color 0.3s;
}

.social-login ul li a::before {
  content: "";
  width: 30px;
  height: 30px;
  background-repeat: no-repeat;
  background-position: center;
  background-size: 30px;
  margin-right: 5px;
}

.social-login ul li a:hover {
  background-color: #fff199;
  color: #0e090e;
  -webkit-box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
    0 4px 6px -2px rgba(0, 0, 0, 0.05);
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
    0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

li.google {
  margin-right: 10px;
}

li.google a::before {
  background-image: url("../images/google.png");
}

li.fb {
  margin-left: 10px;
}

li.fb a::before {
  margin: 0;
  background-image: url("../images/fb.png");
}

@media only screen and (max-width: 400px) {
  .social-login ul {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
  }

  li.google,
  li.fb {
    margin: 0;
  }

  li.google {
    margin-bottom: 10px;
  }
}

._or {
  text-align: center;
  margin-bottom: 20px;
  color: #d9d9d9;
}

.the-form {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}

.the-form label {
  margin-bottom: 5px;
  color: #333;
  font-weight: bold;
}

.the-form [type="text"],
.the-form [type="password"] {
  padding: 15px;
  font-size: 16px;
  background: white;
  border: 1px solid grey;
  border-radius: 3px;
  margin-bottom: 15px;
  -webkit-transition: background 0.3s;
  transition: background 0.3s;
  color: #333;

}

  

.the-form [type="submit"] {
  background: #ffb37b;
  border: 1px solid rgba(0, 0, 0, 0.1);
  padding: 18px;
  font-size: 20px;
  border-radius: 3px;
  cursor: pointer;
  margin-top: 20px;
  color: black;
  -webkit-box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
    0 2px 4px -1px rgba(0, 0, 0, 0.06);
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
    0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.the-form [type="submit"]:hover {
  opacity: 0.9;
  border: 1px solid #333;
}

.form-footer div {
  text-align: center;
  padding: 25px 20px;
  font-size: 18px;
  color: #e6e6e6;
}

.form-footer div a {
  color: #ffb37b;
}
</style>