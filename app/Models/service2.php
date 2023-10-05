<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service2 extends Model
{
    use HasFactory;
    protected $table = 'table_services2';

    protected $fillable = [
        'service_id',
        'requirement_description',
        'where_to_secure',
        'client_steps',
        'agency_action',
        'fees_to_be_paid',
        'processing_time',
        'person_responsible'
    ];
    public function service()
    {
        return $this->belongsTo(service1::class);
    }
}
