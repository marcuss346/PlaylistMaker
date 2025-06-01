<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/layout.css'])
</head>
<body>
    <div id="navBarr">
        <x-navbar />
    </div>
    <div id="content" class="content">
        <h1>Add New Song</h1>
        <form action="{{ route('songs.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="artist">Artist:</label>
                <select id="artist" name="artist" required>
                    <option value="">Select Artist</option>
                    @foreach ($artists as $artist)
                        <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Add Song</button>
        </form>
        <br />
        <a href="{{ route('songs.songs') }}">Back to Song List</a>
        @if ($errors->any())
            <div>
                <h2>Errors:</h2>
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

input[type="text"],
select {
  width: 100%;
  padding: 0.5em;
  margin-top: 0.3em;
  border: none;
  border-radius: 6px;
  font-size: 1em;
  box-sizing: border-box;
}

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

button:hover {
  background-color: #ddd;
}
</style>