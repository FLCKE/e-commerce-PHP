<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .signup-form {
            width: 400px;
            margin: 0 auto;
            padding: 30px 0;
        }

        .signup-form h2 {
            color: #333;
            margin: 0 0 30px;
            display: inline-block;
            border-bottom: 2px solid #5e72e4;
            padding-bottom: 10px;
        }

        .signup-form form {
            color: #999;
            border-radius: 10px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .signup-form .form-group {
            margin-bottom: 20px;
        }

        .signup-form input[type="email"],
        .signup-form input[type="password"] {
            font-size: 16px;
            height: 45px;
            padding: 0 10px;
            margin-bottom: 25px;
            border: 1px solid #ddd;
            border-radius: 25px;
            width: calc(100% - 20px);
            display: inline-block;
        }

        .signup-form label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
        }

        .signup-form label i {
            margin-right: 8px;
        }

        .signup-form button[type="submit"] {
            font-size: 16px;
            background: #5e72e4;
            color: #fff;
            border-radius: 25px;
            padding: 12px 20px;
            border: none;
        }

        .signup-form button[type="submit"]:hover {
            background: #4d5bf7;
        }

        .signup-form a {
            color: #5e72e4;
        }

        .signup-form a:hover {
            text-decoration: underline;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="signup-form">
        <form action="loginProcess.php" method="post" enctype="multipart/form-data">
            <h2>Login</h2>
            <p class="hint-text">Enter Login Details</p>
            <div class="form-group">
                <label for="email"><i class="fa fa-envelope"></i>Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <label for="password"><i class="fa fa-lock"></i>Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="pass" id="password" placeholder="Password" required="required">
                    <div class="input-group-append">
                        <span class="input-group-text" id="togglePassword">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Login</button>
            </div>
            <div class="form-group">
                <a href="forgot_password.php">Forgot Password?</a>
            </div>
            <div class="text-center">Don't have an account? <a href="register.php">Register Here</a></div>
        </form>
    </div>

    <script>
        document.getElementById("togglePassword").addEventListener("click", function() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });
    </script>
</body>
</html>
