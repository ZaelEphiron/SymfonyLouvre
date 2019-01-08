<?php
namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Ticket;

class MailerTest extends WebTestCase
{
    /**
    * @var \Swift_Mailer
    */
    private $mailer;
    private $templating;
    
    /* 
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }
    */
    
    public function testsendError($e, Ticket $ticket)
    {
        // Créer une instance que l'on va pouvoir modifier
        $stub = $this->getMockBuilder('Mailer')->getMock();
        // On remplace la méthode getLastPost() et on retourne ce que l'on veut
        $stub->method('sendError')->willReturn(['name' => 'Dupont', 'firstname' => 'Benoit']);
        $this->assertEquals('Mailer', $stub->first()['name']);
    }
    
    public function testsendTicket(Ticket $ticket)
    {
        // Créer une instance que l'on va pouvoir modifier
        $stub = $this->getMockBuilder('Mailer')->getMock();
        // On remplace la méthode() et on retourne ce que l'on veut
        $stub->method('sendTicket')->willReturn(['name' => 'Dupont', 'firstname' => 'Benoit']);
        $this->assertEquals('Mailer', $stub->first()['name']);
    }
}