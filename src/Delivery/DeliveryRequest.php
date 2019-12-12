<?php
declare(strict_types = 1);

namespace CargoExpress\Delivery;

class DeliveryRequest
{
    /** @var int id клиента */
    public $clientId;

    /** @var int id модели транспорта */
    public $transportModelId;

    /** @var string дата, когда нужно забрать груз у клиента */
    public $startDate;
    /**
     * @var string
     */
    public $toAddress;

    /**
     * DeliveryContract constructor.
     * @param int $clientId
     * @param int $transportModelId
     * @param string $startDate
     * @param string $toAddress
     */
    public function __construct(int $clientId, int $transportModelId, string $startDate, string $toAddress)
    {
        $this->clientId         = $clientId;
        $this->transportModelId = $transportModelId;
        $this->startDate        = $startDate;
        $this->toAddress        = $toAddress;
    }
}