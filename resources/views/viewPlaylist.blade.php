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
    <h1>Song List on playlist: {{$playlist->name}}</h1>
    <ul>
        @foreach ($songs as $song)
            <li>{{ $song->title }} by {{ $song->artist->name }}</li>
        @endforeach
    </ul>

    
    <a href="{{ route('publicPlaylists') }}">Back to public Playlist List</a>
    |
    <a href="{{ route('editPlaylist', $playlist->id) }}">Edit Playlist</a>

    </div>

    <div id="footer">
        <x-footer />
    </div>
</body>
</html>