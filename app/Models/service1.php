<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service1 extends Model
{
    use HasFactory;

    protected $table = 'table_service1_1';
    protected $primaryKey = 'idServiceSpecification';
    protected $fillable = [
        'serviceCode',
        'idService',
        'serviceTitle',
        'serviceDescription',
        'idOffice',
        'idClassificationServices',
        'idTransactionType',
        'idWhoAvail',

    ];
    public function checklistRequirements1()
    {
        return $this->hasMany(Service1_2::class, 'service_id', 'idServiceSpecification');
    }

    public function checklistRequirements2()
    {
        return $this->hasMany(Service1_3::class, 'service_id1', 'idServiceSpecification');
    }
    public function Services()
    {
        return $this->hasToMany(service1::class);
    }
}
