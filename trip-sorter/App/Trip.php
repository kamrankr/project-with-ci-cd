<?php

namespace App;

use App\Cards\AbstractBoardingCards;
use InvalidArgumentException;

/**
 * Trip is the class to create new Trip and sort cards
 *
 * @author kamran
 */
class Trip
{
    /**
     * @var array
     */
    protected $tripBoardingCards;
    /**
     * @var array
     */
    protected $canBeStartOfJourney;
    /**
     * @var array
     */
    protected $canNotBeStartOfJourney;
    /* ====================== Algorithm ===========================
     * Following algorithm is without any loops and iterations, Sorting can be managed by using O(n)
     * Space complexity.
     * Add card method will accept Boarding cards and works on two associated arrays
     * canBeStartOfJourney and canNotBeStartOfJourney
     * for every new card we add we have source and destination present in card.
     * All the destination points will be saved in $canNotBeStartOfJourney and every
     * source point be will be $canBeStartOfJourney and if the source is present
     * in  destination array ($canNotBeStartOfJourney),
     * we will remove that source from $canBeStartOfJourney
     * At the end leaving $canBeStartOfJourney of journey with only one item that is 'start of journey'
     * we need only start of journey to navigate till the last leg. as every destination is the
     * source for nex trip
     */

    /**
     * This method adds a card to trip.
     *
     * @param AbstractBoardingCards $tripCard .
     *
     * @return void
     */
    public function addCard(AbstractBoardingCards $tripCard): void
    {
        if (empty($tripCard->startPoint()) || empty($tripCard->destinationPoint())) {
            throw new InvalidArgumentException('Card should have a start and destination point');
        }

        // save all boarding cards by source point
        $this->tripBoardingCards[$tripCard->startPoint()] = $tripCard;

        // Destination points cannot be the 'start of journey' where trip starts
        $this->canNotBeStartOfJourney[$tripCard->destinationPoint()] = true;

        // if start point is not in the destination array save it in start array
        if (!isset($this->canNotBeStartOfJourney[$tripCard->startPoint()])) {
            $this->canBeStartOfJourney[$tripCard->startPoint()] = true;
        }
        // if start point is present in the destination array remove it from start array
        if (isset($this->canBeStartOfJourney[$tripCard->destinationPoint()])) {
            unset($this->canBeStartOfJourney[$tripCard->destinationPoint()]);
        }
    }

    /**
     * This method returns start of Journey
     *
     * @return string
     */
    public function startOfJourney(): string
    {
        // canBeStartOfJourney has one element only - Following statement is O(1)
        $tripStartsAt = array_keys($this->canBeStartOfJourney);

        return reset($tripStartsAt);
    }

    /**
     * @return AbstractBoardingCards[]
     */
    public function allBoardingCards(): array
    {
        return $this->tripBoardingCards;
    }
}
