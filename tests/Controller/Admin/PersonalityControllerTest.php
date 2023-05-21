<?php


namespace App\Tests\Controller\Admin;
use App\Entity\User;
use App\Entity\Personality;
use PHPUnit\Framework\TestCase;

class PersonalityControllerTest extends TestCase
{
    public function testGettersAndSetters()
    {
        $personality = new Personality();

        $name = 'John';
        $personality->setName($name);
        $this->assertEquals($name, $personality->getName());

        $firstname = 'Doe';
        $personality->setFirstname($firstname);
        $this->assertEquals($firstname, $personality->getFirstname());

        $bornAt = new \DateTimeImmutable('1990-01-01');
        $personality->setBornAt($bornAt);
        $this->assertEquals($bornAt, $personality->getBornAt());

        $dieAt = new \DateTimeImmutable('2020-12-31');
        $personality->setDieAt($dieAt);
        $this->assertEquals($dieAt, $personality->getDieAt());

        $description = 'Lorem ipsum';
        $personality->setDescription($description);
        $this->assertEquals($description, $personality->getDescription());
    }

    public function testAgeCalculation()
    {
        $bornAt = new \DateTimeImmutable('1990-01-01');
        $personality = new Personality();
        $personality->setBornAt($bornAt);

        // Calculate age based on current date
        $expectedAge = (new \DateTimeImmutable())->diff($bornAt)->y;
        $this->assertEquals($expectedAge, $personality->getAge());

        // Calculate age based on a specific date
        $specificDate = new \DateTimeImmutable('2023-05-20');
        $expectedAge = $specificDate->diff($bornAt)->y;
        $this->assertEquals($expectedAge, $personality->getAge($specificDate));
    }




}

