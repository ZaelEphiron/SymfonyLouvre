<?php
namespace App\Service;

use PHPUnit\Framework\TestCase;
use App\Service\Mailer;
use App\Entity\Ticket;
use App\Entity\Calendar;
use App\Entity\Bill;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;

class PaymentTicketTest extends TestCase
{
    private $secretKey = 'sk_test_LyHbv0Jp2mAPaO6CMDfZMfMa';
    private $current = 'eur';
    private $description = 'TicketLouvre';
    private $mailer;
    private $session;
    private $em;
    
    /*
    public function __construct(Mailer $mailer, SessionInterface $session, EntityManagerInterface $em)
    {
        $this->mailer = $mailer;
        $this->session = $session;
        $this->em = $em;
    }
    */
    
    public function teststripe($token, $ticket, $array)
    {
        $paymentTicket = new PaymentTicket('sk_test_LyHbv0Jp2mAPaO6CMDfZMfMa', $ticket, $array);

        $this->assertSame(1005, $checkNbVisitor->setNbVisitorDay(1000));
        
        // Créer une instance que l'on va pouvoir modifier
        $stub = $this->getMockBuilder('saveBill')->getMock();
        // On remplace la méthode getLastPost() et on retourne ce que l'on veut
        $stub->method('saveBill')->willReturn(['name' => 'Mon article', 'content' => 'fake content']);
        $this->assertEquals('Mon article', $stub->first()['name']);
              
        $this->expectException(InvalidArgumentException::class);
        
    }
}
