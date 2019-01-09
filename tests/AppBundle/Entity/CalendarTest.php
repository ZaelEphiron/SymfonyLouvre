<?php

namespace Tests\AppBundle\Entity;

use App\Entity\Calendar;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalendarTest extends WebTestCase
{
    protected $calendar;
    
    public function setUp()
    {
        $this->calendar = new calendar();
    }
    
    public function tearDown()
    {
        $this->calendar = null;
    }
}