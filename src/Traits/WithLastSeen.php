<?php

namespace Ruerdev\LaravelLastSeen\Traits;

use Illuminate\Support\Carbon;

trait WithLastSeen
{
    /**
     * Initialize the trait for an instance.
     *
     * @return void
     */
    protected function initializeWithLastSeen()
    {
        $this->casts[$this->getLastSeenColumnName()] = 'datetime';
    }

    /**
     * Gets the name of the "last seen" column.
     *
     * @return string
     */
    public function getLastSeenColumnName(): string
    {
        return 'last_seen';
    }

    /**
     * Sets a datetime in the "last seen" column.
     *
     * @param Carbon|null $datetime
     *
     * @return void
     */
    public function setLastSeenValue(Carbon $datetime = null)
    {
        if (!isset($datetime)) {
            $datetime = now();
        }

        $original_timestamps = $this->timestamps;

        $this->{$this->getLastSeenColumnName()} = $datetime;
        $this->timestamps = false;
        $this->saveQuietly();
        $this->timestamps = $original_timestamps;
    }
}
