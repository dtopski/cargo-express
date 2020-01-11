<?php
declare(strict_types = 1);

namespace CargoExpress\Repositories;

use CargoExpress\Interfaces\DeliveryContractsRepositoryInterface;
use CargoExpress\Models\Delivery\DeliveryContract;

class DeliveryContractsRepository implements DeliveryContractsRepositoryInterface
{
    /**
     * Возвращает список договоров доставки для модели транспорта, в которых она занята в указанный период
     *
     * @param int $transportModelId
     * @param string $date
     * @return DeliveryContract[]
     */
    public function getForTransportModel(int $transportModelId, string $date): array {

    }
}