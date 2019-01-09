<?php
namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Service\Mailer;
use App\Entity\Ticket;
use App\Entity\Calendar;
use App\Entity\Bill;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;

class PaymentTicketTest extends WebTestCase
{
    private $secretKey = 'sk_test_LyHbv0Jp2mAPaO6CMDfZMfMa';
    private $current = 'eur';
    private $description = 'TicketLouvre';
    private $mailer;
    private $session;
    private $em;
    
    public function __construct(Mailer $mailer, SessionInterface $session, EntityManagerInterface $em)
    {
        $this->mailer = $mailer;
        $this->session = $session;
        $this->em = $em;
    }
    
}
