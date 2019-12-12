<?php
declare(strict_types = 1);

namespace CargoExpress;

interface ClientsRepository
{
    /**
     * Возвращает клиента по его id
     *
     * @param int $id
     * @return Client
     */
    public function getById(int $id): Client;
}