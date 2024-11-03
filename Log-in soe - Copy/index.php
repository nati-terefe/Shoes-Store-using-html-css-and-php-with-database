<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="index.css">
    <title>Shoe X Sign In</title>
</head>

<body>
    <div class="container">
        <div class="signin-signup">
            <form action="signin.php" class="sign-in-form" method="POST">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password">
                </div>
                <input type="submit" value="Login" class="btn">
                <input type="button" value="Browse" class="btn" id="browse-btn" onclick="nonloginstart()">
                <!-- <p class="social-text">Or Sign in with social platform</p> -->
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form>
            <form action="" class="sign-up-form" method="POST">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Full name" name="fullname" id="fullname">
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="username" id="username">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email" id="email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" id="password">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder=" Confirm Password" name="confirmpassword">
                </div>
                <input type="submit" value="Sign up" class="btn">
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Member of Brand?</h3>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
                <!-- <img src="image 6.png" alt="" class="image"> -->
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Shoe X</h3>
                    <p>Step into happiness with our smile-inducing shoes! Experience the joy of every stride.</p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="app.js"> </script>
</body>

</html>