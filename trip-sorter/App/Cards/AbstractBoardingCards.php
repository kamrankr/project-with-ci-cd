<?php
declare(strict_types=1);

namespace App\Cards;

use Exception;

/**
 * Class AbstractBoardingCards
 *
 * @package App\Cards
 */
abstract class AbstractBoardingCards
{
    /**
     * @var string|null
     */
    protected $startPoint;
    /**
     * @var string|null
     */
    protected $destinationPoint;
    /**
     * @var string|null
     */
    protected $seatNumber;
    /**
     * @var string|null
     */
    protected $transportIdentificationNumber;

    /**
     * AbstractBoardingCards constructor.
     *
     * @param string $startPoint
     * @param string $destinationPoint
     *
     * @throws Exception
     */
    public function __construct(string $startPoint = null, string $destinationPoint = null)
    {
        if (null === $startPoint || null === $destinationPoint) {
            throw new Exception("Start and End point are required for a card");
        }
        $this->startPoint = $startPoint;
        $this->destinationPoint = $destinationPoint;
    }

    /**
     * This method returns startPoint of card.
     *
     * @return string|null
     */
    public function startPoint(): ?string
    {
        return $this->startPoint;
    }

    /**
     * This method returns destinationPoint of card .
     *
     * @return string
     */
    public function destinationPoint()
    {
        return $this->destinationPoint;
    }

    /**
     * This method sets seatNumber of a card and returns startPoint of card if null is passed.
     *
     * @param string $seatNumber seatNumber Of card.
     *
     * @return string
     */
    public function seatNumber($seatNumber = null)
    {
        if (null === $seatNumber) {
            return $this->seatNumber;
        }

        $this->seatNumber = $seatNumber;

        return $this;
    }

    /**
     * This method sets transportIdentificationNumber of a card and returns
     * transportIdentificationNumber of card if null is passed.
     *
     * @param string $transportIdentificationNumber transportIdentificationNumber Of card.
     *
     * @return string
     */
    public function transportIdentificationNumber($transportIdentificationNumber = null)
    {
        if (null === $transportIdentificationNumber) {
            return $this->transportIdentificationNumber;
        }

        $this->transportIdentificationNumber = $transportIdentificationNumber;

        return $this;
    }

    /*
     * Every child class i-e Boarding card must override this method to output
     * data according to its format
     * @return mixed
     */
    abstract public function toString();
}
