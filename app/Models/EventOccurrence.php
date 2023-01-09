<?php

namespace App\Models;


class EventOccurrence extends BaseModel
{
    /** BookingGroup Stati - inherited from Event - but can be overridden at Booking Group level */
    const OPEN          = 1;  // Complete and published
    const CLOSED        = 2;  // Complete and closed to bookings, only visible to staff
    const ARCHIVED      = 3;  // Complete, closed to bookings, no longer visible on standard staff screens

    /** Booking_by and Visibility - inherited from Event - but can be overridden at Booking Group level */
    const PUBLIC        = 0;
    const MEMBERS_ONLY  = 1;
    const STAFF_ONLY    = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'event_id',
        'date',
        'start_time',
        'end_time',
        'booking_group_id',
        'status',
        'booking_by',
        'visibility',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
    ];
}
