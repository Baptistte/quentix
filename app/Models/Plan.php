<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'duration_months',
        'features',
    ];

    /**
     * Relation avec les utilisateurs.
     * Un plan peut être souscrit par plusieurs utilisateurs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'subscription_plan_id');
    }
}