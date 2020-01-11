<?php
declare(strict_types = 1);

namespace CargoExpress\Interfaces;

use CargoExpress\Models\ClientModel;

interface ClientsRepositoryInterface
{
    /**
     * Возвращает клиента по его id
     *
     * @param int $id
     * @return ClientModel
     */
    public function getById(int $id): ClientModel;
}