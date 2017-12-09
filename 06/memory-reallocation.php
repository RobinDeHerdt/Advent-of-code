<?php

# Although this code is getting the correct answers,
# something is most definately wrong with it.
# @todo Check next_block_index();

$dataset = file_get_contents('input/blocks');

# Remove excess whitespace from within the string.
$dataset_clean = preg_replace('/\s+/', ' ', $dataset );

$results = explode(" ", $dataset_clean);

$blocks = [];
foreach ($results as $result) {
  if (!strlen($result)) {
    continue;
  }

  $blocks[] = (int)$result;
}

# Initiate the calculations.
run($blocks);

function run($blocks, $storage_blocks = [], $cycle = 0, $pointer = 0) {
  # Create a sequence string, to make checking for duplicates easier.
  $current_sequence = implode(" ", $blocks);

  $times_seen = 0;

  # Check whether we've seen the current sequence before.
  foreach ($storage_blocks as $storage_block) {
    if ($storage_block === $current_sequence) {
      $solutions[] = $cycle;
      $times_seen++;
    }

    if ($times_seen === 2) {
      echo "Cycle: " . $cycle . "\n";
      return;
    }
  }

  # Add the current sequence to storage.
  $storage_blocks[] = $current_sequence;

  # Distribute the current block.
  distribute_block($blocks, $pointer);

  # Increment cycle.
  $cycle++;

  run($blocks, $storage_blocks, $cycle, $pointer);
}


function distribute_block(array &$blocks, &$pointer) {
  $index = next_block_index($blocks, $pointer);

  $value = $blocks[$index];

  # Set the value of this block to 0.
  $blocks[$index] = 0;

  # Increment each array value, totalling the amount the highest value is worth.
  for ($i = 0; $i < $value; $i++) {
    # Increment the current index.
    $index++;

    # When out of array bounds, wrap around to index 0.
    if (!array_key_exists($index, $blocks)) {
      $index = 0;
    }

    # Increment the current value.
    $blocks[$index]++;
  }
}


function next_block_index(array $blocks, &$current_index) {
  # Set the first array value as the default.
  $highest_value = $blocks[0];

  foreach ($blocks as $index => $block) {
    if ($block > $highest_value) {
      $highest_value = $block;
    }
  }

  $highest_index = 0;

  for ($i = 0; $i < count($blocks); $i++) {
    # When out of array bounds, wrap around to index 0.
    if (!array_key_exists($current_index, $blocks)) {
      $current_index = 0;
    }

    if ($blocks[$i] === $highest_value) {
      $highest_index = $i;
      break;
    }
  }

  return $highest_index;
}
