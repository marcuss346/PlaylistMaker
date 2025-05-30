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