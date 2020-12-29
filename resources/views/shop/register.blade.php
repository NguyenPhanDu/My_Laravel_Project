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
        <form action="{{route('userPostRegister')}}" method="post">
        @if (session('status'))
         <ul>
             <li class="text-danger"> {{ session('status') }}</li>
         </ul>
        @endif

        @if (session('registerError'))
         <ul>
             <li class="text-danger"> {{ session('registerError') }}</li>
         </ul>
        @endif
            {{ csrf_field() }}
            <div class="txt_field">
                <input type="text" name="txtEmail" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="text" name="txtUsename" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="txtPassword" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="txtConfirmPassword" required>
                <span></span>
                <label>Confirm password</label>
            </div>
            <input type="submit" value="Register">
            <div class="signup_link">
                Is a member? <a href="{{route('userGetLogin')}}">Sign in</a>
            </div>
        </form>
    </div>
</body>
</html>