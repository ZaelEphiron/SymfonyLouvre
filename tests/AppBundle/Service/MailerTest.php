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

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }
}