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
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($songs as $song)
                    <tr>
                        <td>{{ $song->title }}</td>
                        <td>{{ $song->artist->name }}</td>
                        <td>
                            <form action="{{ route('songs.delete', ['id' => $song->id]) }}" method="POST" style="display:inline;" onsubmit="return confirms('{{ $song->title }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-button">Delete</button>
                            </form>
                            <script>
                                    function confirms(playlistName) {
                                        return confirm('Are you sure you want to delete the song: ' + playlistName + '? SONG WILL BE REMOVED FROM PLAYLISTS!');
                                    }
                                </script>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br />
        
        <a href="{{ route('songs.create') }}">Add New Song</a>
    </div>
    <div id="footer">
        <x-footer />
    </div>
</body>
</html>

<style>

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