<?php
namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\CalendarRepository;

class CheckNbVisitorTest extends WebTestCase
{
    private $calendarRepository;
    private $maxVisitorDay = 1000;
    
    /*
    public function __construct(CalendarRepository $calendarRepository)
    {
        $this->calendarRepository = $calendarRepository;
    }
    */
    
    public function testcalculMaxNbVisitorDay($dateVisit, $nbVisitor)
    {
        $checkNbVisitor = new CheckNbVisitor('20/03/2019',5);

        $this->assertSame(1005, $checkNbVisitor->setNbVisitorDay(1000));
    }
    
    public function testcalculValidNbVisitorDay($dateVisit, $nbVisitor)
    {
        $ticket = new Ticket('20/03/2019', 5);

        $this->assertSame(5, $ticket->setNbVisitorDay(5));
    }
}