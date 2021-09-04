<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionnalTestsTest extends WebTestCase
{
    public function testShouldShowHomePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Réduisez la taille de vos liens.');
    }

    public function testShouldReduceLink(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();

        $form = $crawler->selectButton('Réduire le lien !')->form();
        $form['link[link]'] = 'https://www.google.fr';
        $crawler = $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Votre lien.');
        $this->assertSelectorTextContains('p', 'https://www.google.fr');
    }

    public function testShouldNotReduceLinkAndStayOnHomePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();

        $form = $crawler->selectButton('Réduire le lien !')->form();
        $form['link[link]'] = 'a.a';
        $crawler = $client->submit($form);

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Réduisez la taille de vos liens.');
    }

    public function testShouldReturn404(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/not-exist');

        $this->assertResponseStatusCodeSame(404);
    }
}
