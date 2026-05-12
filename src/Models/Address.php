<?php

namespace Vision\LaravelAddresses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    protected $fillable = [
        'addressable_id',
        'addressable_type',
        'line_1',
        'line_2',
        'city',
        'state',
        'postal_code',
        'country',
        'type'
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}