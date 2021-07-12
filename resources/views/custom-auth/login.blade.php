<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('public/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Admin Login </title>
</head>
<body>
    <div class='bold-line'></div>
    <div class='container'>
        <div class='window'>
            <div class='overlay'></div>
            <div class='content'>
                
                <form action="{{route('check-credentials')}}" method="POST">
                    @csrf
                    <div class='welcome'>Login</div>
                    @if(Session::has('message'))
                    <p><span class="badge badge-success">{{Session::get('message')}}</span></p>
                    @endif
                    <div class='input-fields'>
                        <input type='email' name="email" placeholder='Email' class='input-line full-width' value="{{old('email')}}">
                        @error('email')
                        <p><span><small class="text text-danger">{{$message}}</small></span></p>
                        @enderror
                        <input type='password' name="password" placeholder='Password' class='input-line full-width'>
                        @error('password')
                        <p><span><small class="text text-danger">{{$message}}</small></span></p>
                        @enderror
                    </div>
                    <div><button type="submit" class='ghost-round full-width'>Login</button></div>
                </form>
                <div> <a href="{{route('admin-register')}}"><button class='ghost-round full-width'>Register</button></a></div>
            </div>
        </div>
    </div>
</body>
</html>