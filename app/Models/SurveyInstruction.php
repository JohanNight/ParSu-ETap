<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyInstruction extends Model
{
    use HasFactory;

    protected $table = 'table_clientsurvey_instruction';

    protected $fillable = [
        'instruction'
    ];
}
