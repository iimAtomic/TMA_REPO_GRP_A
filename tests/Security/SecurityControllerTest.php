<?php

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLoginPageIsAccessible()
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }



    public function testAuthenticatedUserIsRedirectedToHomePage()
    {
        $client = static::createClient();
        $user = new User();
        $user->setFullName('John Doe');
        $user->setUsername('john_doe');
        $user->setEmail('invalid_email');
        $user->setPassword('password');
        $user->setRoles([User::ROLE_USER]);
        $client->loginUser($user);

        $client->request('GET', '/login');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertEquals('/', $client->getResponse()->headers->get('Location'));
    }



    public function testAuthenticationErrorsAreDisplayed()
    {
        $client = static::createClient();
        $client->request('POST', '/login', ['_username' => 'invalid_username', '_password' => 'invalid_password']);

        $this->assertStringContainsString('Invalid credentials.', $client->getResponse()->getContent());
    }


    public function testLogoutWorksCorrectly()
    {
        $client = static::createClient();
        $client->request('GET', '/logout');

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('This should never be reached!');
    }


    public function testRedirectAfterSuccessfulLogin()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Login')->form();
        $form['_username'] = 'valid_username';
        $form['_password'] = 'valid_password';
        $client->submit($form);

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertEquals('/admin/index', $client->getResponse()->headers->get('Location'));
    }


    public function testLastUsernameIsPreFilledInLoginForm()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $this->assertEquals('valid_username', $crawler->filter('input[name="_username"]')->attr('value'));
    }


    public function testLoginPageIsAccessibleForAnonymousUsers()
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }





}
