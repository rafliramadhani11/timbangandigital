<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;


class ExampleTest extends TestCase
{

    /*
     * Test case untuk variabel umur dan IMT
     */
    public function test_imt_u(): void
    {
        $res = [];
        for($bulan = 0; $bulan <= 12; $bulan++){
            for($imt = 10; $imt <= 13; $imt++){
                $tempRes = calculateIMTU($bulan, $imt, true);
                $res[] = $tempRes;
            }
        }

        $frequencies = array_count_values($res);

        echo "-- Test case variabel IMT -- \n";
        foreach ($frequencies as $value => $frequency) {
            echo "Value: $value | Frequency: $frequency\n";
        }
        echo "\n\n";

        $this->assertTrue(true);
    }

    /*
     * Test case untuk variabel umur dan berat badan
     */
    public function test_bb_u(): void
    {
        $res = [];
        for($bulan = 0; $bulan <= 12; $bulan++){
            for($bb = 2; $bb <= 13; $bb++){
                $tempRes = calculateBBU($bulan, $bb, true);
                $res[] = $tempRes;
            }
        }

        $frequencies = array_count_values($res);
        echo "-- Test case variabel berat badan -- \n";
        foreach ($frequencies as $value => $frequency) {
            echo "Value: $value | Frequency: $frequency\n";
        }
        echo "\n\n";

        $this->assertTrue(true);
    }

    /*
     * Test case untuk variabel umur dan panjang badan atau tinggi badan
     */
    public function test_pb_u(): void
    {
        $res = [];
        for($bulan = 0; $bulan <= 12; $bulan++){
            for($pb = 44; $pb <= 81; $pb++){
                $tempRes = calculateTBU($bulan, $pb, true);
                $res[] = $tempRes;
            }
        }

        $frequencies = array_count_values($res);
        echo "-- Test case variabel panjang badan atau tinggi badan -- \n";
        foreach ($frequencies as $value => $frequency) {
            echo "Value: $value | Frequency: $frequency\n";
        }
        echo "\n\n";

        fuzzy_imt_usia()

        $this->assertTrue(true);
    }

}
