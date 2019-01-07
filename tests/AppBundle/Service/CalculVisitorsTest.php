<?php
namespace App\Service;

use PHPUnit\Framework\TestCase;
use App\Entity\Ticket;
//use App\Entity\Calendar;
use App\Service\CalculVisitors;

class CalculVisitorsTest extends TestCase
{
    public function testgetCalculVisitors(Ticket $ticket)
    {
        $calculVisitors = new CalculVisitors();

        $this->assertSame(1800, $calculVisitor->CalculRate(new DateTime('1993-3-20'), false, new DateTime('2018-12-29')));
    }
    
    public function testcalculNormalRate($birthday, $reduction, $dateVisit)
    {
        $calculNormalRate = new CalculVisitors('20/03/1993', false, '10/01/2019');

        $this->assertSame(1800, $ticket->getPrice());
    }
    
    public function testcalculChildRate($birthday, $reduction, $dateVisit)
    {
        $ticket = new Ticket('20/03/2012', false, '10/01/2019');

        $this->assertSame(800, $ticket->getPrice());
    }
    
    public function testcalculSeniorRate($birthday, $reduction, $dateVisit)
    {
        $ticket = new Ticket('20/03/1940', false, '10/01/2019');

        $this->assertSame(1200, $bill->getPrice());
    }
    
    public function testcalculReductRate($birthday, $reduction, $dateVisit)
    {
        $ticket = new Ticket('20/03/1993', true, '10/01/2019');

        $this->assertSame(1000, $bill->getPrice());
    }
}