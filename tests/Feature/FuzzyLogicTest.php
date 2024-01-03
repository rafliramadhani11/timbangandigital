<?php

namespace Tests\Feature;

use Tests\TestCase;

class FuzzyLogicTest extends TestCase
{
    public function testVariableUmurIMT(){
        $res = calculateIMTU(5, 10.3, true);
        echo $res;
        self::assertEquals(1, 1);
    }

    public function testVariableUmurBB(){
        $res = calculateBBU(5, 7, true);
        echo $res;
        self::assertEquals(1, 1);
    }

    public function testVariableUmurTB(){
        $res = calculateTBU(5, 70, true);
        echo $res;
        self::assertEquals(1, 1);
    }
}
