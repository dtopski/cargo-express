<?php
declare(strict_types = 1);

namespace CargoExpress\Models;

class ClientModel
{
    /** @var int id клиента */
    protected $id;

    /** @var string имя клиента */
    protected $name;

    /**
     * ClientModel constructor.
     *
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}