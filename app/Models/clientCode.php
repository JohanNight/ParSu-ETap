<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientCode extends Model
{
    use HasFactory;
    protected $table = 'table_surveykeycode';

    protected  $fillable = [
        'name',
        'email',
        'user_number',
        'code'
    ];
}
