<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBooking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'id');
    }
}
