<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Visitor;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VisitorTest extends WebTestCase
{
  public function testName()
    {
        $visitor = $this->getMockForAbstractClass('App\Entity\Visitor');
        $visitor->setName('Georges');
        
        $this->assertNotNull($visitor->getName());
        $this->assertEquals('Georges', $visitor->getName());
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
    
    public function testBirth()
    {
        $visitor = $this->getMockForAbstractClass('App\Entity\Visitor');
        $visitor->setBirth('2001-01-01');
        
        $this->assertNotNull($visitor->getBirth());
        $this->assertEquals('2001-01-01', $visitor->getBirth());
    }
    
    public function testReduction()
    {
        $visitor = $this->getMockForAbstractClass('App\Entity\Visitor');
        $visitor->setReduction(false);
        
        $this->assertNotNull($visitor->getReduction());
        $this->assertEquals(false, $visitor->getReduction());
    }
}