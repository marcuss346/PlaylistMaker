<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'artist_id',
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function playlists()
    {
        return $this->belongsToMany(playlist::class, 'song_on_playlisies');
    }
}
