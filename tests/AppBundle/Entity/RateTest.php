<?php
namespace Tests\AppBundle\CalculPrix;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\AppBundle\Entity\Visitor;
use Symfony\AppBundle\Entity\Rate;
use Symfony\AppBundle\Entity\Ticket;

class PrixBilletTest extends WebTestCase
{
    public function testPriceToChildRate()
    {
        $visitor = new Visitor();
        
        $format = 'Y-m-d';
		
        $date = \DateTime::createFromFormat($format, '2009-02-15');
        
        $visitor->setBirthDate($date);
        
        $price = new Ticket();
        
        $result = $price->getPrice([$visitor]);
        
        $this->assertEquals(800, $result);
    }
    
    public function testPriceToNormalRate()
    {
        $visitor = new Visitor();
        
        $format = 'Y-m-d';
		
        $date = \DateTime::createFromFormat($format, '2000-02-15');
        
        $visitor->setBirthDate($date);
        
        $price = new Ticket();
        
        $result = $price->getPrice([$visitor]);
        
        $this->assertEquals(1600, $result);
    }
    
    public function testPriceToSeniorRate()
    {
        $visitor = new Visitor();
        
        $format = 'Y-m-d';
		
        $date = \DateTime::createFromFormat($format, '1955-02-15');
        
        $visitor->setBirthDate($date);
        
        $price = new Ticket();
        
        $result = $price->getPrice([$visitor]);
        
        $this->assertEquals(1200, $result);
    }
    
    public function testPriceToFreeRate()
    {
        $visitor = new Visitor();
        
        $format = 'Y-m-d';
		
        $date = \DateTime::createFromFormat($format, '2016-02-15');
        
        $visitor->setBirthDate($date);
        
        $price = new Ticket();
        
        $result = $price->getPrice([$visitor]);
        
        $this->assertEquals(0, $result);
    }
    
    public function testPriceToReducedRate()
    {
        $visitor = new Visitor();
        
        $format = 'Y-m-d';
		
        $date = \DateTime::createFromFormat($format, '1994-02-15');
        
        $visitor->setBirthDate($date);
        
        $visitor->setReducedRate(true);
        
        $price = new Ticket();
        
        $result = $price->getPrice([$visitor]);
        
        $this->assertEquals(1000, $result);
    }
    
    public function testPriceToReducedSeniorRate()
    {
        $visitor = new Visitor();
        
        $format = 'Y-m-d';
		
        $date = \DateTime::createFromFormat($format, '1954-02-15');
        
        $visitor->setBirthDate($date);
        
        $visitor->setReducedRate(true);
        
        $price = new Ticket();
        
        $result = $price->getPrice([$visitor]);
        
        $this->assertEquals(1000, $result);
    }
    
    public function testTwoNormalRateAndOneSeniorRate()
    {
    	$format = 'Y-m-d';
        
        $Bobby = new Visitor();
        
        $Manuel= new Visitor();
        
        $Armand= new Visitor();
        
        $birthDateBobby = \DateTime::createFromFormat($format, '1954-02-15');
		
        $Bobby->setBirthDate($birthDateBobby);
		
        $BirthDateManuel = \DateTime::createFromFormat($format, '1994-02-15');
		
        $Manuel->setBirthDate($birthDateManuel);
		
        $birthDateArmand = \DateTime::createFromFormat($format, '1994-06-15');
		
        $Armand->setBirthDate($birthDateArmand);
     
        $price = new Ticket();
        
        $result = $price->getPrice([$Bobby, $Manuel, $Armand]);
        
        $this->assertEquals(4400, $result);
    }
}