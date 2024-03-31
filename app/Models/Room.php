<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_number',
        'type',
        'price_per_night',
        'max_occupancy',
        'availability',
    ];
    public function Bookings()
    {
        return $this->hasMany(Booking::class, "room_id", "id");
    }
    
}
