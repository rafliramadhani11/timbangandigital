<?php
class FuzzySet {
  public $name;
  public $universe;
  public $membershipFunction;

  public function __construct($name, $universe, $membershipFunction) {
    $this->name = $name;
    $this->universe = $universe;
    $this->membershipFunction = $membershipFunction;
  }

  public function getMembership($value) {
    return call_user_func($this->membershipFunction, $value, $this->universe);
  }
}

function low_membership_function($value, $range){
    list($min, $max) = $range;
    if($value <= $min) return 1;
    else if($value <= $max) return ($max - $value) / ($max - $min);
    else return 0;
}

function medium_membership_function($value, $range){
    list($min, $max) = $range;
    if ($value <= $min) {
        return 0;
    } else if ($value >= $max) {
        return 1;
    } else {
        return ($value - $min) / ($max - $min);
    }
}

function high_membership_function($value, $range){
    list($min, $max) = $range;
    if($value <= $min) return 0;
    else if($value <= $max) return ($value - $max) / ($max - $min);
    else return 1;
}


// Function to evaluate a single rule
function evaluateRule($rule, $inputValues) {
  $firingStrength = 1;
  foreach ($rule["IF"] as $variable => $fuzzySet) {
    $membership = $fuzzySet->getMembership($inputValues[$variable]);
    $firingStrength = min($firingStrength, $membership); // MIN T-norm
  }
  return [$rule["THEN"], $firingStrength];
}

// Function to defuzzify using the Centroid Method
function centroidDefuzzify($firedRules) {
  $numerator = 0;
  $denominator = 0;
  foreach ($firedRules as $ruleData) {
    list($fuzzySet, $firingStrength) = $ruleData;
    $universe = $fuzzySet->universe;
    for ($value = $universe[0]; $value <= $universe[1]; $value++) {
      $membership = $fuzzySet->getMembership($value);
      $numerator += $value * $membership * $firingStrength;
      $denominator += $membership * $firingStrength;
    }
  }
  return $numerator / $denominator;
}

/*
Panggil fungsi ini untuk prediksi nilai gizi berdasarkan indeks masa tubuh (imt) dan usia
parameter : 
    - usia
    - imt
*/


function fuzzy_imt_usia($usia, $imt){
    // Fuzzy sets for usia
    $fase1 = new FuzzySet("fase1", [0, 4], "low_membership_function");
    $fase2 = new FuzzySet("fase2", [3, 8], "medium_membership_function");
    $fase3 = new FuzzySet("fase3", [7, 12], "high_membership_function");

    // Fuzzy sets for imt
    $low = new FuzzySet("low", [10.2, 13.4], "low_membership_function");
    $medium = new FuzzySet("medium", [11.1, 19.8], "medium_membership_function");
    $high = new FuzzySet("high", [18.1, 21.6, 40], "high_membership_function");

    // Fuzzy sets for output
    $underweight = new FuzzySet("underweight", [10.15, 13.05], "low_membership_function");
    $normal = new FuzzySet("normal", [11.1, 19.7], "medium_membership_function");
    $obesitas = new FuzzySet("obesitas", [17.9, 21.6], "high_membership_function");

    // Fuzzy rules
    $rules = [
    [
        "IF" => ["usia" => $fase1, "imt" => $low],
        "THEN" => $underweight
    ],
    [
        "IF" => ["usia" => $fase1, "imt" => $medium],
        "THEN" => $normal
    ],
    [
        "IF" => ["usia" => $fase1, "imt" => $high],
        "THEN" => $obesitas
    ],
    [
        "IF" => ["usia" => $fase2, "imt" => $low],
        "THEN" => $underweight
    ],
    [
        "IF" => ["usia" => $fase2, "imt" => $medium],
        "THEN" => $normal
    ],
    [
        "IF" => ["usia" => $fase2, "imt" => $high],
        "THEN" => $obesitas
    ],
    [
        "IF" => ["usia" => $fase3, "imt" => $low],
        "THEN" => $underweight
    ],
    [
        "IF" => ["usia" => $fase3, "imt" => $medium],
        "THEN" => $normal
    ],
    [
        "IF" => ["usia" => $fase3, "imt" => $high],
        "THEN" => $obesitas
    ]
    ];

    $firedRules = [];
    foreach ($rules as $rule) {
    $firedRules[] = evaluateRule($rule, ["usia" => $usia, "imt" => $imt]);
    }

    $defuzzifiedOutput = centroidDefuzzify($firedRules);

    // Interpret the output based on fuzzy set definitions
    $outputFuzzySet = null;
    foreach ($firedRules as $ruleData) {
        list($fuzzySet, $firingStrength) = $ruleData;
        if ($outputFuzzySet === null || $firingStrength > $outputFuzzySet->firingStrength) {
            $outputFuzzySet = $fuzzySet;
        }
    }

    return $outputFuzzySet->name;
}

/*
Panggil fungsi ini untuk prediksi nilai gizi berdasarkan berat badan (bb) dan usia
parameter : 
    - usia
    - bb
*/

