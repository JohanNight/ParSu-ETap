<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service1 extends Model
{
    use HasFactory;
    protected $table = 'table_services1';
    protected $fillable = [
        'code_Title',
        'service_Title',
        'description_service',
        'office_service',
        'classification_service',
        'classification_service',
        'transaction_type',
        'who_avail',

    ];
    public function checklistRequirements()
    {
        return $this->hasMany(service2::class, 'service_id', 'id');
    }
}
