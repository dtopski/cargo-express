<?php
declare(strict_types = 1);

namespace CargoExpress;

class TransportModel
{
    /** @var int id модели транспорта */
    protected $id;

    /** @var string название модели транспорта */
    protected $name;

    /** @var float Стоимость модели транспорта за час килеметр движения */
    protected $pricePerKilometer;

    /**
     * TransportModel constructor.
     *
     * @param int $id
     * @param string $name
     * @param float $pricePerHour
     */
    public function __construct(int $id, string $name, float $pricePerHour)
    {
        $this->id                = $id;
        $this->name              = $name;
        $this->pricePerKilometer = $pricePerHour;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPricePerKilometer(): float
    {
        return $this->pricePerKilometer;
    }
}