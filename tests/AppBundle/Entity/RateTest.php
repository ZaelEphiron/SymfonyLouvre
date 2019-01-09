<?php
namespace Tests\AppBundle\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Visitor;
use App\Entity\Rate;
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
}