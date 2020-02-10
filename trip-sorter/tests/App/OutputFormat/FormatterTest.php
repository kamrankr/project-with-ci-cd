<?php

namespace App\OutputFormat;

use App\Cards\TrainBoardingCard;
use App\Trip;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 *
 * @author kamran
 */
class FormatterTest extends TestCase
{
    public function testOutputFormatter(): void
    {
        $mockCard = $this->getMockBuilder(TrainBoardingCard::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockCard->method('startPoint')
            ->willReturn('A');

        $mockCard->method('destinationPoint')
            ->willReturn('B');

        $mockCard->method('toString')
            ->willReturn('Train Boarding Card');

        /** @var Trip|MockObject $mockTrip */
        $mockTrip = $this->getMockBuilder(Trip::class)
            ->getMock();

        $mockTrip->method('startOfJourney')
            ->willReturn('A');

        $mockTrip->method('allBoardingCards')
            ->willReturn(['A' => $mockCard]);

        $formatter = new Formatter();

        $formattedOutput = $formatter->setLineBreak(PHP_EOL)
            ->format($mockTrip);

        $this->assertStringContainsString('Train Boarding Card', $formattedOutput);
        $this->assertStringContainsString('You have arrived at your final destination.', $formattedOutput);
    }
}
