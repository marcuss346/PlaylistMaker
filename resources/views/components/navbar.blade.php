<nav class="bg-gray-800 p-4 text-white">
    <div class="container mx-auto flex justify-between" id="navBar">
        <p class="main">Music connector</p>
        <ul id="as">
            <li><a href="{{route('publicPlaylists')}}" class="underline">Public Playlists</a></li>
            @auth
                <li><a href="{{route('dashboard')}}" class="underline">My Profile</a></li>
                <li><a href="{{route('artists')}}" class="underline">Artists</a></li>
                <li><a href="{{route('songs.songs')}}" class="underline">Songs</a></li>
            @endauth

            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
            @endguest

            @auth
                <li>
                    <a href="{{ route('createPlaylist') }}" class="hover:underline">Create Playlist</a>
                </li>
                <li>
                   <a href="*"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout ({{ Auth::user()->name }})
                    </a>
                </li>
            @endauth
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>

<style>
   #navBar {
    height: auto;
    grid-area: nav;
    background-color: #444;
    color: white;
    padding: 40px;
    text-align: center;
}

#navBar ul {
    list-style-type: none;
    padding: 0;
}

#navBar a {
    text-decoration: none;
    color: white;
}



#navBar a:hover {
    color: red;
    text-decoration: underline;
}

li{
    padding: 5px;
}

.main{
    font: bold 2em Arial, sans-serif;
}
</style>