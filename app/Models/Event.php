<?php

namespace App\Models;

class Event extends BaseModel
{
    /** Event Stati */
    const DRAFT         = 0;  // Can be incomplete, only visible to staff, can be deleted
    const OPEN          = 1;  // Complete and published
    const CLOSED        = 2;  // Complete and closed to bookings, only visible to staff
    const ARCHIVED      = 3;  // Complete, closed to bookings, no longer visible on standard staff screens

    /** Event Types */
    const ONE_OFF       = 1;  // One time only e.g. a display, or competition
    const BLOCK         = 2;  // Repeating classes for a defined period of time
    const WEEKLY        = 3;  // Repeating classes created a week at a time
    const MONTHLY       = 4;  // Repeating classes created a month at a time
    const FOUR_WEEKLY   = 5;  // Repeating classes created four weeks at a time

    /** Booking Mechanism */
    const BY_CLASS      = 0;  // Book each individual class - for One-Off same as BY_PERIOD
    const BY_PERIOD     = 1;  // Book by Block, Weekly, Monthly or Four-weekly

    /** Booking_by and Visibility  */
    const PUBLIC        = 0;  // Can be viewed and/or booked by anyone on the site
    const MEMBERS_ONLY  = 1;  // Can be viewed and/or booked once logged in
    const STAFF_ONLY    = 2;  // Can be viewed and/or booked only by staff members logged in (with booking role)

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'name',
        'description',
        'status',
        'type',
        'period',
        'booking_how',
        'booking_by',
        'visibility',
        'start_date',
        'end_date',
        'capacity',
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
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
    ];
}
