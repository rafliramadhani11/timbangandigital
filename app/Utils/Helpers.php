<?php

use IFaqih\AIMethods\Fuzzy;

function calculateIMTU($umur, $imt, $isMale)
{
    $res = Fuzzy::method(FUZZY_METHOD_MAMDANI)
        ->attributes(
            [
                "umur" =>  [
                    'fase1'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => [0, 4]
                    ],
                    'fase2'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_TRAPEZOID,
                        'domain' => [3, 8]
                    ],
                    'fase3'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_UP,
                        'domain' => [7, 12]
                    ],
                ]
            ],
            [
                "imt" => [
                    'low'    =>  [
                        'membership'    =>  FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain'        =>  $isMale ? [10.2, 13.4] : [10.1, 12.7]
                    ],
                    'medium'    =>  [
                        'membership'    =>  FUZZY_MEMBERSHIP_TRAPEZOID,
                        'domain'        =>  $isMale ? [11.1, 19.8] : [11.1, 19.6]
                    ],
                    'high'    =>  [
                        'membership'    =>  FUZZY_MEMBERSHIP_LINEAR_UP,
                        'domain'        =>  $isMale ? [18.1, 21.6] : [17.7, 21.6]
                    ]
                ]
            ],
            [
                "output" =>  [
                    'wasted'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => [10.15, 13.05]
                    ],
                    'normal'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_TRAPEZOID,
                        'domain' => [11.1, 19.7]
                    ],
                    'obesitas'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_UP,
                        'domain' => [17.9, 21.6]
                    ],
                ]
            ]

        )
        ->rules(
            ['rules'  =>  ["umur" => "fase1", "imt" => "low"], 'result' => 'wasted'],
            ['rules'  =>  ["umur" => "fase1", "imt" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase1", "imt" => "high"], 'result' => 'obesitas'],
            ['rules'  =>  ["umur" => "fase2", "imt" => "low"], 'result' => 'wasted'],
            ['rules'  =>  ["umur" => "fase2", "imt" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase2", "imt" => "high"], 'result' => 'obesitas'],
            ['rules'  =>  ["umur" => "fase3", "imt" => "low"], 'result' => 'wasted'],
            ['rules'  =>  ["umur" => "fase3", "imt" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase3", "imt" => "high"], 'result' => 'obesitas']
        )
        ->set_values([
            'umur' =>  $umur,
            'imt' =>  $imt
        ])
        ->execute();

    if ($res >= 10.15 && $res <= 13.05) {
        $status = "Wasted";
    } else if ($res >= 11.1 && $res <= 19.7) {
        $status = "Normal";
    } else {
        $status = "Resiko Obesitas";
    }

    return $status;
}

function calculateBBU($umur, $bb, $isMale)
{
    $res = Fuzzy::method(FUZZY_METHOD_MAMDANI)
        ->attributes(
            [
                "umur" =>  [
                    'fase1'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => [0, 4]
                    ],
                    'fase2'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_TRAPEZOID,
                        'domain' => [3, 8]
                    ],
                    'fase3'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_UP,
                        'domain' => [7, 12]
                    ],
                ]
            ],
            [
                "bb" =>  [
                    'low'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => $isMale ? [2.1, 6.9] : [2.0, 6.3]
                    ],
                    'medium'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_TRAPEZOID,
                        'domain' => $isMale ? [2.5, 12.0] : [2.4, 11.5]
                    ],
                    'high'    =>  [

                        'membership' => FUZZY_MEMBERSHIP_LINEAR_UP,

                        'domain' => $isMale ? [5.0, 13.3] : [4.8, 13.1]
                    ],
                ]
            ],
            [
                "output" =>  [
                    'underweight'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => [2.05, 6.6]
                    ],
                    'normal'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_TRAPEZOID,
                        'domain' => [2.45, 11.75]
                    ],
                    'obesitas'    =>  [

                        'membership' => FUZZY_MEMBERSHIP_LINEAR_UP,

                        'domain' => [4.9, 13.2]
                    ],
                ]
            ]
        )
        ->rules(

            ['rules'  =>  ["umur" => "fase1", "bb" => "low"], 'result' => 'underweight'],
            ['rules'  =>  ["umur" => "fase1", "bb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase1", "bb" => "high"], 'result' => 'obesitas'],
            ['rules'  =>  ["umur" => "fase2", "bb" => "low"], 'result' => 'underweight'],
            ['rules'  =>  ["umur" => "fase2", "bb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase2", "bb" => "high"], 'result' => 'obesitas'],
            ['rules'  =>  ["umur" => "fase3", "bb" => "low"], 'result' => 'underweight'],
            ['rules'  =>  ["umur" => "fase3", "bb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase3", "bb" => "high"], 'result' => 'obesitas']
        )->set_values([
            'umur' =>  $umur,
            'bb' =>  $bb
        ])->execute();


    if ($res >= 2.05 && $res <= 6.6) {
        $status = "Underweight";
    } else if ($res >= 2.45 && $res <= 11.75) {
        $status = "Normal";
    } else {
        $status = "Resiko Obesitas";
    }

    return $status;
}

function calculateTBU($umur, $tb, $isMale)
{
    $res = Fuzzy::method(FUZZY_METHOD_MAMDANI)
        ->attributes(
            [
                "umur" =>  [
                    'fase1'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => [0, 4]
                    ],
                    'fase2'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_TRAPEZOID,
                        'domain' => [3, 8]
                    ],
                    'fase3'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_UP,
                        'domain' => [7, 12]
                    ],
                ]
            ],
            [
                "tb" =>  [
                    'low'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => $isMale ? [44.2, 68.6] : [43.6, 66.3]
                    ],
                    'medium'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_TRAPEZOID,
                        'domain' => $isMale ? [46.1, 80.5] : [45.4, 79.2]
                    ],
                    'high'    =>  [

                        'membership' => FUZZY_MEMBERSHIP_LINEAR_UP,

                        'domain' => $isMale ? [55.6, 82.9] : [54.7, 81.7]
                    ],
                ]
            ],
            [
                "output" =>  [

                    'stunted'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => [43.9, 67.45]
                    ],
                    'normal'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_TRAPEZOID,
                        'domain' => [45.75, 79.85]
                    ],
                    'tinggi'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_UP,
                        'domain' => [56.15, 82.3]

                    ],
                ]
            ]
        )
        ->rules(

            ['rules'  =>  ["umur" => "fase1", "tb" => "low"], 'result' => 'stunted'],
            ['rules'  =>  ["umur" => "fase1", "tb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase1", "tb" => "high"], 'result' => 'tinggi'],
            ['rules'  =>  ["umur" => "fase2", "tb" => "low"], 'result' => 'stunted'],
            ['rules'  =>  ["umur" => "fase2", "tb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase2", "tb" => "high"], 'result' => 'tinggi'],
            ['rules'  =>  ["umur" => "fase3", "tb" => "low"], 'result' => 'stunted'],
            ['rules'  =>  ["umur" => "fase3", "tb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase3", "tb" => "high"], 'result' => 'tinggi']

        )
        ->set_values([
            'umur' =>  $umur,
            'tb' =>  $tb
        ])
        ->execute();


    if ($res >= 43.9 && $res <= 67.45) {
        $status = "Stunted";
    } else if ($res >= 45.75 && $res <= 79.85) {
        $status = "Medium";
    } else {
        $status = "High";
    }

    return $status;
}
