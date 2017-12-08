<?php

# Warning! This code is not performant enough to run on a normal workstation.
# Use supercomputer or just use "a-maze-of-twisty-trampoline".

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

next_instruction($instructions);

function next_instruction($instructions, $index = 0, $steps = 0) {
  if (!array_key_exists($index, $instructions)) {
    echo "Steps: " . $steps . "\n";
    return;
  }

  # Increment the current instruction value by 1.
  $instructions[$index]++;
  $steps++;

  # Calculate the next index.
  $index += $instructions[$index];

  # Apply recursion.
  next_instruction($instructions, $index, $steps);
}
