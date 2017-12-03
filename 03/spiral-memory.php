<?php

$number = readline("Gimme that puzzle input \n");

# The spiral level.
$peel = 0;
# The width of the spiral peel.
$peel_width = 1;

# Calculate the dimensions of the peel for the input we just got.
while (pow($peel_width, 2) < $number) {
  $peel_width += 2;
  $peel += 1;
}

# Get the amount of numbers on the current peel.
$peel_number_count = $peel * 8;
# Get the total amount of numbers in the entire spiral.
$spiral_number_count = pow($peel_width, 2);

# Lower bound is not part of the current peel. Keep that in mind.
$peel_lower_bound = $spiral_number_count - $peel_number_count;
$peel_upper_bound = $spiral_number_count;

# Calculate the position of the number on the current peel.
$peel_position = $number - $peel_lower_bound;

# Calculate the 4 peel centers (1 for each side of the spiral).
$peel_centers = [];
for ($i = 1; $i <= 4; $i++) {
  $distance_to_center = ($peel_width - 1) / 2;
  $peel_centers[] = (($peel_width - 1) * $i) - $distance_to_center;
}

# Calculate the shortest distance to a peel center.
# Set the peel width as the default value.
$shortest_distance = $peel_width;
foreach ($peel_centers as $peel_center) {
  # Get the absolute value of the difference in steps.
  $distance_to_center = abs($peel_center - $peel_position);

  if ($distance_to_center < $shortest_distance) {
    $shortest_distance = $distance_to_center;
  }
}

# Add the shortest distance to the center of the current peel
# to the shortest distance the the center of the spiral.
$total_shortest_distance = $shortest_distance + $peel;

echo "Shortest amount of steps: " . $total_shortest_distance . "\n";
