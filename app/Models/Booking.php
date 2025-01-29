<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'tb_booking';
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'booking_room_id',
        'booking_package_id',
        'date',
        'booking_expired',
        'month',
        'year',
        'booking_status',
        'request',
        'booking_customer_id',
        'created_at',
        'updated_at',
        'rfid',
        'datein',
        'dateout',
        'pendamping'
    ];

    public $timestamps = false; // Set to true if you want to use created_at and updated_at
}
