<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service1_3 extends Model
{
    use HasFactory;
    protected $table = 'table_services1_13';

    protected $fillable = [
        'service_id1',
        'client_steps',
        'agency_action',
        'fees_to_be_paid',
        'processing_time',
        'person_responsible'
    ];
    public function service()
    {
        return $this->belongsTo(Service1::class, 'service_id1', 'id');
    }
}
