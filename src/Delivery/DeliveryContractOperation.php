<?php
declare(strict_types = 1);

namespace CargoExpress\Delivery;

use CargoExpress\ClientsRepository;
use CargoExpress\TransportModelsRepository;

class DeliveryContractOperation
{
    /**
     * @var DeliveryContractsRepository
     */
    protected $contractsRepository;

    /**
     * @var ClientsRepository
     */
    protected $clientsRepository;

    /**
     * @var TransportModelsRepository
     */
    protected $transportModelsRepository;

    /**
     * DeliveryContractOperation constructor.
     *
     * @param DeliveryContractsRepository $contractsRepo
     * @param ClientsRepository $clientsRepo
     * @param TransportModelsRepository $transportModelsRepo
     */
    public function __construct(DeliveryContractsRepository $contractsRepo, ClientsRepository $clientsRepo, TransportModelsRepository $transportModelsRepo)
    {
        $this->contractsRepository       = $contractsRepo;
        $this->clientsRepository         = $clientsRepo;
        $this->transportModelsRepository = $transportModelsRepo;
    }

    /**
     * @param DeliveryRequest $request
     * @return DeliveryResponse
     */
    public function execute(DeliveryRequest $request): DeliveryResponse
    {

    }
}