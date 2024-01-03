<?php

use IFaqih\AIMethods\Fuzzy;

function calculateIMTU($umur, $imt, $isMale){
    $res = Fuzzy::method(FUZZY_METHOD_MAMDANI)
        ->attributes(
            [
                "umur" =>  [
                    'fase1'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => [0, 4]
                    ],
                    'fase2'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_TRIANGLE,
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
                        'membership'    =>  FUZZY_MEMBERSHIP_TRIANGLE,
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
                        'membership' => FUZZY_MEMBERSHIP_TRIANGLE,
                        'domain' => [11.1, 19.7]
                    ],
                    'obesitas'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
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
    return $res;
}

function calculateBBU($umur, $bb, $isMale){
    $res = Fuzzy::method(FUZZY_METHOD_MAMDANI)
        ->attributes(
            [
                "umur" =>  [
                    'fase1'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => [0, 4]
                    ],
                    'fase2'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_TRIANGLE,
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
                        'membership' => FUZZY_MEMBERSHIP_TRIANGLE,
                        'domain' => $isMale ? [2.5, 12.0] : [2.4, 11.5]
                    ],
                    'high'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
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
                        'membership' => FUZZY_MEMBERSHIP_TRIANGLE,
                        'domain' => [2.45, 11.75]
                    ],
                    'obesitas'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => [4.9, 13.2]
                    ],
                ]
            ]
        )
        ->rules(
            ['rules'  =>  ["umur" => "fase1", "bb" => "low"], 'result' => 'wasted'],
            ['rules'  =>  ["umur" => "fase1", "bb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase1", "bb" => "high"], 'result' => 'obesitas'],
            ['rules'  =>  ["umur" => "fase2", "bb" => "low"], 'result' => 'wasted'],
            ['rules'  =>  ["umur" => "fase2", "bb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase2", "bb" => "high"], 'result' => 'obesitas'],
            ['rules'  =>  ["umur" => "fase3", "bb" => "low"], 'result' => 'wasted'],
            ['rules'  =>  ["umur" => "fase3", "bb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase3", "bb" => "high"], 'result' => 'obesitas']
        )
        ->set_values([
            'umur' =>  $umur,
            'bb' =>  $bb
        ])
        ->execute();
    return $res;
}

function calculateTBU($umur, $tb, $isMale){
    $res = Fuzzy::method(FUZZY_METHOD_MAMDANI)
        ->attributes(
            [
                "umur" =>  [
                    'fase1'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => [0, 4]
                    ],
                    'fase2'   =>  [
                        'membership' => FUZZY_MEMBERSHIP_TRIANGLE,
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
                        'membership' => FUZZY_MEMBERSHIP_TRIANGLE,
                        'domain' => $isMale ? [46.1, 80.5] : [45.4, 79.2]
                    ],
                    'high'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => $isMale ? [55.6, 82.9] : [54.7, 81.7]
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
                        'membership' => FUZZY_MEMBERSHIP_TRIANGLE,
                        'domain' => [2.45, 11.75]
                    ],
                    'obesitas'    =>  [
                        'membership' => FUZZY_MEMBERSHIP_LINEAR_DOWN,
                        'domain' => [4.9, 13.2]
                    ],
                ]
            ]
        )
        ->rules(
            ['rules'  =>  ["umur" => "fase1", "tb" => "low"], 'result' => 'wasted'],
            ['rules'  =>  ["umur" => "fase1", "tb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase1", "tb" => "high"], 'result' => 'obesitas'],
            ['rules'  =>  ["umur" => "fase2", "tb" => "low"], 'result' => 'wasted'],
            ['rules'  =>  ["umur" => "fase2", "tb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase2", "tb" => "high"], 'result' => 'obesitas'],
            ['rules'  =>  ["umur" => "fase3", "tb" => "low"], 'result' => 'wasted'],
            ['rules'  =>  ["umur" => "fase3", "tb" => "medium"], 'result' => 'normal'],
            ['rules'  =>  ["umur" => "fase3", "tb" => "high"], 'result' => 'obesitas']
        )
        ->set_values([
            'umur' =>  $umur,
            'tb' =>  $tb
        ])
        ->execute();
    return $res;
}
