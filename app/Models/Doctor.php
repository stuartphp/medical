<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table="doctors";
    protected $fillable =[
        'practice_number',
        'practice_name',
        'physical_address1',
        'physical_address2',
        'physical_suburb',
        'physical_town',
        'physical_postal_code',
        'physical_province',
        'postal_address1',
        'postal_address2',
        'postal_suburb',
        'postal_town',
        'postal_postal_code',
        'fax',
        'contact_number',

    ];
}
