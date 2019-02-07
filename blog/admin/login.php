
<?php 
  include '../lib/Session.php';
  Session::checklogin();
?>

<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/formate.php';?>
<?php 
      $db = new Database();
      $fm = new Formate();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" ">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {
  border: 3px solid #f1f1f1;
  width: 380px;
  /* align-content: center; */
  margin-left: 328px;
  margin-top: 50px;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>

<body>

   <!-- <h2>Login Form</h2> -->
   
 

<form action="login.php" method="post">
  <div class="imgcontainer">

 <?php
      if($_SERVER['REQUEST_METHOD']== 'POST'){
      $username = $fm->validation($_POST['username']);
      $password = $fm->validation(md5($_POST['password']));

      $username = mysqli_real_escape_string($db->link, $username );
      $password = mysqli_real_escape_string($db->link, $password );

      $query = "Select* FROM tbl_user WHERE username ='$username' AND password ='$password'";
      $result = $db->select($query);
      if( $result !=false){
      $value = mysqli_fetch_array($result);
      $row = mysqli_num_rows($result);
      if($row > 0){
           Session::set("login", true);
           Session::set("username", $value['username']);
           Session::set("userId", $value['id']);
           header("Location:index.php");
    }else{
      echo "<span style='color: red;font-size: 18px'>No result found!!</span>>";
  }
    }else{
    echo "<span style='color: red;font-size: 18px'>User name or password not matched !!</span>>";
  }
    }
 ?> 
    
    <h2>Login</h2>
   <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>

</html>


