<?php
declare(strict_types = 1);

namespace CargoExpress\Delivery;

interface DeliveryContractsRepository
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