<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Ticket;
use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase
{
    protected $ticket;
    
    public function setUp()
    {
        $this->ticket = new Ticket();
    }
    
    public function __testconstruct()
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->__construct());   
    }
    
    /**
    * Add visitor
    *
    * @param \App\Entity\Visitor $visitor
    */
    public function testaddVisitor(Visitor $visitor)
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->addVisitor()); 
    }
    
    /**
    * Update visitor
    *
    * @param \App\Entity\Visitor $visitor
    */
    public function testupdateVisitor(Visitor $visitor)
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->updateVisitor()); 
    }
    
    /**
    * Remove visitor
    *
    * @param \App\Entity\Visitor $visitor
    */
    public function testremoveVisitor(Visitor $visitor)
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->removeVisitor()); 
    }
    
    /**
    * Get visitors
    *
    * @param \App\Entity\Visitor $visitor
    */
    public function testgetVisitors()
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->getVisitors()); 
    }
    
    /**
    * Get id
    *
    * @return int
    */
    public function testgetIdTicket()
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->getId()); 
    }
    
    /**
    * Set halfDay
    *
    * @param boolean $halfDay
    *
    * @return Ticket
    */
    public function testsetHalfDayTicket($halfDay)
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->setHalfDay()); 
    }
    
    /**
    * Get halfDay
    *
    * @return bool
    */
    public function testgetHalfDayTicket()
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->getHalfDay()); 
    }
    
    /**
    * Set bill
    *
    * @param \App\Entity\Bill $bill
    *
    * @return Ticket
    */
    public function testsetBillTicket(\App\Entity\Bill $bill)
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->setBill()); 
    }
    
    /**
    * Get bill
    *
    * @return \AppBundle\Entity\Bill
    */
    public function testgetBillTicket()
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->getBill()); 
    }
    
    /**
    * Set price
    *
    * @param integer $price
    *
    * @return Ticket
    */
    public function testsetPriceTicket($price)
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->setPrice()); 
    }
    
    /**
    * Get price
    *
    * @return integer
    */
    public function testgetPrice()
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->getPrice()); 
    }
    
    /**
    * Set NbVisitor
    *
    * @param integer $nbVisitor
    *
    * @return Ticket
    */
    public function testsetNbVisitor($nbVisitor)
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->setNbVisitor()); 
    }
    
    /** 
    * Get nbVisitor
    *
    * @return integer
    */
    public function testgetNbVisitor()
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->getNbVisitor()); 
    }
    
    /** 
    * Set dateVisit
    *
    * @param \DateTime $dateVisit
    *
    * @return Ticket
    */
    public function testsetDateVisit($dateVisit)
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->setDateVisit()); 
    }
    
    /**
    * Get dateVisit
    *
    * @return \DateTime
    */
    public function testgetDateVisitTicket()
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->getDateVisit()); 
    }
    
    /**
    * Set code
    *
    * @param string $code
    *
    * @return Ticket
    */
    public function testsetCodeTicket($code)
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->setCode()); 
    }
    
    /**
    * Get code
    *
    * @return string
    */
    public function testgetCodeTicket()
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->getCode()); 
    }
    
    /**
    * Set email
    * @param string $email
    *
    * @return Ticket
    */
    public function testsetEmailTicket($email)
    {
        $ticket = new Ticket();

        $this->assertSame($ticket->setEmail()); 
    }
    
    /**
    * Get email
    *
    * @return string
    */
    public function testgetEmailTicket()
    {
       $ticket = new Ticket();

        $this->assertSame($ticket->getEmail());
    }
    
    public function tearDown()
    {
        $this->ticket = null;
    }
}