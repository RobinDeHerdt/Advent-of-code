<?php

$number = readline("Gimme that puzzle input \n");

$peel = 0;
$spiral_width = 1;
while (pow($spiral_width, 2) < $number) {
  $spiral_width += 2;
  $peel += 1;
}

$peel_number_count = $peel * 8;
$spiral_number_count = pow($spiral_width, 2);

# Lower bound is not part of the current peel. Keep that in mind.
$peel_lower_bound = $spiral_number_count - $peel_number_count;
$peel_upper_bound = $spiral_number_count;
$peel_position = $number - $peel_lower_bound;

echo "Spiral width: " . $spiral_width . "\n";
echo "Spiral peel: " . $peel . "\n";
echo "Number count on this peel: " . $peel_number_count . "\n";
echo "Peel lower bound: " . $peel_lower_bound . "\n";
echo "Peel upper bound: " . $peel_upper_bound . "\n";
echo "Peel position: " . $peel_position . "\n";
