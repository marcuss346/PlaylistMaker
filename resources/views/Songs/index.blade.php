<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <x-navbar />
    <h1>Song List</h1>
    <ul>
        @foreach ($songs as $song)
            <li>{{ $song->title }} by {{ $song->artist->name }}</li>
        @endforeach
    </ul>
    <a href="{{ route('songs.create') }}">Add New Song</a>
</body>
</html>