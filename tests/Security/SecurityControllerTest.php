<?php

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testRedirectLoggedInUser()
    {
        $client = static::createClient();
        $user = new User();
        $user->setFullName('John Doe');
        $user->setEmail('john@example.com');
        $user->setPassword('password');
        $user->setRoles([User::ROLE_USER]);
        $client->loginUser($user);
        // Effectue une requête GET vers la page de connexion
        $client->request('GET', '/login');
        // Vérifie si le client est redirigé vers une autre page
        $this->assertTrue($client->getResponse()->isRedirect());
    }


    public function testAuthenticationError()
    {
        $client = static::createClient();
        $client->request('POST', '/login', [
            'username' => 'invalid_username',
            'password' => 'invalid_password',
        ]);
        $this->assertSelectorTextContains('.alert-danger', 'Invalid credentials');
    }


    public function testLogout()
    {
        $client = static::createClient();
        $client->request('GET', '/logout');
        // Vérifie si le client reçoit une exception comme prévu
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('This should never be reached!');
    }
}
