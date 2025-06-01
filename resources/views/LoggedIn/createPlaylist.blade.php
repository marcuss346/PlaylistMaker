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
        <form method="POST" action="{{ route('createPlaylist') }}">
            @csrf
            <label for="name">Playlist Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="public">Public:</label>
            <input type="checkbox" id="public" name="public" value="1">
        
            <button type="submit">Create Playlist</button>
        </form>

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

<style>
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
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
}

label {
  display: block;
  margin-top: 1em;
  font-weight: bold;
}

input[type="text"] {
  width: 100%;
  padding: 0.5em;
  margin-top: 0.3em;
  border: none;
  border-radius: 6px;
  font-size: 1em;
  box-sizing: border-box;
}

input[type="checkbox"] {
  margin-top: 0.5em;
  transform: scale(1.2);
}

input[type="submit"],
button {
  margin-top: 1.5em;
  width: 100%;
  padding: 0.6em;
  background-color: white;
  color: black;
  border: none;
  border-radius: 6px;
  font-size: 1em;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover,
button:hover {
  background-color: #ddd;
}
</style>