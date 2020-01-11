<?php
declare(strict_types=1);

namespace CargoExpress\Repositories;

use CargoExpress\Interfaces\TransportModelsRepositoryInterface;
use CargoExpress\Models\TransportModel;

class TransportModelsRepository implements TransportModelsRepositoryInterface
{
    /**
     * Возвращает транспорт по его id
     *
     * @param int $id
     * @return TransportModel
     */
    public function getById(int $id): TransportModel {

    }
}