<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'duration',
        'status'
    ];

    public function detail_booking()
    {
        return $this->hasMany(DetailBooking::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
