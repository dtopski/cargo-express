<?php
declare(strict_types=1);

namespace CargoExpress\Repositories;

use CargoExpress\Models\ClientModel;
use CargoExpress\Interfaces\ClientsRepositoryInterface;

class ClientsRepository implements ClientsRepositoryInterface
{
    /**
     * Возвращает клиента по его id
     *
     * @param int $id
     * @return ClientModel
     */
    public function getById(int $id): ClientModel
    {

    }
}