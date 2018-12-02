<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Ticket;
use App\Repository\TicketRepository;
use App\Form\TicketingType;

use Symfony\Vendor\Autoload;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class TicketingController extends Controller
{
    /**
    * @Route("/", name="home")
    */
    public function home() 
    {
        return $this->render('ticketing/ticketing.html.twig', [
        'title' => 'Bienvenue sur la billetterie en ligne du musée du Louvre',
        'content' => 'Le musée du Louvre, inauguré en 1793 sous l\'appellation Muséum central des arts de la République dans le palais du Louvre, ancienne résidence royale située au centre de Paris, est aujourd\'hui le plus grand musée d\'art et d\'antiquités au monde. Sa surface d\'exposition est de 72 735 m26.

        Fin 2016, ses collections comprenaient 554 731 œuvres, dont 35 000 exposées et 264 486 œuvres graphiques. Celles-ci présentent l\'art occidental du Moyen Âge à 1848, celui des civilisations antiques qui l\'ont précédé et influencé (orientales, égyptienne, grecque, étrusque et romaine), les arts des premiers chrétiens et de l\'Islam.

        Situé dans le 1er arrondissement de Paris, sur la rive droite entre la Seine et la rue de Rivoli, le musée se signale par la pyramide de verre de son hall d\'accueil, érigée en 1989 dans la cour Napoléon et qui en est devenue emblématique, tandis que la statue équestre de Louis XIV constitue le point de départ de l\'axe historique parisien.

        En 2017, avec environ 8,1 millions de visiteurs annuels, le Louvre est le musée le plus visité au monde. Il est le site culturel payant le plus visité de France. Parmi ses pièces les plus célèbres figurent La Joconde, la Vénus de Milo, Le Scribe accroupi, La Victoire de Samothrace et le Code de Hammurabi.

        Le Louvre possède une longue histoire de conservation artistique et historique, depuis l\'Ancien Régime jusqu\'à nos jours. À la suite du départ de Louis XIV pour le château de Versailles à la fin du xviie siècle, on y entrepose une partie des collections royales de tableaux et de sculptures antiques. Après avoir durant un siècle hébergé plusieurs académies dont celle de peinture et de sculpture, ainsi que divers artistes logés par le roi, l\'ancien palais royal est véritablement transformé sous la Révolution en « Muséum central des arts de la République ». Il ouvre en 1793 en exposant environ 660 œuvres, essentiellement issues des collections royales ou confisquées chez des nobles émigrés ou dans des églises. Par la suite les collections ne cesseront de s\'enrichir par des prises de guerre, acquisitions, mécénats, legs, donations, et découvertes archéologiques.'
        ]);
    }
    
    /**
     * @Route("/ticketing", name="ticketingForm")
     */
    public function ticketing(Request $request, ObjectManager $manager)
    {   
        $ticket = new Ticket();
        
        $form = $this->createForm(TicketingType::class, $ticket);
        
        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
        }
        
        if($form->isSubmitted() && $form->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($ticket);
            $manager->flush();
        
            return $this->redirectToROute('ticketing/prepare.html.twig');
        }
        
        return $this->render('ticketing/ticketingForm.html.twig', array(
            'formTicketing' => $form->createView(),
            ));
    } 
    
    /**
    * @Route("/praticalInformation", name="praticalInformation")
    */
    public function praticalInformation()
    {
        return $this->render('ticketing/praticalInformation.html.twig');
    }
                             
    // Renvoie le prix d'un ticket en fonction de l'âge du client, du type de son billet et de s'il à droit à une réduction
    public function calculateRate($birthdate, $type, $reducedRate)
    {
        
        // Calcul de l'âge du client
        
        $datetime = date('l jS \of F Y');
        $interval = $birthdate->diff($datetime);
        $age = $interval/365;
        
        // Calcul du tarif en fonction de l'âge
        
        if($age > 12){
            $price = 16;
            $rate = 'normal';
        }
        elseif($age < 12 || $age > 4){
            $price = 8;
            $rate = 'child';
        }
        elseif($age > 60){
            $price = 12;
            $rate = 'senior';
        }
        elseif($reducedRate = true){
            $price = 10;
            $rate = 'reduced';
        }
        else{
        echo "error";
        }
        
        // Vérifie le type du billet et divise par deux si demi-journée
        
        if($type = false){
            $price = $price/2;
        }
        
        return $price;
    }
    
    public function sendMail($emailOrder)
    {

        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.example.org', 25))
          ->setUsername('your username')
          ->setPassword('your password')
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Wonderful Subject'))
          ->setFrom(['Ticketing@muséedulouvre.com'])
          ->setTo([$emailOrder])
          ->setBody('L\'achat de votre billet d\'entrée au Louvre à bien était pris en compte. Cordialement, Le musée du Louvre.')
          ;

        // Send the message
        $result = $mailer->send($message);
    }
    
    
}   
