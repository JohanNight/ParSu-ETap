<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientInfo extends Model
{
    //for storing the client information
    use HasFactory;
    protected $table = 'table_clientinfos_final';
    protected $fillable = [
        'name',
        'sex',
        'age',
        'idCategoryFk',
        'dateOfTransaction',
        'idOfficeOrigin',
        'purpose',
        'emailAdd',
    ];
}
