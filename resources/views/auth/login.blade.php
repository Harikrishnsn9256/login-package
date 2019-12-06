<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{asset('login/login/style.css')}}">
</head>
<body>

<form id="login" action="{{ route('admin') }}" method="post">
    {{csrf_field()}}


    <h1>Log In</h1>
    <fieldset id="inputs">
        <input id="username" name="email" type="text" placeholder="Email" autofocus required>
        <input id="password" name="password" type="password" placeholder="Password" required>
    </fieldset>
    @if( $errors->first() )
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <fieldset id="actions">
        <input type="submit" id="submit" value="Log in">

    </fieldset>

</form>


</body>
</html>
