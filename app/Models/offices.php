<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offices extends Model
{
    use HasFactory;
    protected $table = 'tbloffices';
    protected $primaryKey = 'idOffices';
    protected $fillable = [
        'idCampus',
        'officeAcronym',
        'officeDescription'
    ];

    // public function services()
    // {
    //     return $this->hasMany(service1::class);
    // }
}
