<?php

namespace Tests\AppBundle\Entity;

use App\Entity\Ticket;
use App\Entity\Bill;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BillTest extends WebTestCase
{
    protected $bill;
    
    protected function createBillSerialNumber()
    {
        $bill = new Bill();
        $bill->createSerialNumber();
        return $bill;
    }
    
    protected function createTicket()
    {
        $ticket = new Ticket();
        return $ticket;
    }
    
    protected function createTicketPrice($price)
    {
        $ticket = new Ticket();
        $ticket->setPrice($price);
        return $ticket;
    }
    
    public function setUp()
    {
        $this->bill = new Bill();
    }
    
    public function tearDown()
    {
        $this->bill = null;
    }
    
    public function testDateBill()
    {
        $bill = $this->getMockForAbstractClass('App\Entity\Bill');
        $bill->setDateBill('2001-01-01');
        
        $this->assertNotNull($bill->getDateBill());
        $this->assertEquals('2001-01-01', $bill->getDateBill());
    }
    
    public function testTransactionId()
    {
        $bill = $this->getMockForAbstractClass('App\Entity\Bill');
        $bill->setTransactionId(1);
        
        $this->assertNotNull($bill->getTransactionId());
        $this->assertEquals(1, $bill->getTransactionId());
    }
    
    public function testPrice()
    {
        $ticket = $this->getMockForAbstractClass('App\Entity\Bill');
        $ticket->setPrice(1600);
        
        $this->assertNotNull($ticket->getPrice());
        $this->assertEquals(1600, $ticket->getPrice());
    }
    
    
    public function testSetDateBill()
    {
        $bill = new Bill();
        $dateBill = '2001-01-01';
        $bill->setDateBill($dateBill);
        $this->assertEquals('2001-01-01', $bill->getDateBill());
    }
    
    public function testSetTransactionId()
    {
        $bill = new Bill();
        $transactionId = 1;
        $bill->setTransactionId($transactionId);
        $this->assertEquals(1, $bill->getTransactionId());
    }
    
    public function testSetPrice()
    {
        $bill = new Bill();
        $price = 1600;
        $bill->setPrice($price);
        $this->assertEquals(1600, $bill->getPrice());
    }
}