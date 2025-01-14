<?php
    include "service/database.php";
    session_start();

    $login_message = "";

    if (isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hash_password = hash("sha256", $password);

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$hash_password'";
        
        $result = $db->query($sql);

        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;

            header("location: dashboard.php");

        }else {
            $login_message = "Account can't be found";
        }
        $db->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Kita | Log In</title>
    <link rel="stylesheet" href="stylesheet/style.css">
</head>
<body>
    <div class="wrapper">
    <i><?= $login_message ?></i>

    <form action="login.php" method="POST">
        <h2>Log In Account</h2>
        <div class="input-field">
            <input type="text" required name="username"/>
            <label>Username</label>
        </div>
        <div class="input-field">
            <input type="password" required name="password"/>
            <label>Password</label>
        </div>
        <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
        </div>
        <button type="submit" name="login">Log In Now</button>
        <div class="register">
        <p>Don't have an account? <a href="register_admin.php">Register</a></p>
        <p>Back to Homepage? <a href="index.php?page=home">Main Menu</a></p>
      </div>
    </form>
    </div>

</body>
</html>