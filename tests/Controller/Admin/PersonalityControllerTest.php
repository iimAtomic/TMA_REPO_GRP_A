<?php


use App\Repository\PersonalityRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PersonalityControllerTest extends WebTestCase
{

    public function testCreatePersonalityFormSubmission()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/add-personality');

        $form = $crawler->filter('form[name="personality"]')->form();
        $form['personality[name]'] = 'John Doe';
        $form['personality[firstname]'] = 'John';
        $form['personality[bornAt]'] = '1990-01-01 00:00:00';
        $form['personality[dieAt]'] = '2022-12-31 23:59:59';
        $form['personality[description]'] = 'Lorem ipsum dolor sit amet.';

        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect('/affiche-personality'));
        $crawler = $client->followRedirect();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('.personality-card', 'John Doe');
    }
}
