<?php
namespace App\OutputFormat;

use App\Trip;

/**
 *
 * @author kamran
 */
interface Iformatter
{
    /**
     * @param Trip $trip
     *
     * @return mixed
     */
    public function format(Trip $trip);
}
