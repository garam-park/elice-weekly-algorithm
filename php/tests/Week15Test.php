<?php

use PHPUnit\Framework\TestCase;

class Week15Test extends TestCase
{
    
    public function testDefault()
    {
        $ret = Week15\solution(5,2,[4,2]);

        $this->assertSame(4,$ret);

        $ret2 = Week15\solution(8,4,[6,2,7,1]);
        
        $this->assertSame(10,$ret2);
    }
}