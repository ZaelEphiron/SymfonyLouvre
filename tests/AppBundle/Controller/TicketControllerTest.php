<?php
namespace App\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\BrowserKit\Request;
use App\Service\CheckDate;
use App\Service\CalculVisitors;
use App\Service\CheckNbVisitor;
use App\Service\PaymentTicket;
use App\Entity\Ticket;
use App\Entity\Calendar;
use App\Entity\Rate;
use App\Form\TicketType;



class TicketControllerTest extends TestCase
{
    public function testIndexIsUp()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        
        $this-assertSame(200, $client->getReponse()->getStatusCode());
    }
    
    public function testExpectFooActualFoo()
    {
        $this->expectOutputString('foo');
        print 'foo';
    }

    public function testExpectBarActualBaz()
    {
        $this->expectOutputString('bar');
        print 'baz';
    }
    
    /**
    * @Route({"en" : "/", "fr" : "/"}, name="home", requirements={"_locale": "en|fr"})
    */
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        
        $this->assertSame(200, $crawler->filter('html:contains("Ticket Louvre")')->count());
        
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }
    
    public function testAddNewDayTicket()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        
        $link = $crawler->selectLink('day')->link();
        
        $form = $crawler->selectButton('day-button');
        $form['ticket[dateVisit]'] = '17/01/2019';
        
        $client->submit($form);
        
        $client->followRedirect();
        
        $this->assertSame(1, $crawler->filter('div.day-button')->count());
    }
    
    public function testAddNewHalfDayTicket()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        
        $link = $crawler->selectLink('half day')->link();
        $crawler = $client->click($link);
        
        $form = $crawler->selectButton('half-day-button');
        $form['ticket[dateVisit]'] = '17/01/2019';
        
        $client->submit($form);
        
        $client->followRedirect();
        
        $this->assertSame(1, $crawler->filter('div.half-day-button')->count());
    }
    
    /**
    * @Route({"en" : "/visitors", "fr" : "/visiteurs"}, name="selectVisitor", requirements={"_locale": "en|fr"})
    */
    public function testselectVisitor(Request $request, CalculVisitors $calculVisitors, CheckNbVisitor $checkNbVisitor)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        
        $this->assertSame(1, $crawler->filter('html:contains("Ticket Louvre")')->count());
        
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }
    
    /**
     * @Route({"en" : "/payment", "fr" : "/paiement"}, name="payment", requirements={"_locale": "en|fr"})
    */
    public function testValidpayment(Request $request, PaymentTicket $payment)
    {
        // Créer une instance que l'on va pouvoir modifier
        $stub = $this->getMockBuilder('StripePayment')->getMock();
        // On remplace la méthode() et on retourne ce que l'on veut
        $stub->method('getPayment')->willReturn(['Card number' => '4242424242424242', 'Validation date' => '09','2019']);
        $this->assertEquals('4242424242424242', $stub->first()['4242424242424242']);
    }
    
    public function testRefusedPayment(Request $request, PaymentTicket $payment)
    {
        // Créer une instance que l'on va pouvoir modifier
        $stub = $this->getMockBuilder('StripePayment')->getMock();
        // On remplace la méthode() et on retourne ce que l'on veut
        $stub->method('getPayment')->willReturn(['Card number' => '4000000000000002', 'Validation date' => '09','2019']);
        $this->assertEquals('4000000000000002', $stub->first()['4000000000000002']);
    }
    
    public function testInvalidPayment(Request $request, PaymentTicket $payment)
    {
        // Créer une instance que l'on va pouvoir modifier
        $stub = $this->getMockBuilder('StripePayment')->getMock();
        // On remplace la méthode() et on retourne ce que l'on veut
        $stub->method('getPayment')->willReturn(['Card number' => '4242424242424241', 'Validation date' => '09','2019']);
        $this->assertEquals('4242424242424241', $stub->first()['4242424242424241']);
    }
    
    /**
     * @Route({"en" : "/ticket", "fr" : "/ticket"}, name="showTicket", requirements={"_locale": "en|fr"})
    */
    public function testshowTicket(Request $request)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        
        $this->assertSame(1, $crawler->filter('html:contains("Ticket Louvre")')->count());
        
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }
    /*
     * Change the locale for the current user
     *
     * @param String $language
     * @return array
     *
     * @Route("/{language}", name="setlocale")
     * @Template()
    */
    public function testsetLocale($language = null)
    {
        if($language != null) {
            
            $this->get('session')->set('_locale', $language);
        
        }
    
        $url = $this->container->get('request')->headers->get('referer');
        if(empty($url))
        {
            
            $url = $this->container->get('router')->generate('index');
        
        }
    
        return new RedirectResponse($url);
   }
    
    /**
    * @dataProvider urlProvider
    */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
    public function urlProvider()
    {
        yield ['/'];
        yield ['/visitor'];
        yield ['/payment'];
        yield ['/ticket'];
    }
    
    public function testIndexAction()
    {
        $client = static::createClient();
        $crawler = $client->request(Request::METHOD_GET, '/');
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Bienvenue sur la billetterie du musée du Louvre")')->count()
        );
    }
    
    public function testVisitorAction()
    {
        $client = static::createClient();
        $crawler = $client->request(Request::METHOD_GET, '/visitor');
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Visitor")')->count()
        );
    }
    public function testPaymentAction()
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/payment');
        $this->assertContains('Summery', $client->getResponse()->getContent());
    }
    public function testTicketAction()
    {
        $client = static::createClient();
        $crawler = $client->request(Request::METHOD_GET, '/ticket');
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Thank you !")')->count()
        );
    }
}