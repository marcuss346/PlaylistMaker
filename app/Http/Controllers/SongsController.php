<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\artist;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::with('artist')->get(); // Eager load the artist relationship to avoid N+1 query problem
        return view('Songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $arists = artist::all();
        return view('Songs.create', [
            'artists' => $arists,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|exists:artists,id',
        ]);

        $song = Song::create([
            'title' => $request->input('title'),
            'artist_id' => $request->input('artist'),
        ]);
       
        if($song) {
            return redirect()->route('songs.songs')->with('success', 'Song created successfully!');
        } else {
            // Handle the case where the song creation failed
            return redirect()->back()->with('error', 'Failed to create song.');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
