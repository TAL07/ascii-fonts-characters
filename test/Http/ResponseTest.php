<?php

namespace ASCII\Test\Http;

use ASCII\Http\Response;

class ResponseTest extends \PHPUnit\Framework\TestCase
{

    public function getResponse ()
    {
        return $this->getMockBuilder(Response::class)->getMock();

    }

    public function constructProvider ()
    {
        return [
            ["body", ""],
            ["header", []],
            ["status", "200"],
            ["reason", "OK"],
        ];
    }

    /**
     * @dataProvider constructProvider
     */


// on doit tester 4 attributs (body, header, status, reason)
    public function testConstruct($propName, $value)
    {
        $class = new \ReflectionClass(Response::class);
        $prop = $class->getProperty($propName);
        $prop->setAccessible(true);
        $response = $class->newInstanceArgs([]);    //pr etre sure de passer ds constructeur
      // on verifie que l'attribut a la valeur attendue  
        $this->assertTrue($value === $prop->getValue($response));
        
        
    }


    
    // public function statusProvider()
    // {
    //     return [        //declarer autant d'éléments que de fois ou la metd est invoquee. Chq elt est declare sous f de tableau
    //         [null, null],
    //         [[], []], 
    //         ["Hello", "World"]    
    //     ];
    // }
    // /**
    //  *  @dataProvider attributProvider
    //  *  @expectedException \TypeError
    //  */
    // public function testSetStatus ($status, $reason)
    // {
    //      $this->getResponse()->setStatus($status, $reason);
    // }

    
}