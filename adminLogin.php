<?php
error_reporting(0);
ini_set('display_errors', 0);

include("function.php") ;
session_start();
connectme() ;

    $username = $_POST['adminUser'];
    $password = $_POST['adminPass'];
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    $result = mysql_query("select * from pesoadmin where adminUName = '$username' and adminPass = '$password'") or die("Failed to query database ".mysql_error());
    $row = mysql_fetch_array($result);

    if(!empty($username) && !empty($password)) {

      if($row['adminUName'] == $username && $row['adminPass'] == $password) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            header("Location: adminIndex.php?id=$username");
            die();
      }else {
        echo 'incorrect username/password combination';
      }
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>
    Admin Login Page
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sampleStyle.css">
</head> 
<body>
    <div class="form-group">
    <div class="container">
        <!-- <form action="adminLoginProccess.php" method="POST"> -->
        <form method="post" class="form-signin">
        <div class="form-row">
        <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                <center><img class="img-fluid" src="peso_logo.png">
                <br>
                <h5>PESO Admin Login Page</h5></center>
            </div>
        </div>
            <label for="adminUser">Username:</label>
            <input type="text" class="form-control" name="adminUser">
            <br>
            <label for="adminPass">Password:</label>
            <input type="password" id="inputPassword" name="adminPass" class="form-control" required>
            <br>
            <center><button name="login" id="submit" type="submit">Sign in</button></center>
        </div>
        </div>
        </form>
    </div>
    </div>
    
    <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
</body>
</html>
