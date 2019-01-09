<?php

namespace Tests\AppBundle\Entity;

use App\Entity\Ticket;
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
}