<?php
declare(strict_types = 1);

namespace CargoExpress\Delivery;

use PHPUnit\Framework\TestCase;
use CargoExpress\Client;
use CargoExpress\ClientsRepository;
use CargoExpress\TransportModel;
use CargoExpress\TransportModelsRepository;

class DeliveryContractOperationTest extends TestCase
{
    /**
     * Stub репозитория клиентов
     *
     * @param Client[] ...$clients
     * @return ClientsRepository
     */
    private function makeFakeClientRepository(...$clients): ClientsRepository
    {
        $clientsRepository = $this->prophesize(ClientsRepository::class);
        foreach ($clients as $client) {
            $clientsRepository->getById($client->getId())->willReturn($client);
        }

        return $clientsRepository->reveal();
    }

    /**
     * Stub репозитория моделей транспорта
     *
     * @param TransportModel[] ...$transportModels
     * @return TransportModelsRepository
     */
    private function makeFakeTransportModelRepository(...$transportModels): TransportModelsRepository
    {
        $transportModelsRepository = $this->prophesize(TransportModelsRepository::class);
        foreach ($transportModels as $transportModel) {
            $transportModelsRepository->getById($transportModel->getId())->willReturn($transportModel);
        }

        return $transportModelsRepository->reveal();
    }

    /**
     * Если транспорт занят, то нельзя его арендовать
     */
    public function test_periodIsBusy_failedWithOverlapInfo()
    {
        // -- Arrange
        {
            // Клиенты
            $client1    = new Client(1, 'Джонни');
            $client2    = new Client(2, 'Роберт');
            $clientRepo = $this->makeFakeClientRepository($client1, $client2);

            // Модель транспорта
            $transportModel1 = new TransportModel(1, 'Турбо Пушка', 20);

            $transportModelsRepo = $this->makeFakeTransportModelRepository($transportModel1);

            // Контракт доставки. 1й клиент арендовал транпорт 1
            $deliveryContract = new DeliveryContract($client1, $transportModel1, '2020-01-01 00:00');

            // Stub репозитория договоров
            $contractsRepo = $this->prophesize(DeliveryContractsRepository::class);
            $contractsRepo
                ->getForTransportModel($transportModel1->getId(), '2020-01-01 10:00')
                ->willReturn([ $deliveryContract ]);

            // Запрос на новую доставку. 2й клиент выбрал время когда транспорт занят.
            $deliveryRequest = new DeliveryRequest($client2->getId(), $transportModel1->getId(), '2020-01-01 10:00', 'Нью-Йорк');

            // Операция заключения договора на доставку
            $deliveryContractOperation = new DeliveryContactOperation($contractsRepo->reveal(), $clientRepo, $transportModelsRepo);
        }

        // -- Act
        $response = $deliveryContractOperation->execute($deliveryRequest);

        // -- Assert
        $this->assertCount(1, $response->getErrors());

        $message = 'Извините Турбо Пушка занята 2020-01-01 10:00';
        $this->assertStringContainsString($message, $response->getErrors()[0]);
    }

    /**
     * Если транспорт свободен, то его легко можно арендовать
     */
    public function test_successfullyOperation()
    {
        // -- Arrange
        {
            // Клиент
            $client1    = new Client(1, 'Джонни');
            $clientRepo = $this->makeFakeClientRepository($client1);

            // Модель транспорта
            $transportModel1    = new TransportModel(1, 'Турбо Пушка', 20);
            $transportModelRepo = $this->makeFakeTransportModelRepository($transportModel1);

            $contractsRepo = $this->prophesize(DeliveryContractsRepository::class);
            $contractsRepo
                ->getForTransportModel($transportModel1->getId(), '2020-01-01 17:30')
                ->willReturn([]);

            // Запрос на новую доставку
            $deliveryRequest = new DeliveryRequest($client1->getId(), $transportModel1->getId(), '2020-01-01 17:30', 'Нью-Йорк');

            // Операция заключения договора на доставку
            $deliveryContractOperation = new DeliveryContactOperation($contractsRepo->reveal(), $clientRepo, $transportModelRepo);
        }

        // -- Act
        $response = $deliveryContractOperation->execute($deliveryRequest);

        // -- Assert
        $this->assertEmpty($response->getErrors());
        $this->assertInstanceOf(DeliveryContract::class, $response->getDeliveryContract());

        $this->assertEquals(5000, $response->getDeliveryContract()->getPrice());
    }
}