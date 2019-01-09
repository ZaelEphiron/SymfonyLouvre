<?php
namespace Tests\AppBundle\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use App\Entity\Rate;
use App\Entity\Visitor;
use App\Entity\Ticket;

class RateTest extends WebTestCase
{
    
    protected $rate;
    
    public function testPriceToFreeRate()
    {
        $visitor = new Visitor();
        
        $format = 'Y-m-d';
		
        $date = \DateTime::createFromFormat($format, '2016-02-15');
        
        $visitor->setBirthday($date);
        
        $price = new Ticket();
        
        $result = $price->getPrice([$visitor]);
        
        $this->assertEquals(0, $result);
    }
    
    public function testName()
    {
        $rate = $this->getMockForAbstractClass('App\Entity\Rate');
        $rate->setName('normal');
        
        $this->assertNotNull($rate->getName());
        $this->assertEquals('normal', $rate->getName());
    }
    
    public function testDescription()
    {
        $rate = $this->getMockForAbstractClass('App\Entity\Rate');
        $rate->setDescription('from 12 years old');
        
        $this->assertNotNull($rate->getDescription());
        $this->assertEquals('from 12 years old', $rate->getDescription());
    }
    
    public function testPrice()
    {
        $rate = $this->getMockForAbstractClass('App\Entity\Rate');
        $rate->setPrice(1600);
        
        $this->assertNotNull($rate->getPrice());
        $this->assertEquals(1600, $rate->getPrice());
    }
    
    
    public function testSetName()
    {
        $rate = new Rate();
        $name = 'normal';
        $rate->setName($name);
        $this->assertEquals('normal', $rate->getName());
    }
    
    public function testSetDescription()
    {
        $rate = new Rate();
        $description = 'from 12 years old';
        $rate->setDescription($description);
        $this->assertEquals('from 12 years old', $rate->getDescription());
    }
    
    public function testSetPrice()
    {
        $rate = new Rate();
        $price = 1600;
        $rate->setPrice($price);
        $this->assertEquals(1600, $rate->getPrice());
    }
}