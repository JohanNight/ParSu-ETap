<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cc_Instruction extends Model
{
    use HasFactory;
    protected $table = 'table_cc_instructions';
    protected $fillable = [
        'instruction',
    ];
}
