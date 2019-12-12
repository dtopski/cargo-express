<?php
declare(strict_types = 1);

namespace CargoExpress;

interface TransportModelsRepository
{
    /**
     * Возвращает транспорт по его id
     *
     * @param int $id
     * @return TransportModel
     */
    public function getById(int $id): TransportModel;
}