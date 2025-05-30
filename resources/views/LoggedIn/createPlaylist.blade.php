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