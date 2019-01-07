<?php
namespace App\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\CalculVisitors;
use App\Service\CheckNbVisitor;
//use Symfony\Component\BrowserKit\Response;
//use Symfony\Component\BrowserKit\Request;

class TicketAjaxControllerTest extends TestCase
{
    /**
    * @Route({"en" : "/calculRate", "fr" : "/calculRate"}, name="ajax_rate", requirements={"_locale": "en|fr"})
    */
    public function testcalculNormalRateAction(Request $request, CalculVisitors $calculVisitor, CheckNbVisitor $checkNbVisitor)
    {
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }
    
    public function testcalculChildRateAction(Request $request, CalculVisitors $calculVisitor, CheckNbVisitor $checkNbVisitor)
    {
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }
    
    public function testcalculSeniorRateAction(Request $request, CalculVisitors $calculVisitor, CheckNbVisitor $checkNbVisitor)
    {
       $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }
    
    public function testcalculReductRateAction(Request $request, CalculVisitors $calculVisitor, CheckNbVisitor $checkNbVisitor)
    {
        $stack = [$price, $birthday, $nbVisitorDay, $reducedRate];
        $this->assertSame('20/03/93', $stack[$birthday]);
        $this->assertSame(true, $stack[$reducedRate]);
        array_push($stack, 'reduct');

        $this->assertSame('nbVisitorDay', array_pop($stack));
        $this->assertSame(999, count($stack[$nbVisitorDay]));
    }
}