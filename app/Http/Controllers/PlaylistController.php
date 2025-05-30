<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Song;


class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function publicPlaylists()
    {
       $playlists = Playlist::where('is_public', true)->get();
        return view('publicPlaylists', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Loggedin.createPlaylist');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'public' => 'boolean',
        ]);

        $playlist = Playlist::create([
            'name' => $request->input('name'),
            'user_id' => auth()->id(),
            'is_public' => $request->input('public', false),
        ]);

       
        if ($playlist){
            return redirect()->route('editPlaylist', ['id' => $playlist->id])
                ->with('success', 'Playlist created successfully!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to create playlist.']);
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $playlist = playlist::findOrFail($id);
        $songs = $playlist->songs()->get();

        if($playlist){
            return view('viewPlaylist', [
                'playlist' => $playlist,
                'songs' => $songs,
            ]);
        } else {
            return redirect()->route('dashboard')->withErrors(['error' => 'Playlist not found.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $playlist = Playlist::findOrFail($id);
        if (Auth::user()->id !== $playlist->user_id) {
            return redirect()->route('publicPlaylists')->withErrors(['error' => 'You do not have permission to edit this playlist.']);
        }

        return view('Loggedin.editPlaylist', [
            'playlist' => $playlist,
            'songs' => Song::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_public' => 'boolean',
            'songs' => 'array',
        ]);

        $playlist = Playlist::findOrFail($id);
        if (Auth::user()->id !== $playlist->user_id) {
            return redirect()->route('publcPlaylists')->withErrors(['error' => 'You do not have permission to update this playlist.']);
        }

        $playlist->update([
            'name' => $request->input('name'),
            'is_public' => $request->input('is_public', false),
        ]);

        // Sync songs if provided
        if ($request->has('songs')) {
            $playlist->songs()->sync($request->input('songs'));
        }

        return redirect()->route('viewPlaylist', ['id' => $playlist->id])
            ->with('success', 'Playlist updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $playlist = Playlist::findOrFail($id);
        if (Auth::user()->id !== $playlist->user_id) {
            return redirect()->route('publicPlaylists')->withErrors(['error' => 'You do not have permission to delete this playlist.']);
        }

        $playlist->delete();

        return redirect()->route('dashboard')->with('success', 'Playlist deleted successfully!');
    }
}
