<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddCommentTest extends WebTestCase
{
    public function testCommentaire()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Connexion')->form();
        $form['username'] = 'utilisateur';
        $form['password'] = 'utilisateur';
        $crawler = $client->submit($form);

        $crawler = $client->request('GET', '/Grabs/89');
        $buttonCrawlerNode = $crawler->selectButton('Envoyer');
        $form = $buttonCrawlerNode->form([
            'comment[content]'    => 'Test ajout commentaire',
        ]);
        $crawler = $client->submit($form);
        $crawler = $client->request('GET', '/Grabs/89');
        $this->assertEquals(1,
            $crawler->filter('p:contains("Test ajout commentaire")')->count()
        );
    }
}