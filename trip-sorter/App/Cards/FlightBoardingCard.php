<?php

namespace App\Cards;

/**
 * Flight Boarding card
 *
 * @author kamran
 */
class FlightBoardingCard extends AbstractBoardingCards
{
    private $gate;
    private $baggageCounter;

    /**
     * This method sets gate number if provided and returns gate number if null is passed.
     *
     * @param string $gate Gate Number.
     *
     * @return string
     */
    public function gate($gate = null)
    {
        if (null === $gate) {
            return $this->gate;
        }

        $this->gate = $gate;

        return $this;
    }

    /**
     * This method sets baggageCounter number if provided and returns baggageCounter number if null is passed.
     *
     * @param string $baggageCounter BaggageCounter.
     *
     * @return string
     */
    public function baggageCounter($baggageCounter = null)
    {
        if (null === $baggageCounter) {
            return $this->baggageCounter;
        }

        $this->baggageCounter = $baggageCounter;

        return $this;
    }

    /**
     * Returns the Formatted String output for Flight Card.
     *
     * @return string
     */
    public function toString()
    {
        return 'From '.$this->startPoint().
            ', take flight '.$this->transportIdentificationNumber().' to '.
            $this->destinationPoint().'. Gate '.
            $this->gate().', seat '.
            $this->seatNumber().'. '.
            ($this->baggageCounter() ? 'Baggage drop at ticket counter '.
                $this->baggageCounter().'.' : 'Baggage will be automatically transferred from your last leg.');
    }
}
