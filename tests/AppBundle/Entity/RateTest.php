<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Rate;
use PHPUnit\Framework\TestCase;

class RateTest extends TestCase
{
    protected $rate;
    /*
    public function setUp()
    {
        $this->rate = new Rate();
    }
    */
    
    /**
    * Get id
    *
    * @return integer
    */
    public function testgetPositiveId()
    {
        $rate = new Rate();

        $this->assertSame(1, $rate->getId());    
    }
    
    
    public function testgetNegativeId()
    {
        $rate = new Rate();

        $this->assertSame(-1, $rate->getId());    
    }
    /**
    * Set name
    *
    * @param string $name
    *
    * @return Rate
    */
    public function testsetName($name)
    {
        $rate = new Rate();

        $this->assertSame('Dupont', $rate->setName('Dupont'));   
    }
    
    public function testsetNoName($name)
    {
        $rate = new Rate();

        $this->assertSame('', $rate->setName(''));   
    }
    
    /**
    * Get name
    *
    * @return string
    */
    public function testgetName()
    {
        $rate = new Rate();

        $this->assertSame('Dupont', $rate->getName());   
    }
    
    public function testgetNoName()
    {
        $rate = new Rate();

        $this->assertSame('', $rate->getName());   
    }
    
    /**
    * Set price
    *
    * @param integer $price
    *
    * @return Rate
    */
    public function testsetNormalPrice($price)
    {
        $rate = new Rate();

        $this->assertSame(1600, $rate->setPrice(1600));   
    }
    
    public function testsetChildPrice($price)
    {
        $rate = new Rate();

        $this->assertSame(800, $rate->setPrice(800));   
    }
    
    public function testsetSeniorPrice($price)
    {
        $rate = new Rate();

        $this->assertSame(1200, $rate->setPrice(1200));   
    }
    
    public function testsetReductPrice($price)
    {
        $rate = new Rate();

        $this->assertSame(1000, $rate->setPrice(1000));   
    }
    
    /**
    * Get price
    *
    * @return integer
    */
    public function testgetNormalPrice()
    {
        $rate = new Rate();

        $this->assertSame(1600, $rate->getPrice());   
    }
    
    public function testgetChildPrice()
    {
        $rate = new Rate();

        $this->assertSame(800, $rate->getPrice());   
    }
    
    public function testgetSeniorPrice()
    {
        $rate = new Rate();

        $this->assertSame(1200, $rate->getPrice());   
    }
    
    public function testgetReductPrice()
    {
        $rate = new Rate();

        $this->assertSame(1000, $rate->getPrice());   
    }
    
    /**
    * Set descritpion
    *
    * @param string $description
    *
    * @return Rate
    */
    public function testsetDescriptionNormalRate($description)
    {
        $rate = new Rate();

        $this->assertSame('Normal', $rate->setDescription('Normal'));   
    }
    
    public function testsetDescriptionChildRate($description)
    {
        $rate = new Rate();

        $this->assertSame('Child', $rate->setDescription('Child'));   
    }
    
    public function testsetDescriptionSeniorRate($description)
    {
        $rate = new Rate();

        $this->assertSame('Senior', $rate->setDescription('Senior'));   
    }
    
    public function testsetDescriptionReductRate($description)
    {
        $rate = new Rate();

        $this->assertSame('Reduct', $rate->setDescription('Reduct'));   
    }
    
    /**
    * Get description
    *
    * @return string
    */
    public function testgetDescriptionNormalRate()
    {
        $rate = new Rate();

        $this->assertSame('Normal', $rate->getDescription());   
    }
    
    public function testgetDescriptionChildRate()
    {
        $rate = new Rate();

        $this->assertSame('Child', $rate->getDescription());   
    }
    
    public function testgetDescriptionSeniorRate()
    {
        $rate = new Rate();

        $this->assertSame('Senior', $rate->getDescription());   
    }
    
    public function testgetDescriptionReductRate()
    {
        $rate = new Rate();

        $this->assertSame('Reduct', $rate->getDescription());   
    }
    public function tearDown()
    {
        $this->rate = null;
    }
    
    public function setUp()
    {
        $kernel = self::bootKernel();
        $this->service = $kernel->getContainer()->get('ml_ticketing.compute_price');
    }
    protected function createBill()
    {
        $bill = new Bill();
        $date = new \DateTime('31-01-2018');
        $bill->setVisitDay($date);
        $tickets = array(
            $ticket1 = $this->createTicket("31-08-1990", 0),
            $ticket2 = $this->createTicket("31-08-1990", 1),
            $ticket3 = $this->createTicket("01-01-1958", 0),
            $ticket4 = $this->createTicket("01-01-1958", 1),
            $ticket5 = $this->createTicket("01-01-2010", 0),
            $ticket6 = $this->createTicket("01-01-2015", 0)
        );
        foreach ($tickets as $tick) {
            $bill->addTicket($tick);
        }
        return $bill;
    }
    public function createTicket($date, $reduction)
    {
        $ticket = new Ticket();
        $birthday = new \DateTime($date);
        $ticket->setBirthday($birthday);
        $ticket->setReduction($reduction);
        return $ticket;
    }

    public function testGivePrice()
    {
        $bill = $this->createBill();
        $this->service->givePrice($bill);
        $price = $bill->getTotalPrice();
        $this->assertEquals(56, $price);
    }
}