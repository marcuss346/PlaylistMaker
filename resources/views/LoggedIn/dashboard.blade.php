<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/layout.css')
</head>
<body>
    <div id="navBarr">
        <x-navbar />
    </div>
    <div id="content" class="content">
        
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
                            <div>
                                <form action="{{ route('deletePlaylist', $playlist->id) }}"  method="POST" onsubmit="return confirms('{{$playlist->name }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-button">Delete</button>
                                    <button type="button" class="rounded-button2" onclick="window.location.href='{{ route('editPlaylist', $playlist->id) }}'">Edit</button>
                                </form>
                                <script>
                                    function confirms(playlistName) {
                                        return confirm('Are you sure you want to delete the playlist: ' + playlistName + '?');
                                    }
                                </script>
                                
                            </div>
                            
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

    .rounded-button {
      background: linear-gradient(135deg,rgb(236, 13, 13),rgb(176, 4, 4));
      color: white;
      border: none;
      padding: 12px 28px;
      font-size: 13px;
      border-radius: 30px;
      cursor: pointer;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .rounded-button:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
      transform: translateY(-2px);
    }

    .rounded-button2 {
      background: linear-gradient(135deg, #4facfe, #00f2fe);
      color: white;
      border: none;
      padding: 12px 28px;
      font-size: 13px;
      border-radius: 30px;
      cursor: pointer;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .rounded-button2:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
      transform: translateY(-2px);
    }


</style>