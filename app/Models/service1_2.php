<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service1_2 extends Model
{
    use HasFactory;
    protected $table = 'table_service1_12';

    protected $fillable  = [
        'service_id',
        'requirement_description',
        'where_to_secure',
    ];
    public function service()
    {
        return $this->belongsTo(Service1::class, 'service_id', 'idServiceSpecification');
    }
}
