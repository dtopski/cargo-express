<?php
declare(strict_types = 1);

namespace CargoExpress\Delivery;

class DeliveryResponse
{
    /** @var DeliveryContract контракт доставки */
    protected $deliveryContract;

    /** @var string[] список ошибок */
    protected $errors = [];

    /**
     * @return DeliveryContract
     */
    public function getDeliveryContract(): ?DeliveryContract
    {
        return $this->deliveryContract;
    }

    /**
     * @param DeliveryContract $deliveryContract
     */
    public function setDeliveryContract(DeliveryContract $deliveryContract)
    {
        $this->deliveryContract = $deliveryContract;
    }

    /**
     * @param string $error
     */
    public function pushError(string $error): void
    {
        $this->errors[] = $error;
    }

    /**
     * @return string[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}