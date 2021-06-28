<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table='order_items';

    protected $fillable = [
        'order_id',
        'nappi_code',
        'regno',
        'schedule',
        'name',
        'unit',
        'dosage_form',
        'package_size',
        'num_packs',
        'is_generic',
        'min_price',
        'dispencing_fee',
        'add_fee',
        'quantity',
        'retail_price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
