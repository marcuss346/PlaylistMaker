<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/layout.css'])
</head>
<body>
<div id="navBarr">
    <x-navbar />
</div>
<div id="content">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{old('email')}}" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="{{old('password')}}" required>
        
        <button type="submit">Login</button>
    </form>
        <p>Don't have an account? <a href="{{ route('registerForm') }}">Register</a></p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
   
</div>
<div id="footer">
    <x-footer />
</div>
</body>
</html>