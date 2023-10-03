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
        'cc1',
        'cc2',
        'cc3',
        'sqd0',
        'sqd1',
        'sqd2',
        'sqd3',
        'sqd4',
        'sqd5',
        'sqd6',
        'sqd7',
        'sqd8',
        'comment'

    ];
}
