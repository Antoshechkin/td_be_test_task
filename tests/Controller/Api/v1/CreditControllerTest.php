<?php

namespace App\Tests\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class CreditControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/credit');

        self::assertResponseIsSuccessful();
    }
}
