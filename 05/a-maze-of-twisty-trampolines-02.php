<?php

$dataset = file_get_contents('instructions/instructions');

# Explode on EOL (End Of Line constant)
$dataset_rows = explode(PHP_EOL, $dataset);

$instructions = [];
foreach ($dataset_rows as $dataset_row) {
  # Make sure no empty lines are included.
  if (!strlen($dataset_row)) {
    continue;
  }

  $instructions[] = (int)$dataset_row;
}

$index = 0;
$steps = 0;
while (array_key_exists($index, $instructions)) {
  $current_value = $instructions[$index];

  if ($instructions[$index] >= 3) {
    $instructions[$index]--;
  } else {
    $instructions[$index]++;
  }

  $steps++;

  # Calculate the next index.
  $index += $current_value;
}

echo "Steps: " . $steps . "\n";
