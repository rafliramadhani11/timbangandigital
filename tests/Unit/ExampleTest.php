<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $status = calculateIMTU(5, 13, true);
        echo $status;
        $this->assertTrue(true);
    }
}
