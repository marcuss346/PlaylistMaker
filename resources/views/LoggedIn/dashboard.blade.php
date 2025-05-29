<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <x-navbar />
    <h1>Welcome to the Dashboard</h1>
    <p>You are logged in!</p>
    <p>Here are your details:</p>
    <ul>
        <li>Name: {{ Auth::user() -> name }}</li>
        <li>Email: {{ Auth::user() -> email}}</li>
    </ul>

    <p>Here are your playlists:</p>
    <ul>
        @foreach ($playlists as $playlist)
            <li>
                <a href="{{ route('viewPlaylist', ['id' => $playlist->id]) }}">{{ $playlist->name }}</a>
                @if ($playlist->is_public)
                    <span>(Public)</span>
                @else
                    <span>(Private)</span>
                @endif
            </li>
        @endforeach
    </ul>

    <p><a href="{{ route('createPlaylist') }}">Create a new playlist</a></p>
            
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
</body>
</html>