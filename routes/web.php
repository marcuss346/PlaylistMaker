<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\SongsController;

Route::get("/", function () {
    return view("welcome");
})->name("home");

Route::get("/login", [UserController::class, "loginForm"])->name("loginForm");
Route::post("/login", [UserController::class, "loginUser"])->name("login");

Route::get("/register", [UserController::class, "registerForm"])->name("registerForm");
Route::post("/register", [UserController::class, "registerUser"])->name("registerUser");



Route::middleware(['auth'])->group(function () {
    Route::get("/dashboard", function () {
        return view("Loggedin.dashboard", [
            'user' => auth()->user(),
            'playlists' => auth()->user()->playlists()->get(),
        ]);
    })->name("dashboard");
    Route::get("/newPlaylists", [PlaylistController::class, "create"])->name("createPlaylist");
    Route::post("/newPlaylists", [PlaylistController::class, "store"])->name("storePlaylist");
    Route::get("/editPlaylist/{id}", [PlaylistController::class, "edit"])->name("editPlaylist");
    Route::put("/editPlaylist/{id}", [PlaylistController::class, "update"])->name("updatePlaylist");
    Route::delete("/deletePlaylist/{id}", [PlaylistController::class, "destroy"])->name("deletePlaylist");

    Route::get("/artists", [ArtistController::class, "index"])->name("artists");
    Route::get("/newArtist", [ArtistController::class, "create"])->name("newArtist");
    Route::post("/newArtist", [ArtistController::class, "store"])->name("storeArtist");
    Route::delete("/deleteArtist/{id}", [ArtistController::class, "destroy"])->name("deleteArtist");

    Route::get("/songs", [SongsController::class, "index"])->name("songs.songs");
    Route::get("/newSong", [SongsController::class, "create"])->name("songs.create");
    Route::post("/newSong", [SongsController::class, "store"])->name("songs.store");

    Route::post("/logout", [UserController::class, "logout"])->name("logout");

   

});

Route::get("/", [PlaylistController::class, "publicPlaylists"])->name("publicPlaylists");

Route::get("/viewPlaylist/{id}",[PlaylistController::class, "show"])->name("viewPlaylist");