function fuzzy_bb_usia($usia, $bb){
    // Fuzzy sets for usia
    $fase1 = new FuzzySet("fase1", [0, 4], "low_membership_function");
    $fase2 = new FuzzySet("fase2", [3, 8], "medium_membership_function");
    $fase3 = new FuzzySet("fase3", [7, 12], "high_membership_function");

    // Fuzzy sets for bb
    $low = new FuzzySet("low", [2.1, 6.9], "low_membership_function");
    $medium = new FuzzySet("medium", [2.5, 12.0], "medium_membership_function");
    $high = new FuzzySet("high", [5.0, 13.3], "high_membership_function");

    // Fuzzy sets for output
    $underweight = new FuzzySet("underweight", [2.05, 6.6], "low_membership_function");
    $normal = new FuzzySet("normal", [2.45, 11.75], "medium_membership_function");
    $obesitas = new FuzzySet("obesitas", [4.9, 13.2], "high_membership_function");

    // Fuzzy rules
    $rules = [
    [
        "IF" => ["usia" => $fase1, "bb" => $low],
        "THEN" => $underweight
    ],
    [
        "IF" => ["usia" => $fase1, "bb" => $medium],
        "THEN" => $normal
    ],
    [
        "IF" => ["usia" => $fase1, "bb" => $high],
        "THEN" => $obesitas
    ],
    [
        "IF" => ["usia" => $fase2, "bb" => $low],
        "THEN" => $underweight
    ],
    [
        "IF" => ["usia" => $fase2, "bb" => $medium],
        "THEN" => $normal
    ],
    [
        "IF" => ["usia" => $fase2, "bb" => $high],
        "THEN" => $obesitas
    ],
    [
        "IF" => ["usia" => $fase3, "bb" => $low],
        "THEN" => $underweight
    ],
    [
        "IF" => ["usia" => $fase3, "bb" => $medium],
        "THEN" => $normal
    ],
    [
        "IF" => ["usia" => $fase3, "bb" => $high],
        "THEN" => $obesitas
    ]
    ];

    $firedRules = [];
    foreach ($rules as $rule) {
    $firedRules[] = evaluateRule($rule, ["usia" => $usia, "bb" => $bb]);
    }

    $defuzzifiedOutput = centroidDefuzzify($firedRules);

    // Interpret the output based on fuzzy set definitions
    $outputFuzzySet = null;
    foreach ($firedRules as $ruleData) {
        list($fuzzySet, $firingStrength) = $ruleData;
        if ($outputFuzzySet === null || $firingStrength > $outputFuzzySet->firingStrength) {
            $outputFuzzySet = $fuzzySet;
        }
    }

    return $outputFuzzySet->name;
}

/*
Panggil fungsi ini untuk prediksi nilai gizi berdasarkan tinggi badan (tb) dan usia
parameter : 
    - usia
    - tb
*/

function fuzzy_tb_usia($usia, $tb){
    // Fuzzy sets for usia
    $fase1 = new FuzzySet("fase1", [0, 4], "low_membership_function");
    $fase2 = new FuzzySet("fase2", [3, 8], "medium_membership_function");
    $fase3 = new FuzzySet("fase3", [7, 12], "high_membership_function");

    // Fuzzy sets for tb
    $low = new FuzzySet("low", [44.2, 68.6], "low_membership_function");
    $medium = new FuzzySet("medium", [46.1, 80.5], "medium_membership_function");
    $high = new FuzzySet("high", [55.6, 82.9], "high_membership_function");

    // Fuzzy sets for output
    $stunted = new FuzzySet("stunted", [43.9, 67.45], "low_membership_function");
    $normal = new FuzzySet("normal", [45.75, 79.85], "medium_membership_function");
    $tinggi = new FuzzySet("tinggi", [56.15, 82.3], "high_membership_function");

    // Fuzzy rules
    $rules = [
    [
        "IF" => ["usia" => $fase1, "tb" => $low],
        "THEN" => $stunted
    ],
    [
        "IF" => ["usia" => $fase1, "tb" => $medium],
        "THEN" => $normal
    ],
    [
        "IF" => ["usia" => $fase1, "tb" => $high],
        "THEN" => $tinggi
    ],
    [
        "IF" => ["usia" => $fase2, "tb" => $low],
        "THEN" => $stunted
    ],
    [
        "IF" => ["usia" => $fase2, "tb" => $medium],
        "THEN" => $normal
    ],
    [
        "IF" => ["usia" => $fase2, "tb" => $high],
        "THEN" => $tinggi
    ],
    [
        "IF" => ["usia" => $fase3, "tb" => $low],
        "THEN" => $stunted
    ],
    [
        "IF" => ["usia" => $fase3, "tb" => $medium],
        "THEN" => $normal
    ],
    [
        "IF" => ["usia" => $fase3, "tb" => $high],
        "THEN" => $tinggi
    ]
    ];

    $firedRules = [];
    foreach ($rules as $rule) {
    $firedRules[] = evaluateRule($rule, ["usia" => $usia, "tb" => $tb]);
    }

    $defuzzifiedOutput = centroidDefuzzify($firedRules);

    // Interpret the output based on fuzzy set definitions
    $outputFuzzySet = null;
    foreach ($firedRules as $ruleData) {
        list($fuzzySet, $firingStrength) = $ruleData;
        if ($outputFuzzySet === null || $firingStrength > $outputFuzzySet->firingStrength) {
            $outputFuzzySet = $fuzzySet;
        }
    }

    return $outputFuzzySet->name;
}

echo "tb dan usia : " . fuzzy_tb_usia(5, 50) . "\n";
echo "bb dan usia : " . fuzzy_bb_usia(5, 18) . "\n";
echo "imt dan usia : " . fuzzy_tb_usia(5, 13) . "\n";