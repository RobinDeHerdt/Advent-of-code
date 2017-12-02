<?php

$dataset = file_get_contents('datasets/dataset');

# Explode on EOL (End Of Line constant)
$dataset_rows = explode(PHP_EOL, $dataset);

 # Define an array for all the outcomes.
$row_outcomes = [];

foreach ($dataset_rows as $dataset_row) {
  # Remove excess whitespace from within the string.
  $dataset_clean_row = preg_replace('/\s+/', ' ', $dataset_row );

  # Explode on space
  $row_numbers = explode(" ", $dataset_clean_row);

  # Set the initial values to the first number in the array.
  $highest_number = $row_numbers[0];
  $lowest_number = $row_numbers[0];

  foreach ($row_numbers as $row_number) {
    if ($row_number > $highest_number) {
      $highest_number = $row_number;
    }

    if ($row_number < $lowest_number) {
      $lowest_number = $row_number;
    }
  }

  # Calculate the difference between the highest and the lowest value.
  $diff =  (int)$highest_number - (int)$lowest_number;

  # When done looping, push the outcome to the array.
  $row_outcomes[] = $diff;
}

$checksum = 0;

# Calculate the checksum.
foreach ($row_outcomes as $row_outcome) {
  $checksum += $row_outcome;
}

echo "Checksum: " . $checksum . "\n";
