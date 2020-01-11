<?php
declare(strict_types = 1);

namespace CargoExpress\Models;

/**
 * Class PointModel
 * @package CargoExpress\Models
 */
class PointModel
{
    /** @var int id пункта доставки */
    protected $id;

    /** @var string имя пункта доставки */
    protected $name;

    /** @var string расстояние до пункта доставки в км */
    protected $distance;

    /**
     * PointModel constructor.
     * @param int $id
     * @param string $name
     * @param float $distance
     */
    public function __construct(int $id, string $name, float $distance)
    {
        $this->id   = $id;
        $this->name = $name;
        $this->distance = $distance;
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

    public function getDistance() : float
    {
        return $this->distance;
    }
}