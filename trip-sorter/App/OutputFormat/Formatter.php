<?php

namespace App\OutputFormat;

use App\Trip;

/**
 * Formatter class to format and return trip data
 *
 * @author kamran
 */
class Formatter implements Iformatter
{
    /**
     * @var string
     */
    protected $lineBreak;

    /**
     * Accepts trip object and returns the Formated String output.
     *
     * @param Trip $trip
     *
     * @return string
     */
    public function format(Trip $trip): string
    {
        $output = '';
        // get all added boarding cards, keyed by departure
        $tripCards = $trip->allBoardingCards();

        // start of journey, as all journeys are connected only need start to traverse all
        $tripStartsAt = $trip->startOfJourney();

        $loopIndex = 0;
        while ($tripStartsAt !== null) {
            if (isset($tripCards[$tripStartsAt])) {
                $output .= ++$loopIndex.'- '.$tripCards[$tripStartsAt]->toString();
                $tripStartsAt = $tripCards[$tripStartsAt]->destinationPoint();
                $output .= $this->getLineBreak();
            } else {
                $tripStartsAt = null;
            }
        }
        $output .= ++$loopIndex.'- You have arrived at your final destination.';

        return $output.$this->getLineBreak();
    }

    /**
     *
     * @return string
     */
    public function getLineBreak(): string
    {
        return $this->lineBreak;
    }

    /**
     * @param string $lineBreak , "br" or "\n"
     *
     * @return self
     */
    public function setLineBreak($lineBreak): self
    {
        $this->lineBreak = $lineBreak;

        return $this;
    }
}
