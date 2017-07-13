<?php namespace Bugotech\Support;

use MongoDB\BSON\UTCDateTime;

class Carbon extends \Carbon\Carbon
{
    /**
     * Create a Carbon instance from an MongoDB\BSON\UTCDateTime.
     *
     * @param UTCDateTime $value
     * @return static
     */
    public static function createFromUTCDateTime(UTCDateTime $value)
    {
        return static::createFromTimestamp($value->toDateTime()->getTimestamp());
    }

    /**
     * Format the instance as UTCDateTime.
     *
     * @return string
     */
    public function toUTCDateTimeString()
    {
        return trim($this->getUTCDateTime());
    }

    /**
     * Gets the UTCDateTime.
     * @return UTCDateTime
     */
    public function getUTCDateTime()
    {
        return new UTCDateTime($this->getTimestamp() * 1000);
    }
}