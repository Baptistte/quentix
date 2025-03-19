<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PurchaseHistory extends Model {
    use HasFactory;
    public $timestamps = false; // Désactive les timestamps automatiques
    protected $table = 'purchase_history';
    protected $fillable = ['user_id', 'plan_id', 'amount', 'status', 'purchase_date', 'plan_name', 'plan_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}