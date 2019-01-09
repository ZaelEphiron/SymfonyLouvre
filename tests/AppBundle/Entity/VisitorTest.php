<?php

namespace Tests\AppBundle\Entity;

use App\Entity\Visitor;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VisitorTest extends WebTestCase
{
  public function testLastname()
    {
        $visitor = $this->getMockForAbstractClass('App\Entity\Visitor');
        $visitor->setLastName('Georges');
        
        $this->assertNotNull($visitor->getLastName());
        $this->assertEquals('Georges', $visitor->getLastName());
    }
    
    public function testFirstName()
    {
        $visitor = $this->getMockForAbstractClass('App\Entity\Visitor');
        $visitor->setFirstName('Benoit');
        
        $this->assertNotNull($visitor->getFirstName());
        $this->assertEquals('Benoit', $visitor->getFirstName());
    }
    
    public function testCountry()
    {
        $visitor = $this->getMockForAbstractClass('App\Entity\Visitor');
        $visitor->setCountry('France');
        
        $this->assertNotNull($visitor->getCountry());
        $this->assertEquals('France', $visitor->getCountry());
    }
    
    public function testBirthday()
    {
        $visitor = $this->getMockForAbstractClass('App\Entity\Visitor');
        $visitor->setBirthday('2001-01-01');
        
        $this->assertNotNull($visitor->getBirthday());
        $this->assertEquals('2001-01-01', $visitor->getBirthday());
    }
    
    public function testReduction()
    {
        $visitor = $this->getMockForAbstractClass('App\Entity\Visitor');
        $visitor->setReduction(false);
        
        $this->assertNotNull($visitor->getReduction());
        $this->assertEquals(false, $visitor->getReduction());
    }
    
    public function testSetLastName()
    {
        $visitor = new Visitor();
        $lastname = 'Dupont';
        $visitor->setLastName($lastname);
        $this->assertEquals('Dupont', $visitor->getLastName());
    }
    public function testSetFirstName()
    {
        $visitor = new Visitor();
        $firstname = 'Jean';
        $visitor->setFirstName($firstname);
        $this->assertEquals('Jean', $visitor->getFirstName());
    }
    public function testSetCountry()
    {
        $visitor = new Visitor();
        $country = 'France';
        $visitor->setCountry($country);
        $this->assertEquals('France', $visitor->getCountry());
    }
}