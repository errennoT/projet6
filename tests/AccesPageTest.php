<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AccesPageTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testPageNotFound()
    {
        $client = static::createClient();
        $client->request('GET', '/pagenotfound');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }

    public function testAdminIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('Connexion')->form();

        $form['username'] = 'administrateur';
        $form['password'] = 'administrateur';

        $crawler = $client->submit($form);

        $crawler = $client->request('GET', '/admin/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
