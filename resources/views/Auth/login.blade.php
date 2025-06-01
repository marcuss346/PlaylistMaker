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
<div id="content" class="content">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{old('email')}}" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="{{old('password')}}" required>
        
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="{{ route('registerForm') }}">Register</a></p>
    </form>
        
        @if ($errors->any())
            <div class="alert">
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

<style>
.alert{
    color: red;
}
.content{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
}

form {
  background-color: #333;
  padding: 2em;
  border-radius: 12px;
  width: 300px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

form > label {
  display: block;
  margin-top: 1em;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="submit"],
button {
  width: 100%;
  padding: 0.6em;
  margin-top: 0.3em;
  border: none;
  border-radius: 6px;
  font-size: 1em;
  box-sizing: border-box;
}

input[type="submit"],
button {
  margin-top: 1.2em;
  background-color: white;
  color: black;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover,
button:hover {
  background-color: #ddd;
}

p {
  margin-top: 1em;
  text-align: center;
}

a {
  color: #66b3ff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
</style>