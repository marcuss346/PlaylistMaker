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
        <h1>Edit Playlist</h1>
        <form action="{{ route('updatePlaylist', $playlist->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div>
                <label for="name">Playlist Name:</label>
                <input type="text" id="name" name="name" value="{{ $playlist->name }}" required>
            </div>

            <div>
                <label for="is_public">Is Public:</label>
                <input type="checkbox" id="is_public" name="is_public" 
                    @if($playlist->is_public) checked @endif value="1">

            </div>

            <div>
                <label for="songs">Songs:</label>
                <select id="songs" name="songs[]" multiple required>
                    @foreach ($songs as $song)
                        <option value="{{ $song->id }}" 
                            @if($playlist->songs->contains($song)) selected @endif>
                            {{ $song->title }} by {{ $song->artist->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Update Playlist</button>
        </form>

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
  width: 320px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
}

h1 {
  margin-top: 0;
  text-align: center;
  font-size: 1.8em;
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