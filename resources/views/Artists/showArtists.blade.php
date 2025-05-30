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
        <h1> All Artists</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Date of Birth</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artists as $artist)
                    <tr>
                        <td>{{ $artist->name }}</td>
                        <td>{{ $artist->country }}</td>
                        <td>{{ $artist->birth_date }}</td>
                        <td>
                            <form action="{{ route('deleteArtist', ['id' => $artist->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <h2><a href="{{route('newArtist')}}">Add a new Artist</h2>
    </div>
    <div id="footer">
        <x-footer />
    </div>
</body>
</html>