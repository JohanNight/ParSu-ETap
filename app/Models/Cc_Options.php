<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cc_Options extends Model
{
    use HasFactory;
    protected $table = 'table_cc_options';
    protected $fillable = [
        'option_text',
        'table_cc_question_id'


    ];
    public function Option()
    {
        return $this->belongsTo(Cc_Questions::class, 'table_cc_question_id', 'id');
    }
}
