<?php
declare(strict_types = 1);

namespace CargoExpress\Models\Delivery;

use CargoExpress\Models\TransportModel;
use CargoExpress\Models\ClientModel;

class DeliveryContract
{
    /** @var ClientModel */
    protected $client;

    /** @var TransportModel */
    protected $transportModel;

    /** @var float Стоимость */
    protected $price = 0;

    /**
     * @var string
     */
    protected $startDate;

    /**
     * DeliveryContract constructor.
     * @param ClientModel $client
     * @param TransportModel $transportModel
     * @param string $startDate
     */
    public function __construct(ClientModel $client, TransportModel $transportModel, string $startDate)
    {
        $this->client         = $client;
        $this->transportModel = $transportModel;
        $this->startDate      = $startDate;
        $this->price          = 0;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return bool
     */
    public function setPrice(float $price): bool
    {
        $this->price = $price;

        return true;
    }
}
