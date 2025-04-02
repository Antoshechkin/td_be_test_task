<?php

namespace App\Tests\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class CarControllerTest extends WebTestCase
{
    public function testGetCars(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/cars');

        self::assertResponseIsSuccessful();
    }
}
