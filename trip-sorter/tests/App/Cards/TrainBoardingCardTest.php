<?php

namespace App\Cards;

use PHPUnit\Framework\TestCase;

/**
 * Class TrainBoardingCardTest
 */
class TrainBoardingCardTest extends TestCase
{
    public function testTrainBoardingCardWithTransportIdentificationNumber(): void
    {
        $trainBoardingCard = new TrainBoardingCard('A', 'B');
        $trainBoardingCard->transportIdentificationNumber('78A');
        $output = $trainBoardingCard->toString();
        $this->assertStringContainsString('78A', $output, 'TransportIdentification number is invalid');
    }
}
