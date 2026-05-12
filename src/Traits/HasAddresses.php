<?php

namespace Vision\LaravelAddresses\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Vision\LaravelAddresses\Models\Address;

trait HasAddresses
{
    /**
     * Get a specific address by type.
     */
    public function address($type = 'primary'): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable')
            ->where('type', $type);
    }

    /**
     * Get all addresses for the model.
     */
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * Update or create an address by type.
     */
    public function updateAddress(array $data, string $type = 'primary')
    {
        return $this->address($type)->updateOrCreate(
            ['type' => $type],
            $data
        );
    }
}
