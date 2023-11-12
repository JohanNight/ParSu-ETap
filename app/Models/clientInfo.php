<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientInfo extends Model
{
    //for storing the client information
    use HasFactory;
    protected $table = 'table_client_survey_information';
    protected $fillable = [
        'name',
        'sex',
        'age',
        'idCategoryFk',
        'dateOfTransaction',
        'idOfficeOrigin',
        'service_avail',
        'purpose',
        'emailAdd',
        'cc1',
        'cc2',
        'cc3',
        'sqd1',
        'sqd2',
        'sqd3',
        'sqd4',
        'sqd5',
        'sqd6',
        'sqd7',
        'sqd8',
        'sqd9',
        'comment',
        'serviceCode'
    ];
}
