<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    // Définir les champs qui peuvent être remplis via des requêtes de type mass-assignment
    protected $fillable = ['user_id', 'domain', 'status'];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}