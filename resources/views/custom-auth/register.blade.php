<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('public/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Admin Register</title>
</head>
<body>
    <div class='bold-line'></div>
    <div class='container'>
        <div class='window'>
            <div class='overlay'></div>
            <div class='content'>
                <form action="{{route('save-user')}}" method="POST">
                    @csrf
                    <div class='welcome'>Register New Account</div>
                    <div class='input-fields'>
                        <input type='text' name="name" placeholder='Full Name' class='input-line full-width' value="{{old('name')}}">
                        @error('name')
                        <p><small class="text text-danger">{{$message}}</small></p>
                        @enderror
                        <input type='email' name="email" placeholder='Email' class='input-line full-width' value="{{old('email')}}">
                        @error('email')
                        <p><small class="text text-danger">{{$message}}</small></p>
                        @enderror
                        <input type='password' name="password" placeholder='Password' class='input-line full-width'>
                        @error('password')
                        <p><small class="text text-danger">{{$message}}</small></p>
                        @enderror
                    </div>
                    <div><button type="submit" class='ghost-round full-width'>Register</button></div>
                </form>
                <small >Already Have an Account ?</small>
                <div> <a href="{{route('admin-login')}}"><button class='ghost-round full-width'>Login</button></a></div>
            </div>
        </div>
    </div>
</body>
</html>