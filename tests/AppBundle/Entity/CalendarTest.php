<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Calendar;
use PHPUnit\Framework\TestCase;

class CalendarTest extends TestCase
{
    protected $calendar;
    
    public function setUp()
    {
        $this->calendar = new calendar();
    }
    
    /**
     * Get id
     *
     * @return int
     */
     public function testgetPositiveId()
     {
        $calendar = new Calendar();

        $this->assertSame(1,$calendar->getId());    
     }
    
    public function testgetNegativeId()
     {
        $calendar = new Calendar();

        $this->assertSame(-1,$calendar->getId());    
     }
     
     public function testgetGoodDay()
     {
        $calendar = new Calendar();

        $this->assertSame('jeudi',$calendar->getDay());   
     }
    
    public function testgetBadDay()
     {
        $calendar = new Calendar();

        $this->assertSame('mardi',$calendar->getDay());   
     }
     
     public function testsetGoodDay($day)
     {
        $calendar = new Calendar();

        $this->assertSame('jeudi',$calendar->setDay());   
     }
    
     public function testsetBadDay($day)
     {
        $calendar = new Calendar();

        $this->assertSame('mardi',$calendar->setDay());   
     }
     
     public function testgetOneVisitor(): ?int 
     {
        $calendar = new Calendar();

        $this->assertSame(1,$calendar->getNbVisitor());   
     }
    
    public function testgetAnyVisitor(): ?int 
    {
        $calendar = new Calendar();

        $this->assertSame(2,$calendar->getNbVisitor());   
    }
    
    public function testgetNoVisitor(): ?int 
    {
        $calendar = new Calendar();

        $this->assertSame(0,$calendar->getNbVisitor());   
    }
     
     public function testsetOneVisitor(int $nbVisitor): self 
     {
        $calendar = new Calendar();

        $this->assertSame(1,$calendar->setNbVisitor(1));   
     }
    
    public function testsetAnyVisitor(int $nbVisitor): self 
     {
        $calendar = new Calendar();

        $this->assertSame(2,$calendar->setNbVisitor(2));   
     }
    
    public function testsetNoVisitor(int $nbVisitor): self 
     {
        $calendar = new Calendar();

        $this->assertSame(0 ,$calendar->setNbVisitor(0));   
     }
    
    public function tearDown()
    {
        $this->calendar = null;
    }
}