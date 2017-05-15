<?php
include('db.php');

$login = $_POST['login'];
$pwd = $_POST['pwd'];
session_start();
setcookie('admin','7890');

$_SESSION['log'] = false;

if($_SESSION['log'] == false){
  $query = mysqli_query($bdd,'SELECT * FROM users WHERE users_login ="'.$_POST['login'].'" AND users_pass = PASSWORD("'.$_POST['pwd'].'")');
    $result = mysqli_fetch_assoc($query);


    if(mysqli_num_rows($query) >= 1)
      {
        setcookie('admin','3105',(time()+(3600)*24*7));
        $_SESSION['log'] = true;
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['pwd'] = $_POST['pwd'];
        header('Location: admin.php');
      }

    }


 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="admin" action="co_admin.php" method="post">
      <input type="text" name="login" placeholder="Login"></input>
      <input type="password" name="pwd" placeholder="Password"></input>
      <button type="submit" name="submit">OK</button>
    </form>
  </body>
</html>
