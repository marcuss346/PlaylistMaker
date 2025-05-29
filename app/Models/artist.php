<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class artist extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country',
        'birth_date',
    ];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
