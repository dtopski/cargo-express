<?php
declare(strict_types = 1);

namespace CargoExpress\Interfaces;

use CargoExpress\Models\PointModel;

interface PointRepositoryInterface
{
    /**
     * Возвращает пункт доставки по его id
     *
     * @param int $id
     * @return PointModel
     */
    public function getById(int $id): PointModel;
}