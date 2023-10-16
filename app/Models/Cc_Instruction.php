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
    public function CcQuestion()
    {
        return $this->hasMany(Cc_Questions::class, 'table_cc_instruction_id', 'id');
    }
}
