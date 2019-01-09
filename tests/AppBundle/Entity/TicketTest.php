<?php

namespace Tests\AppBundle\Entity;

use App\Entity\Ticket;
use App\Entity\Bill;
use App\Entity\Visitor;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TicketTest extends WebTestCase
{
    protected $ticket;
    
    public function setUp()
    {
        $this->ticket = new Ticket();
    }
    
    public function tearDown()
    {
        $this->ticket = null;
    }
    
    public function testCode()
    {
        $ticket = $this->getMockForAbstractClass('App\Entity\Ticket');
        $ticket->setCode('8sa');
        
        $this->assertNotNull($ticket->getCode());
        $this->assertEquals('8sa', $ticket->getCode());
    }
    
    public function testEmail()
    {
        $ticket = $this->getMockForAbstractClass('App\Entity\Ticket');
        $ticket->setEmail('test@louvre.fr');
        
        $this->assertNotNull($ticket->getEmail());
        $this->assertEquals('test@louvre.fr', $ticket->getEmail());
    }
    
    public function testHalfday()
    {
        $ticket = $this->getMockForAbstractClass('App\Entity\Ticket');
        $ticket->setHalfday(true);
        
        $this->assertNotNull($ticket->getHalfday());
        $this->assertEquals(true, $ticket->getHalfday());
    }
    
    
    public function testDateVisit()
    {
        $ticket = $this->getMockForAbstractClass('App\Entity\Ticket');
        $ticket->setDateVisit('2001-01-01');
        
        $this->assertNotNull($ticket->getDateVisit());
        $this->assertEquals('2001-01-01', $ticket->getDateVisit());
    }
    
    public function testPrice()
    {
        $ticket = $this->getMockForAbstractClass('App\Entity\Ticket');
        $ticket->setPrice(8000);
        
        $this->assertNotNull($ticket->getPrice());
        $this->assertEquals(8000, $ticket->getPrice());
    }
    
    public function testNbVisitor()
    {
        $ticket = $this->getMockForAbstractClass('App\Entity\Ticket');
        $ticket->setNbVisitor(5);
        
        $this->assertNotNull($ticket->getNbVisitor());
        $this->assertEquals(5, $ticket->getNbVisitor());
    }
    public function testSetCode()
    {
        $ticket = new Ticket();
        $dateBill = '8sa';
        $ticket->setCode($dateBill);
        $this->assertEquals('8sa', $ticket->getCode());
    }
    
    public function testSetEmail()
    {
        $ticket = new Ticket();
        $email = '8sa';
        $ticket->setEmail($email);
        $this->assertEquals('8sa', $ticket->getEmail());
    }
    
    public function testSetHalfday()
    {
        $ticket = new Ticket();
        $halfday = true;
        $ticket->setHalfday($halfday);
        $this->assertEquals(true, $ticket->getHalfday());
    }
    
    public function testSetDateVisit()
    {
        $ticket = new Ticket();
        $dateVisit = '2001-01-01';
        $ticket->setDateVisit($dateVisit);
        $this->assertEquals('2001-01-01', $ticket->getDateVisit());
    }
    
    public function testSetPrice()
    {
        $ticket = new Ticket();
        $price = 8000;
        $ticket->setPrice($price);
        $this->assertEquals(8000, $ticket->getPrice());
    }
    
    public function testSetNbVisitor()
    {
        $ticket = new Ticket();
        $nbVisitor = 5;
        $ticket->setNbVisitor($nbVisitor);
        $this->assertEquals(5, $ticket->getNbVisitor());
    }
}