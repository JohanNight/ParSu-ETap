<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cc_Questions extends Model
{
    use HasFactory;
    protected $table = 'table_cc_questions';
    protected $fillable = [
        'description',
        'table_cc_instruction_id'
    ];
    public function CcOption()
    {
        return $this->hasMany(Cc_Options::class, 'table_cc_question_id', 'id');
    }
}
