<?php

namespace App\Models;

use Eloquent;
use Laravel\Jetstream\Membership as JetstreamMembership;

/**
 * App\Models\Membership
 *
 * @mixin Eloquent
 */
class Membership extends JetstreamMembership
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}
