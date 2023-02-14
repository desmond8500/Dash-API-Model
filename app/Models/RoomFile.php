<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFile extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'fichier_id'];
}
