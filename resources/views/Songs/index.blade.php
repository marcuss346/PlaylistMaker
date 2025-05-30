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
        <h1>Song List</h1>
        <ul>
            @foreach ($songs as $song)
                <li>{{ $song->title }} by {{ $song->artist->name }}</li>
            @endforeach
        </ul>
        <a href="{{ route('songs.create') }}">Add New Song</a>
    </div>
    <div id="footer">
        <x-footer />
    </div>
</body>
</html>