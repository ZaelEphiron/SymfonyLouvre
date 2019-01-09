<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TicketAjaxControllerTest extends WebTestCase
{
    /*
    * @test
    * @group func_ticketAjaxController
    */
    public function testTicketAjaxController()
    {
        $client = static::createClient();
        $client->request('POST', '/calculRate', ['birthday'=> '2000-01-01' , 'reduction'=> false, 'dateVisit'=> '2018-05-30', 'nbVisitor' => 1]);
        //var_dump($client->getResponse()->getContent());
        
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
        $this->assertContains('{"price":1600,"birthday":"2000-01-01T00:00:00+00:00","nbVisitorsDay":999}', $client->getResponse()->getContent());
    }
}