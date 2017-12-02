<?php

$dataset = file_get_contents('spreadsheets/spreadsheet');

# Explode on EOL (End Of Line constant)
$dataset_rows = explode(PHP_EOL, $dataset);

 # Define an array for all the outcomes.
$row_outcomes = [];

# Loop over each row (string).
foreach ($dataset_rows as $dataset_row) {
  # Remove excess whitespace from within the string.
  $dataset_clean_row = preg_replace('/\s+/', ' ', $dataset_row );

  # Create an array of numbers from the current row.
  $row_numbers = explode(" ", $dataset_clean_row);

  # Loop over all the numbers in the array.
  for ($i = 0; $i < count($row_numbers); $i++) {

    # Loop over all numbers in the array.
    for ($j = 0; $j < count($row_numbers); $j++) {

      # Do nothing when it's the current number.
      if ($row_numbers[$j] === $row_numbers[$i]) {
        continue;
      }

      # Calculate the quotient of the 2 values.
      $quotient = $row_numbers[$j] / $row_numbers[$i];

      # Check if the quotient is a whole number.
      if (is_int($quotient)) {
        # Add the outcome to the outcomes array.
        $row_outcomes[] = $quotient;
        # Break out of the loop since there is only 1 possible match.
        break;
      }
    }
  }
}

$checksum = 0;

# Calculate the checksum.
foreach ($row_outcomes as $row_outcome) {
  $checksum += $row_outcome;
}

# Print the result.
echo "Checksum: " . $checksum . "\n";
