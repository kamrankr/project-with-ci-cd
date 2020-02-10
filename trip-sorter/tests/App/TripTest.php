<?php

namespace App\Trip;

use App\Cards\TrainBoardingCard;
use App\Trip;
use PHPUnit\Framework\TestCase;

/**
 * Class TripTest
 *
 * @package App\Trip
 */
class TripTest extends TestCase
{
    protected $tester;

    public function testGetTripCards(): void
    {
        /*
         * Reason to mock Boarding card is error in BoardingClass
         * should not result in failure of this unit test (Isolated unit tests)
         */

        $mockCard = $this->getMockBuilder(TrainBoardingCard::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockCard->method('startPoint')
            ->willReturn('A');
        $mockCard->method('destinationPoint')
            ->willReturn('B');

        $trip = new Trip();
        $trip->addCard($mockCard);
        $cards = $trip->allBoardingCards();

        $this->assertCount(1, $cards, 'count of returned array should be equal to cards added');
        $this->assertEquals($trip->startOfJourney(), 'A', 'start of journey is wrong');
    }
}
