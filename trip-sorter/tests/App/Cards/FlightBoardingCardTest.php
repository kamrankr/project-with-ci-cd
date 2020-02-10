<?php

namespace App\Cards;

use PHPUnit\Framework\TestCase;

/**
 * Class FlightBoardingCardTest
 *
 * @package App\Cards
 */
class FlightBoardingCardTest extends TestCase
{
    public function testFlightBoardingCardWithBaggageCounter(): void
    {
        $baggageCounter = '40'; // BaggageCounter
        $flightBoardingCard = new FlightBoardingCard('A', 'B');
        $flightBoardingCard->baggageCounter($baggageCounter);
        $output = $flightBoardingCard->toString();
        $this->assertStringContainsString($baggageCounter, $output);
    }

    public function testFlightBoardingCardWithOutBaggageCounter(): void
    {
        $flightBoardingCard = new FlightBoardingCard('A', 'B');
        $output = $flightBoardingCard->toString();
        $this->assertStringContainsString('Baggage will be automatically transferred from your last leg', $output);
    }

    public function testFlightBoardingCardWithGate(): void
    {
        $gateNumber = '10'; // Gate Number
        $flightBoardingCard = new FlightBoardingCard('A', 'B');
        $flightBoardingCard->gate($gateNumber);
        $output = $flightBoardingCard->toString();
        $this->assertStringContainsString($gateNumber, $output);
    }
}
