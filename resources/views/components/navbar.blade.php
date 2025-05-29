<nav class="bg-gray-800 p-4 text-white">
    <div class="container mx-auto flex justify-between" id="navBar">
        <a href="" class="font-bold">MyApp</a>
        <ul class="flex space-x-4">
            <li><a href="{{route('publicPlaylists')}}" class="hover:underline">Public Playlists</a></li>
            @auth
                <li><a href="{{route('dashboard')}}" class="hover:underline">My Profile</a></li>
                <li><a href="{{route('artists')}}" class="hover:underline">Artists</a></li>
                <li><a href="{{route('songs.songs')}}" class="hover:underline">Songs</a></li>
            @endauth

            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
            @endguest

            @auth
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
    height: 200px;
    grid-area: nav;
    background-color: #444;
    color: white;
    padding: 10px;
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
</style>