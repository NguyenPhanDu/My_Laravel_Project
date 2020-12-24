<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{!! asset('auth/login.css')!!}">
    <title>Document</title>
</head>
<body class="login_body">
    <div class="center">
        <h1>Login</h1>
        <form action="{{route('postLogin')}}" method="post">
        @if (count($errors) >0)
         <ul>
             @foreach($errors->all() as $error)
                 <li class="text-danger"> {{ $error }}</li>
             @endforeach
         </ul>
     @endif

     @if (session('status'))
         <ul>
             <li class="text-danger"> {{ session('status') }}</li>
         </ul>
     @endif
            {{ csrf_field() }}
            <div class="txt_field">
                <input type="text" name="txtEmail" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="txtPassword" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">Forgot password?</div>
            <input type="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="#">Sign up</a>
            </div>
        </form>
    </div>
</body>
</html>