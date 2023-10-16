<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyComment extends Model
{
    use HasFactory;
    protected $table = 'table_clientsurvey_comment';
    protected $fillable = [
        'comment'
    ];
}
