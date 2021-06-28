<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'doctor_id',
        'status',   // 1=> Placed, 2=>Paid, 3=>Dispatched, 4=>Completed
        'total'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function doctor()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
