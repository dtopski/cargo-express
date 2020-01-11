<?php
declare(strict_types = 1);

namespace CargoExpress\Interfaces;

use CargoExpress\Models\TransportModel;

interface TransportModelsRepositoryInterface
{
    /**
     * Возвращает транспорт по его id
     *
     * @param int $id
     * @return TransportModel
     */
    public function getById(int $id): TransportModel;
}