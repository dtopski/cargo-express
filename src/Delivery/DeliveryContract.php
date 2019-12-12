<?php
declare(strict_types = 1);

namespace CargoExpress\Delivery;

use CargoExpress\Client;
use CargoExpress\TransportModel;

class DeliveryContract
{
    /** @var Client */
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
     * @param Client $client
     * @param TransportModel $transportModel
     * @param string $startDate
     */
    public function __construct(Client $client, TransportModel $transportModel, string $startDate)
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
}
