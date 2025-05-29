<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <x-navbar />
    <h1>Add a new Artist</h1>
    <form action="{{ route('newArtist') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required>

       
        <label for="birth_date">Date of Birth:</label>
        <input type="date" id="birth_date" name="birth_date" required>
        
        <button type="submit">Add Artist</button>
    </form>
    <p>Go back to <a href="{{ route('artists') }}">All Artists</a></p>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>