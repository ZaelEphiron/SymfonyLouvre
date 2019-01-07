<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Visitor;
use PHPUnit\Framework\TestCase;

class VisitorTest extends TestCase
{
    protected $visitor;
    
    public function setUp()
    {
        $this->visitor = new Visitor();
    }
    /**
    * Get id
    *
    * @return int
    */
    public function testgetId()
    {
        $visitor = new Visitor();

        $this->assertSame($visitor->getId());
    }
    
    /**
    * Set firstname
    *
    * @param string $firstName
    *
    * @return Visitor
    */
    public function testsetFirstName($firstName)
    {
        $visitor = new Visitor();

        $this->assertSame($visitor->setFirstName());
    }
    
    /**
    * Get firstName
    *
    * @return string
    */
    public function testgetFirstName()
    {
        $visitor = new Visitor();

        $this->assertSame($visitor->getFirstName());
    }
    
    /**
    * Set lastName
    *
    * @param string $lastName
    *
    * @return Visitor
    */
    public function testsetLastName($lastName)
    {
        $visitor = new Visitor();

        $this->assertSame($visitor->setLastName());
    }
    
    /**
    * Get lastName
    *
    * @return string
    */
    public function testgetLastName()
    {
        $visitor = new Visitor();

        $this->assertSame($visitor->getLastName());
    }
    
    /**
    * Set birthday
    *
    * @param \DateTime $birthday
    *
    * @return Visitor
    */
    public function testsetBirthday($birthday)
    {
        $visitor = new Visitor();

        $this->assertSame($visitor->setBirthday());
    }
    
    /**
    *
    * @return \DateTime
    */
    public function testgetBirthday()
    {
        $visitor = new Visitor();

        $this->assertSame($visitor->getBirthday());
    }
    
    /**
    * Set reduction
    *
    * @param boolean $reduction
    *
    * @return Visitor
    */
    public function testsetTrueReduction($reduction)
    {
        $visitor = new Visitor();

        $this->assertSame(true, $visitor->setReduction(true));
    }
    
    /**
    * Get reduction
    *
    * @return bool
    */
    public function testgetTrueReduction()
    {
        $visitor = new Visitor();

        $this->assertSame(true, $visitor->getReduction());
    }
    
    public function testsetFalseReduction($reduction)
    {
        $visitor = new Visitor();

        $this->assertSame(false, $visitor->setReduction(false));
    }
    
    /**
    * Get reduction
    *
    * @return bool
    */
    public function testgetFalseReduction()
    {
        $visitor = new Visitor();

        $this->assertSame(false, $visitor->getReduction());
    }
    
    /**
    * Set country
    *
    * @param string $country
    *
    * @return Visitor
    */
    public function testsetFrenchVisitor($country)
    {
        $visitor = new Visitor();

        $this->assertSame('French',$visitor->setCountry('French'));
    }
    
    /** 
    * Get country
    *
    * @return string
    */
    public function testgetFrenchVisitor()
    {
        $visitor = new Visitor();

        $this->assertSame('French',$visitor->getCountry());
    }
    
    public function testsetEnglishVisitor($country)
    {
        $visitor = new Visitor();

        $this->assertSame('English',$visitor->setCountry('English'));
    }
    
    /** 
    * Get country
    *
    * @return string
    */
    public function testgetEnglishVisitor()
    {
        $visitor = new Visitor();

        $this->assertSame('English',$visitor->getCountry());
    }
    
    /**
    * Set ticket
    *
    * @param \App\Entity\Ticket $ticket
    *
    * @return Visitor
    */
    public function testsetTicket(Ticket $ticket)
    {
        $visitor = new Visitor();

        $this->assertSame($visitor->setTicket());
    }
    
    /**
    * Get ticket
    *
    * @return \App\Entity\Ticket
    */
    public function testgetTicket()
    {
        $visitor = new Visitor();

        $this->assertSame($visitor->getTicket());
    }
    
    /** 
    * Set rate
    *
    * @param integer $rate
    *
    * @return Visitor
    */
    public function testsetNormalRate($rate)
    {
        $visitor = new Visitor();

        $this->assertSame('Normal', $visitor->setRate('Normal'));
    }
    
    /**
    * Get rate
    *
    * @return integer
    */
    public function testgetNormalRate()
    {
        $visitor = new Visitor();

        $this->assertSame('Normal', $visitor->getRate());
    }
    
    public function testsetChildRate($rate)
    {
        $visitor = new Visitor();

        $this->assertSame('Child', $visitor->setRate('Child'));
    }
    
    /**
    * Get rate
    *
    * @return integer
    */
    public function testgetChildRate()
    {
        $visitor = new Visitor();

        $this->assertSame('Child', $visitor->getRate());
    }
    
    public function testsetSeniorRate($rate)
    {
        $visitor = new Visitor();

        $this->assertSame('Senior', $visitor->setRate('Senior'));
    }
    
    /**
    * Get rate
    *
    * @return integer
    */
    public function testgetSeniorRate()
    {
        $visitor = new Visitor();

        $this->assertSame('Senior', $visitor->getRate());
    }
    
    public function testsetReductRate($rate)
    {
        $visitor = new Visitor();

        $this->assertSame('Reduct',$visitor->setRate('Reduct'));
    }
    
    /**
    * Get rate
    *
    * @return integer
    */
    public function testgetReductRate()
    {
        $visitor = new Visitor();

        $this->assertSame('Reduct',$visitor->getRate());
    }
    
    public function tearDown()
    {
        $this->visitor = null;
    }
}