<?php
namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\CalendarRepository;

class CheckNbVisitorTest extends WebTestCase
{
    private $calendarRepository;
    private $maxVisitorDay = 1000;

    public function __construct(CalendarRepository $calendarRepository)
    {
        $this->calendarRepository = $calendarRepository;
    }
}