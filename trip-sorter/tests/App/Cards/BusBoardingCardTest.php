<?php

namespace App\Cards;

use PHPUnit\Framework\TestCase;

/**
 * Class BusBoardingCardTest
 */
class BusBoardingCardTest extends TestCase
{
    public function testBusBoardingCardStartAndDestinationPointOutput(): void
    {
        $busBoardingCard = new BusBoardingCard('testStartPoint', 'testDestinationPoint');
        $output = $busBoardingCard->toString();

        $this->assertStringContainsString('testStartPoint', $output, 'Unable to verify start Point exist in bus card');
        $this->assertStringContainsString(
            'testDestinationPoint',
            $output,
            'Unable to verify destination Point exist in bus card'
        );
    }

    public function testBusBoardingCardWithoutSeatAssignment(): void
    {
        $busBoardingCard = new BusBoardingCard('A', 'B');
        $output = $busBoardingCard->toString();
        $this->assertStringContainsString(
            'No seat assignment',
            $output,
            'empty seat should return ,  no seat assignment'
        );
    }

    public function testBusBoardingCardWithSeatAssignment(): void
    {
        $busBoardingCard = new BusBoardingCard('A', 'B');
        $seatNumber = random_int(1, 100).'B'; // Random Seat Number Generation
        $busBoardingCard->seatNumber($seatNumber);

        $output = $busBoardingCard->toString();
        $this->assertStringContainsString($seatNumber, $output, 'expecting seat number in output');
    }
}
