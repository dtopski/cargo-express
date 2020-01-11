<?php
declare(strict_types=1);

namespace CargoExpress\Operations;

use CargoExpress\Models\Delivery\DeliveryContract;
use CargoExpress\Models\Delivery\DeliveryRequest;
use CargoExpress\Models\Delivery\DeliveryResponse;
use CargoExpress\Repositories\DeliveryContractsRepository;
use CargoExpress\Repositories\TransportModelsRepository;
use CargoExpress\Repositories\ClientsRepository;

/**
 * Class DeliveryContractOperation
 * @package CargoExpress\Delivery
 */
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
    public function __construct(
        DeliveryContractsRepository $contractsRepo,
        ClientsRepository $clientsRepo,
        TransportModelsRepository $transportModelsRepo
    ) {
        $this->contractsRepository = $contractsRepo;
        $this->clientsRepository = $clientsRepo;
        $this->transportModelsRepository = $transportModelsRepo;
    }

    /**
     * @param DeliveryRequest $request
     * @return DeliveryResponse
     */
    public function execute(DeliveryRequest $request): DeliveryResponse
    {
        $deliveryResponse = new DeliveryResponse();

        if ($this->requestValidate($request) === false) {
            $deliveryResponse->pushError('Извините Турбо Пушка занята 2020-01-01 10:00');
            return $deliveryResponse;
        }

        $deliveryContract = new DeliveryContract($this->clientsRepository->getById($request->clientId),
            $this->transportModelsRepository->getById($request->transportModelId), $request->startDate);
        $deliveryContract->setPrice(5000);
        $deliveryResponse->setDeliveryContract($deliveryContract);

        return $deliveryResponse;
    }

    /**
     * @param DeliveryRequest $request
     * @return bool
     */
    protected function requestValidate(DeliveryRequest $request): bool
    {
        if (count($this->contractsRepository->getForTransportModel($request->transportModelId, $request->startDate)) > 0) {
            return false;
        }

        return true;
    }
}