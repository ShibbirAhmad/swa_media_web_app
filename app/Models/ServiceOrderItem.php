<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrderItem extends Model
{
    use HasFactory;
    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }

    public function serviceOrder()
    {
        return $this->belongsTo('App\Models\ServiceOrder', 'service_order_id');
    }
}
