<?php
    include "service/database.php";
    session_start();

    $register_message = "";

    if (isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

    if(isset($_POST['register'])) {
        $username = $_POST['username'];
        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $password = $_POST['password'];

        $hash_password = hash("sha256", $password);

        try {
            $sql = "INSERT INTO users (username, name, email, password) VALUES ('$username', '$name', '$email', '$hash_password')";

            if($db->query($sql)) {
                $register_message = "Sign Up Successfully, Log In Now";
            } else {
                $register_message = "Sign Up Failed";
            }
        } catch (mysqli_sql_exception) {
            $register_message = "Username has been taken";
        }
        $db->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Kita | Register</title>
    <link rel="stylesheet" href="stylesheet/style.css">
</head>
<body>
    <div class="wrapper">
    <i><?= $register_message ?></i>

    <form action="register.php" method="POST">
    <h2>Sign Up Account</h2>
        <div class="input-field">
            <input type="text" name="username"/>
            <label>Create your username</label>
        </div>
        <div class="input-field">
            <input type="text" name="name"/>
            <label>Enter your name</label>
        </div>
        <div class="input-field">
            <input type="text" name="email"/>
            <label>Enter your email</label>
        </div>
        <div class="input-field">
            <input type="password" name="password"/>
            <label>Create your password</label>
        </div>
        <button type="submit" name="register">Sign Up Now</button>
        <div class="register">
        <p>Already a member? <a href="login.php?page=login">Log In</a></p>
        <p>Back to Homepage? <a href="index.php?page=home">Main Menu</a></p>
      </div>
    </form>
    </div>

</body>
</html>