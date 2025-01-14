<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toko Kita | Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="loginout_styles.css">
</head>
<body>
    <div class="container">
        <div class="form signup">
            <h2>Sign Up</h2>
            <div class="inputBox">
                <input type="text" required="required">
                <i class="fa-regular fa-user"></i>
                <span>username</span>
            </div>
            <div class="inputBox">
                <input type="text" required="required">
                <i class="fa-regular fa-envelope"></i>
                <span>email address</span>
            </div>
            <div class="inputBox">
                <input type="password" required="required">
                <i class="fa-solid fa-lock"></i>
                <span>create password</span>
            </div>
            <div class="inputBox">
                <input type="password" required="required">
                <i class="fa-solid fa-lock"></i>
                <span>confirm password</span>
            </div>
            <div class="inputBox">
                <input type="submit" value="Create Account">
            </div>
            <p>Already a member ? <a href="#" class="login">Log in</a></p>
        </div>
        
        <div class="form signin">
            <h2>Sign In</h2>
            <div class="inputBox">
                <input type="text" required="required">
                <i class="fa-regular fa-user"></i>
                <span>username</span>
            </div>
            <div class="inputBox">
                <input type="password" required="required">
                <i class="fa-solid fa-lock"></i>
                <span>password</span>
            </div>
            <div class="inputBox">
                <input type="submit" value="Login">
            </div>
            <p>Not Registered ? <a href="#" class="create">Create an account</a></p>
        </div>

    </div>

    <script>
        let login = document.querySelector('.login');
        let create = document.querySelector('.create');
        let container = document.querySelector('.container');

        login.onclick = function(){
            container.classList.add('signinForm');
        }
        
        create.onclick = function(){
            container.classList.remove('signinForm');
        }
    </script>
</body>
</html>