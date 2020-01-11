<?php
declare(strict_types = 1);

namespace CargoExpress\Interfaces;

use CargoExpress\Models\Delivery\DeliveryContract;

interface DeliveryContractsRepositoryInterface
{
    /**
     * Возвращает список договоров доставки для модели транспорта, в которых она занята в указанный период
     *
     * @param int $transportModelId
     * @param string $date
     * @return DeliveryContract[]
     */
    public function getForTransportModel(int $transportModelId, string $date): array;
}