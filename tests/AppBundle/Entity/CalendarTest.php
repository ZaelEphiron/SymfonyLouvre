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
    
    public function testDay()
    {
        $calendar = $this->getMockForAbstractClass('App\Entity\Calendar');
        $calendar->setDay('monday');
        
        $this->assertNotNull($calendar->getDay());
        $this->assertEquals('monday', $calendar->getDay());
    }
    
    public function testNbVisitor()
    {
        $calendar = $this->getMockForAbstractClass('App\Entity\Calendar');
        $calendar->setNbVisitor(999);
        
        $this->assertNotNull($calendar->getNbVisitor());
        $this->assertEquals(999, $calendar->getNbVisitor());
    }
    
    public function testSetDay()
    {
        $calendar = new Calendar();
        $day = 'monday';
        $calendar->setDay($day);
        $this->assertEquals('monday', $calendar->getDay());
    }
    
    public function testSetNbVisitor()
    {
        $calendar = new Calendar();
        $nbVisitor = 999;
        $calendar->setNbVisitor($nbVisitor);
        $this->assertEquals(999, $calendar->getNbVisitor());
    }
}