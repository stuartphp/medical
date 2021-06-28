<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    use HasFactory;
    protected $table = 'user_documents';
    protected $fillable = [
        'user_id',
        'id_proof',
        'id_address_proof'
    ];
}
