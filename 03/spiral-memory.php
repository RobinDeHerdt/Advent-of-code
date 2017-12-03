<?php

$number = readline("Gimme that puzzle input \n");

$peel = 0;
$peel_width = 1;
while (pow($peel_width, 2) < $number) {
  $peel_width += 2;
  $peel += 1;
}

$peel_number_count = $peel * 8;
$spiral_number_count = pow($peel_width, 2);

# Lower bound is not part of the current peel. Keep that in mind.
$peel_lower_bound = $spiral_number_count - $peel_number_count;
$peel_upper_bound = $spiral_number_count;
$peel_position = $number - $peel_lower_bound;

$peel_centers = [];
for ($i = 1; $i <= 4; $i++) {
  $distance_to_center = ($peel_width - 1) / 2;
  $peel_centers[] = (($peel_width - 1) * $i) - $distance_to_center;
}

$shortest_distance = $peel_width;
foreach ($peel_centers as $peel_center) {
  $distance_to_center = abs($peel_center - $peel_position);
  if ($distance_to_center < $shortest_distance) {
    $shortest_distance = $distance_to_center;
  }
}

$total_shortest_distance = $shortest_distance + $peel;

echo "Spiral width: " . $peel_width . "\n";
echo "Spiral peel: " . $peel . "\n";
echo "Number count on this peel: " . $peel_number_count . "\n";
echo "Peel lower bound: " . $peel_lower_bound . "\n";
echo "Peel upper bound: " . $peel_upper_bound . "\n";
echo "Peel position: " . $peel_position . "\n";
echo "--------- \n";
foreach ($peel_centers as $peel_center) {
  echo $peel_center . "\n";
}
echo "--------- \n";
echo "Steps from middle: " . $shortest_distance . "\n";
echo "Total steps: " . $total_shortest_distance . "\n";
