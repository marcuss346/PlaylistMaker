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
        
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <p>Here you can manage your playlists.</p>

        <p>Here are your playlists:</p>
        <table>
            <thead>
                <tr>
                    <th>Playlist Name</th>
                    <th>Publicity</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->playlists as $playlist)
                    <tr>
                        <td>{{ $playlist->name }}</td>
                        <td>@if($playlist->is_public)
                                Public
                            @else
                                Private
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('deletePlaylist', $playlist->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                                <a href="{{ route('viewPlaylist', $playlist->id) }}">View</a>
                            </form>
                            
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="footer">
        <x-footer />
    </div>

</body>
</html>

<style>
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: black;
    }

</style>