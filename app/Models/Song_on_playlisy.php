<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song_on_playlisy extends Model
{
    use HasFactory;

    protected $fillable = [
        'song_id',
        'playlist_id',
    ];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }

    public function playlist()
    {
        return $this->belongsTo(playlist::class);
    }
    
}
