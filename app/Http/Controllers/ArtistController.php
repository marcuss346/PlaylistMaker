<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\artist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Artists.showArtists", [
            'artists' => artist::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Artists.newArtist");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'birth_date' => 'required|date_format:Y-m-d',
        ]);

        $art = artist::create([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'birth_date' => $request->input('birth_date'),
        ]);

        if($art) {
            return redirect()->route('artists')->with('success', 'Artist created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create artist.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artist = artist::find($id);
        if ($artist) {
            $artist->delete();
            return redirect()->route('artists')->with('success', 'Artist deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Artist not found.');
        }
    }
}
