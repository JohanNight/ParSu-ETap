<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offices extends Model
{
    use HasFactory;
    protected $table = 'tbloffices';
    protected $fillable = [
        'idCampus',
        'officeAcronym',
        'officeDescription'
    ];
}
