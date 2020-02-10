<?php

namespace App\Cards;

/**
 * Description of TrainBoardingCard
 *
 * @author kamran
 */
class TrainBoardingCard extends AbstractBoardingCards
{
     /**
     * Returns the Formatted String output for Train Card.
     *
     * @return string
     */
    public function toString(): string
    {
        return 'Take train ' . $this->transportIdentificationNumber() . ' from ' . $this->startPoint() .
            ' to ' . $this->destinationPoint() . '. Sit in seat ' . $this->seatNumber() . '.';
    }

}
