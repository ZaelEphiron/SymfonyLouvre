<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Bill;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BillTest extends WebTestCase
{
    protected $bill;
    
    public function setUp()
    {
        $this->bill = new Bill();
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function testgetPositiveId()
    {
        $bill = new Bill();

        $this->assertSame(1,$bill->getId());
    }
    
    public function testgetNegativeId()
    {
        $bill = new Bill();

        $this->assertSame(-1,$bill->getId());
    }
    /**
     * Set dateBill
     *
     * @param \DateTime $dateBill
     *
     * @return Bill
     */
    public function testsetFuturDateBill($dateBill)
    {
        $bill = new Bill();

        $this->assertSame('10/01/2019',$bill->setDate('10/01/2019'));
    }
    
    public function testsetPastDateBill($dateBill)
    {
        $bill = new Bill();

        $this->assertSame('10/01/2018',$bill->setDate('10/01/2018'));
    }
    /**
     * Get dateBill
     *
     * @return \DateTime
     */
    public function testgetFuturDateBill()
    {
        $bill = new Bill();

        $this->assertSame('10/01/2019',$bill->getDate());
    }
    
       public function testgetPastDateBill()
    {
        $bill = new Bill();

        $this->assertSame('10/01/2018',$bill->getDate());
    }
    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Bill
     */
    public function testsetNormalPrice($price)
    {
        $bill = new Bill();

        $this->assertSame(1600,$bill->setPrice());
    }
    
    public function testsetChildPrice($price)
    {
        $bill = new Bill();

        $this->assertSame(800,$bill->setPrice());
    }
    
    public function testsetSeniorPrice($price)
    {
        $bill = new Bill();

        $this->assertSame(1200,$bill->setPrice());
    }
    
    public function testsetReductPrice($price)
    {
        $bill = new Bill();

        $this->assertSame(1000,$bill->setPrice());
    }
    
    public function testsetAdditionalPrice($price)
    {
        $bill = new Bill();

        $this->assertSame(3200,$bill->setPrice(3200));
    }
    
    /**
     * Get price
     *
     * @return int
     */
    public function testgetNormalPrice()
    {
        $bill = new Bill();

        $this->assertSame(1600,$bill->getPrice());
    }
    
    public function testgetChildPrice()
    {
        $bill = new Bill();

        $this->assertSame(800,$bill->getPrice());
    }
    
    public function testgetSeniorPrice()
    {
        $bill = new Bill();

        $this->assertSame(1200,$bill->getPrice());
    }
    
    public function testgetReductPrice()
    {
        $bill = new Bill();

        $this->assertSame(1000,$bill->getPrice());
    }
    
    public function testgetAdditionalPrice()
    {
        $bill = new Bill();

        $this->assertSame($price>1600,$bill->getPrice());
    }
    
    /**
     * Set transactionId
     *
     * @param string $transactionId
     *
     * @return Bill
     */
    public function testsetPositiveTransactionId($transactionId)
    {
        $bill = new Bill();

        $this->assertSame(1, $bill->setTransactionId(1));
    }
    
    public function testsetNegativeTransactionId($transactionId)
    {
        $bill = new Bill();

        $this->assertSame(-1, $bill->setTransactionId(-1));
    }
    /**
     * Get transactionId
     *
     * @return string
     */
    public function testgetPositiveTransactionId()
    {
        $bill = new Bill();

        $this->assertSame(1, $bill->getTransactionId());
    }
    
    public function testgetNegativeTransactionId()
    {
        $bill = new Bill();

        $this->assertSame(-1, $bill->getTransactionId());
    }
    
    public function tearDown()
    {
        $this->bill = null;
    }
    
    public function testCreateSerialNumber()
    {
        $bill = $this->createBillSerialNumber();
        $this->assertRegExp('/^MDL_+[a-zA-Z0-9]{13}$/', $bill->getSerialNumber());
    }
    
    public function testUniqueSerialNumber()
    {
        $bill1 = $this->createBillSerialNumber();
        $bill2 = $this->createBillSerialNumber();
        $bill3 = $this->createBillSerialNumber();
        $this->assertNotEquals($bill1, $bill2, $bill3);
    }
    protected function createBillSerialNumber()
    {
        $bill = new Bill();
        $bill->createSerialNumber();
        return $bill;
    }
    
    public function testAddTicket()
    {
        $bill = new Bill();
        $tickets = array(
            $ticket1 = $this->createTicket(),
            $ticket2 = $this->createTicket(),
            $ticket3 = $this->createTicket()
        );
        foreach ($tickets as $tick) {
            $bill->addTicket($tick);
        }
        $number = $bill->getTickets();
        $this->assertEquals(3, $number->count());
    }
    protected function createTicket()
    {
        $ticket = new Ticket();
        return $ticket;
    }
    
    public function testGetTotalPrice()
    {
        $bill = new Bill();
        $tickets = array(
            $ticket1 = $this->createTicketPrice(12),
            $ticket2 = $this->createTicketPrice(10),
            $ticket3 = $this->createTicketPrice(16)
        );
        foreach ($tickets as $tick) {
            $bill->addTicket($tick);
        }
        $total = $bill->getTotalPrice();
        $this->assertEquals(38, $total);
    }
    protected function createTicketPrice($price)
    {
        $ticket = new Ticket();
        $ticket->setPrice($price);
        return $ticket;
    }
}