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
    </div>
    <div id="footer">
        <x-footer />
    </div>

</body>
</html>