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
}