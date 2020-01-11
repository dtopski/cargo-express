<?php
declare(strict_types = 1);

namespace CargoExpress\Repositories;

use CargoExpress\Interfaces\PointRepositoryInterface;
use CargoExpress\Models\PointModel;

class PointRepository implements PointRepositoryInterface
{
    /**
     * Возвращает пункт доставки по его id
     *
     * @param int $id
     * @return PointModel
     */
    public function getById(int $id): PointModel {

    }
}