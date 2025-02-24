<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'lieu',
        'date_heure',
        'categorie',
        'user_id',
        'max_participants',
        'image_path',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function rsvps() {
        return $this->hasMany(RSVP::class);
    }
    
    // public function participants() {
    //     return $this->belongsToMany(User::class, 'rsvps');
    // }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
