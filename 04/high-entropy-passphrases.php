<?php

$dataset = file_get_contents('input/passphrases');

# Explode on EOL (End Of Line constant)
$phrases = explode(PHP_EOL, $dataset);

$count = 0;
foreach ($phrases as $phrase) {
  # Make sure no empty lines are included in the check.
  if (!$phrase) {
    continue;
  }

  if (passphrase_is_valid($phrase)) {
    $count++;
  }
}

echo "There are " . $count . " valid phrases. \n";

function passphrase_is_valid($phrase) {
  $words = explode(" ", $phrase);

  foreach ($words as $key => $word) {
    foreach($words as $dkey => $dword) {
      # Don't execute the check when we're on the current word.
      if ($key === $dkey) {
        continue;
      }

      # If the words match, the phrase is invalid.
      if ($word === $dword) {
        return FALSE;
      }
    }
  }

  return TRUE;
}
