<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{!! asset('auth/login.css')!!}">
</head>
<body class="login_body">
    <div class="center">
        <h1>Register</h1>
        <form action="post">
            <div class="txt_field">
                <input type="text" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="text" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="password" required>
                <span></span>
                <label>Confirm password</label>
            </div>
            <input type="submit" value="Register">
            <div class="signup_link">
                Is a member? <a href="#">Sign in</a>
            </div>
        </form>
    </div>
</body>
</html>