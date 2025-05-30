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
        <h1> Here you can see all public playlists</h1>
        <div class="container">
            @if($playlists->isEmpty())
                <p>No public playlists available.</p>
            @else
                <ul>
                    @foreach($playlists as $playlist)
                        <li>
                            <a href="{{ route('viewPlaylist', $playlist->id) }}">{{ $playlist->name }}</a>
                            <span>by {{ $playlist->user->name }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <p><a href="{{ route('dashboard') }}">Back to your account</a></p>  
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