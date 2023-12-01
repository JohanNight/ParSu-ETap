<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCode extends Model
{
    use HasFactory;
    protected $table = 'table_code';
    protected $primaryKey = 'idcode';
    protected $fillable = [
        'code',
        'flag',
    ];
}
