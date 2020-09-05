<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ControllerTest extends WebTestCase
{
    public function testHomePageGivesNewValues()
    {
        $client = static::createClient();

        $client->request('GET', '/');
        $content1 = $client->getResponse()->getContent();
        $client->request('GET', '/');
        $content2 = $client->getResponse()->getContent();

        $this->assertNotEquals($content1, $content2);
    }

    public function testUrlGivesSameSentence()
    {
        $client = static::createClient();

        $client->request('GET', '/xyz');
        $content1 = $client->getResponse()->getContent();
        $client->request('GET', '/xyz');
        $content2 = $client->getResponse()->getContent();

        $this->assertEquals($content1, $content2);
    }
}